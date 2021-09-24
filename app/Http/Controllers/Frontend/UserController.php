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
        $user = $user->find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            @unlink(public_path('upload/user_images/' . $user->profile_photo_path));
            $user->profile_photo_path = $filename;
            $user->provider_id = '';
        }
        $response = $user->save();

        if ($response) {
            $notification = [
                'message' => 'Profile update successfully!',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Someting was wrong!',
                'alert-type' => 'warning'
            ];
        }

        return redirect()->back()->with($notification);
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
