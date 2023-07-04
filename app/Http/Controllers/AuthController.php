<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            // User doesn't exist, create a new user
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => 0,
                // Additional user details as per your requirements
            ]);
        }

        // Log in the user
        auth()->login($user);

        // Redirect to a designated page after successful authentication
        return redirect('/home');
    }
}
