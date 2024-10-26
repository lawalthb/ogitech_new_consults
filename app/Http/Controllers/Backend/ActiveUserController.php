<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class ActiveUserController extends Controller
{
    public function AllUser()
    {
        $users = User::with('vendor_category')->where('role', 'user')->latest()->get();
        return view('backend.user.user_all_data', compact('users'));
    } // End Mehtod

    public function AllHoc()
    {
        $users = User::with('vendor_category')->where('role', 'user')->where('is_hoc', 'Yes')->latest()->get();
        return view('backend.user.hoc_all_data', compact('users'));
    } // End Mehtod

    public function AddHoc()
    {

        $categories = Category::get();
        $users = User::where('role', 'user')->where('is_hoc', 'No')->orderBy('name', 'ASC')->get();
        return view('backend.user.add_hoc', compact('users', 'categories'));
    } // End Mehtod


    public function StoreHoc(Request $request)
    {

        $request->validate([
            'user_id' => ['required'],
            'vendor_department' => ['required'],
            'level' => ['required'],

        ]);

        $user = User::findOrFail($request->user_id);

        $user->vendor_department = $request->vendor_department;

        $user->level = $request->level;

        $user->is_hoc = 'Yes';

        $user->save();

        $notification = array(
            'message' => 'HOC Added  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-hoc')->with($notification);
    } // End Mehtod


    public function RevokeHoc($id)
    {

        $user = User::findOrFail($id);


        $user->is_hoc = 'No';

        $user->save();

        $notification = array(
            'message' => 'HOC Revoke Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all-hoc')->with($notification);
    } // End Mehtod




    public function AllVendor()
    {
        $vendors = User::where('role', 'vendor')->latest()->get();
        return view('backend.user.vendor_all_data', compact('vendors'));
    } // End Mehtod


    public function read_notification()
    {
        $read_notifiction =   FacadesDB::table('notifications')
            ->whereNull('read_at')
            ->update(['read_at' => Carbon::now()]);


        return response()->json(['success' => true, 'message' => 'Record marked as read successfully.']);
    }

    public function DeleteUser($id)
    {

        $deleted = User::findOrFail($id)->delete();
        if ($deleted) {
            $notification = array(
                'message' => 'User and his Orders Deleted  Successfully',
                'alert-type' => 'success'
            );
        } else {

            $notification = array(
                'message' => 'You can not delete user, it has product',
                'alert-type' => 'info'
            );
        }
        return redirect()->back()->with($notification);
    } // End Mehtod


    public function EditUser($id)
    {

        $categories = Category::orderBy('category_name', 'ASC')->get();
        $user = User::findOrFail($id);
        return view('backend.user.user_edit', compact('user', 'categories'));
    } // End Method


    public function UpdateUser(Request $request, $id)
    {
        //dd($request);

        $user = User::findOrFail($id);

        $user->username = $request->username;
        $user->name =
            $request->name;
        $user->email =
            $request->email;
        $user->phone =
            $request->phone;
        $user->address
            = $request->address;
        $user->level
            = $request->level;
        $user->matno =
            $request->matno;
        $user->vendor_department =
            $request->vendor_department;
        $user->role =
            $request->role;



        $user->save();

        $notification = array(
            'message' => 'Update Successfully',
            'alert-type' => 'success'
        );
        if ($request->role == 'user') {
            return redirect()->route('all-user')->with($notification);
        } else {
            return redirect()->route('all-vendor')->with($notification);
        }
    } // End Mehtod




}
