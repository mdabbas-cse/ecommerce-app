<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function update(Request $request, User $user)
    {
        $data = $user->find(Auth::user()->id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
