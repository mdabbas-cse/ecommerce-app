<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $adminProfile = $admin->find(1);
        return view('admin.profile', compact('adminProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $adminProfile = $admin::find(1);
        return view('admin.profile_edit', compact('adminProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $data = $admin->find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
            $data->profile_photo_path = $filename;
        }
        $results = $data->save();

        if ($results) {
            $notification = [
                'message' => 'Admin profile update successfully!',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Someting was wrong!',
                'alert-type' => 'warning'
            ];
        }

        return redirect()->route('admin.profile')->with($notification);
    }

    public function passwordEdit()
    {
        return view('admin.password_edit');
    }

    public function passwordUpdate(Request $request)
    {

        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
 
        $admin = Admin::find(1);
        if (Hash::check($request->current_password, $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            $notification = [
                'message' => 'Someting was wrong!',
                'alert-type' => 'warning'
            ];
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
