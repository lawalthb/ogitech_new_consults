<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Statement;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Notifications\VendorApproveNotification;
use App\Notifications\VendorRegNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminDashboard()
    {

        return view('admin.index');
    } // End Mehtod


    public function AdminLogin()
    {
        return view('admin.admin_login');
    } // End Mehtod


    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Mehtod


    public function AdminProfile()
    {

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    } // End Mehtod

    public function AdminProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Mehtod


    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    } // End Mehtod


    public function AdminUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");
    } // End Mehtod



    public function InactiveVendor()
    {
        $inActiveVendor = User::where('status', 'inactive')->where('role', 'vendor')->latest()->get();

        return view('backend.vendor.inactive_vendor', compact('inActiveVendor'));
    } // End Mehtod


    public function ActiveVendor()
    {
        $ActiveVendor = User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        return view('backend.vendor.active_vendor', compact('ActiveVendor'));
    } // End Mehtod


    public function InactiveVendorDetails($id)
    {

        $inactiveVendorDetails = User::findOrFail($id);
        return view('backend.vendor.inactive_vendor_details', compact('inactiveVendorDetails'));
    } // End Mehtod


    public function ActiveVendorApprove(Request $request)
    {

        $verdor_id = $request->id;
        $user = User::findOrFail($verdor_id)->update([
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Vendor Active Successfully',
            'alert-type' => 'success'
        );

        $vuser = User::where('role', 'vendor')->get();
        Notification::send($vuser, new VendorApproveNotification($request));
        return redirect()->route('active.vendor')->with($notification);
    } // End Mehtod


    public function ActiveVendorDetails($id)
    {

        $activeVendorDetails = User::with('vendor_category')->findOrFail($id);
        return view('backend.vendor.active_vendor_details', compact('activeVendorDetails'));
    } // End Mehtod

    public function AddVendor()
    {

        $departments = Category::get();
        return view('backend.vendor.add_active_vendor', compact('departments'));
    } // End Mehtod


    public function StoreVendor(Request $request)
    {


        $vuser = User::where('role', 'admin')->get();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'vendor_join' => '2024',
            'vendor_department' => $request->vendor_department,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Vendor Registered Successfully',
            'alert-type' => 'success'
        );

        Notification::send($vuser, new VendorRegNotification($request));
        if ($user) {
            return redirect()->route('active.vendor')->with($notification);
        }
    } // End Mehtod




    public function InActiveVendorApprove(Request $request)
    {

        $verdor_id = $request->id;
        $user = User::findOrFail($verdor_id)->update([
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Vendor InActive Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('inactive.vendor')->with($notification);
    } // End Mehtod


    ///////////// Admin All Method //////////////


    public function AllAdmin()
    {
        $alladminuser = User::where('role', 'admin')->latest()->get();
        return view('backend.admin.all_admin', compact('alladminuser'));
    } // End Mehtod


    public function AddAdmin()
    {
        $roles = Role::all();
        return view('backend.admin.add_admin', compact('roles'));
    } // End Mehtod



    public function AdminUserStore(Request $request)
    {

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // End Mehtod




    public function EditAdminRole($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.admin.edit_admin', compact('user', 'roles'));
    } // End Mehtod


    public function AdminUserUpdate(Request $request, $id)
    {


        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // End Mehtod


    public function DeleteAdminRole($id)
    {

        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Mehtod


    public function GetVendorProduct($vendor_id)
    {
        $vendor_product = Product::where('vendor_id', $vendor_id)->orderBy('product_name', 'ASC')->get();
        return json_encode($vendor_product);
    } // End Method


    public function addToExistingStock($productId, $newStock)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($productId);

        // Increment the quantity column by the new stock amount
        $product->increment('product_qty', $newStock);

        // Optionally, return the updated product
        return $product->product_qty;
    }

    public function removeFromExistingStock($productId, $newStock)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($productId);

        // decrement the quantity column by the new stock amount
        $product->decrement('product_qty', $newStock);

        // Optionally, return the updated product
        return $product->product_qty;
    }




    public function StoreStock(Request $request)
    {

        $request->validate([
            'vendor_id' => ['required'],
            'product_id' => ['required'],
            'purchase_price' => ['required'],
            'amount' => ['required'],
            'qty' => ['required'],
        ]);

        try {
            DB::beginTransaction();  // Start the transaction
            $new_product_qty = $this->addToExistingStock($request->product_id, $request->qty);

            $last_id = Stock::insertGetId([
                'item_id' => $request->product_id,
                'amount' => $request->amount,
                'item_out' => 0,
                'item_in' => $request->qty,
                'item_balance' => $new_product_qty,
                'user_id' => $request->vendor_id,
                'user_type' => 'Vendor',
            ]);

            Statement::insert([
                'user_id' => $request->vendor_id,
                'amount_in' => $request->amount,
                'amount_out' => 0.00,
                'reason' => 'stock',
                'trans_id' => $last_id,
                'comment' => $request->comment,
            ]);

            DB::commit();  // Commit the transaction if everything went well

            $notification = array(
                'message' => 'Stock Added Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('product.stock')->with($notification);
        } catch (\Exception $e) {
            DB::rollBack();  // Roll back the transaction if there's an error

            // Optionally log the error or handle it as needed
            return redirect()->back()->withErrors(['error' => 'An error occurred while adding stock. Please try again.']);
        }
    }



    public function removeStoreStock($stockId)
    {

        try {
            // Start transaction
            DB::beginTransaction();

            // Find the stock entry by its ID
            $stock = Stock::find($stockId);
            if (!$stock) {
                return redirect()->back()->withErrors(['error' => 'Stock record not found.']);
            }

            // Get the corresponding statement entry using the stock ID (trans_id)
            $statement = Statement::where('trans_id', $stockId)->first();
            if (!$statement) {
                return redirect()->back()->withErrors(['error' => 'No statement found for the given stock record.']);
            }
            $new_product_qty = $this->removeFromExistingStock($stock->item_id, $stock->item_in);
            // Delete the statement record first to avoid orphaned records
            $statement->delete();

            // Delete the stock record
            $stock->delete();

            // Commit transaction
            DB::commit();

            // Return a success notification
            $notification = array(
                'message' => 'Stock entry and corresponding statement deleted successfully.',
                'alert-type' => 'success'
            );

            return redirect()->route('product.stock')->with($notification);
        } catch (\Exception $e) {
            // Rollback transaction if there's an error
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'An error occurred while undoing the stock entry.']);
        }
    }
}
