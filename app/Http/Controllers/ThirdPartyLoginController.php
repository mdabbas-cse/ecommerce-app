<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class ThirdPartyLoginController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();

        if (empty($user->email) || $user->email === null)
            return redirect()->route('login');

        self::login($user);

        return redirect()->route('home.index');
    }

    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        if (empty($user->email) || $user->email === null)
            return redirect()->route('login');

        self::login($user);

        return redirect()->route('home.index');
    }

    public function githubLogin()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        $user = Socialite::driver('github')->user();

        if (empty($user->email) || $user->email === null)
            return redirect()->route('login');

        self::login($user);

        return redirect()->route('home.index');
    }

    private static function login($data)
    {

        $user = User::firstOrCreate(
            [
                'email' => $data->email
            ],
            [
                'name' => $data->name,
                'provider_id' => $data->id,
                'password' => Hash::make(Str::random(24))
            ]
        );

        Auth::login($user, true);
    }
}
