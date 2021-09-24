<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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

    public function editpassword()
    {
        return view('frontend.change_user_password');
    }

    public function updatepassword(Request $request, User $user)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $loginUser = $user->find(Auth::user()->id);
        if (Hash::check($request->current_password, $loginUser->password)) {
            $loginUser->password = Hash::make($request->password);
            $loginUser->save();
            Auth::logout();
            return redirect()->route('logout');
        } else {
            $notification = [
                'message' => 'Someting was wrong!',
                'alert-type' => 'warning'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
