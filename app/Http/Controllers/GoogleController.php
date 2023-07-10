<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        $user = Socialite::driver('google')->stateless()->user();

        if ($user) {
            $finduser = User::where('email', $user->email)->first();
            if ($finduser) {
                Auth::login($finduser);
                return Redirect('/admin/kelas');
            } else {
                // $newUser = User::updateOrCreate(['email' => $user->email], [
                //     'name' => $user->name,
                //     'google_id' => $user->id,
                //     'password' => Hash::make('password')
                // ]);
                // Auth::login($newUser);

                return Redirect('/login')->with('ubah', 'Maff Akun Belum Terdaftar');
            }
        } else {
            dd('Terjadi kesalahan: Tidak dapat memperoleh data pengguna dari Google.');
        }

    }
}
