<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Notifications\VendorRegNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


class VendorController extends Controller
{
    public function VendorDashboard()
{
    $id = Auth::user()->id;
   $recentOrders = OrderItem::where('vendor_id', $id)
        ->with(['order', 'product', 'order.user'])
        ->latest()
        ->take(10)
        ->get();

    $orderItems = OrderItem::where('vendor_id', $id)->pluck('order_id');
    $totalOrders = Order::whereIn('id', $orderItems)->distinct()->count();
    $pendingOrders = Order::whereIn('id', $orderItems)->where('status', 'pending')->distinct()->count();
    $deliveredOrders = Order::whereIn('id', $orderItems)->where('status', 'deliverd')->distinct()->count();

    // Calculate revenue from OrderItem
    $totalRevenue = OrderItem::where('vendor_id', $id)
                    ->whereHas('order', function($q) {
                        $q->where('status', 'deliverd');
                    })
                    ->sum(DB::raw('price * qty'));
//testing git
    // Get products data
    $totalProducts = Product::where('vendor_id', $id)->count();
    $outOfStockProducts = Product::where('vendor_id', $id)
                                ->whereRaw('(SELECT SUM(item_in) - SUM(item_out) FROM stocks WHERE stocks.item_id = products.id) <= 0')
                                ->count();

    // Get monthly sales data for chart through OrderItem
  // In VendorController:
$monthlySales = OrderItem::where('vendor_id', $id)
    ->whereHas('order', function($q) {
        $q->where('status', 'deliverd')
          ->whereYear('created_at', date('Y'));
    })
    ->select(
        DB::raw('sum(price * qty) as total'),
        DB::raw('MONTH(created_at) as month')
    )
    ->groupBy('month')
    ->get();


    return view('vendor.index', compact(
        'totalOrders',
        'pendingOrders',
        'deliveredOrders',
        'totalRevenue',
        'totalProducts',
        'outOfStockProducts',
        'monthlySales',
         'recentOrders'
    ));
}
    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    } // End Mehtod



    public function VendorDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    } // End Mehtod



    public function VendorProfile()
    {

        $id = Auth::user()->id;
        $vendorData = User::find($id);
        $departments = Category::get();


        return view('vendor.vendor_profile_view', compact('vendorData', 'departments'));
    } // End Mehtod


    public function VendorProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->vendor_department = $request->vendor_department;
        $data->vendor_short_info = $request->vendor_short_info;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Vendor Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Mehtod



    public function VendorChangePassword()
    {
        return view('vendor.vendor_change_password');
    } // End Mehtod



    public function VendorUpdatePassword(Request $request)
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



    public function BecomeVendor()
    {
        $departments = Category::get();

        return view('auth.become_vendor', compact('departments'));
    } // End Mehtod


    public function VendorRegister(Request $request)
    {

        $vuser = User::where('role', 'admin')->get();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
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
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Contact Admin for approval, Vendor Registered Successfully',
            'alert-type' => 'success'
        );

        Notification::send($vuser, new VendorRegNotification($request));
        return redirect()->route('vendor.login')->with($notification);
    } // End Mehtod




}
