<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftaranRequest;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Family;
use App\Models\Jurusan;
use App\Models\Kuesioner;
use App\Models\PersonalData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return View::make('pendaftaran', compact('jurusans'));
    }
    public function adminIndex()
    {
        $users = User::where("status_id", 1)->get();
        return View::make('admin.pendaftaran.index', compact('users'));
    }
    public function daftar(PendaftaranRequest $request)
    {
        $user = User::create($request->validated());

        Auth::login($user);

        $validatedData = $request->safe()->merge(["user_id" => $user->id]);

        if ($request->has('photo')) {
            $path = $request->file("photo")->store('public/images/user');
            $photo = ["photo" => Str::remove('public/', $path)];
            $validatedData->merge($photo);
        }

        PersonalData::create($validatedData->toArray());

        Contact::create($validatedData->toArray());

        Education::create($validatedData->toArray());

        Family::create($validatedData->toArray());

        Kuesioner::create($validatedData->toArray());

        return Redirect::to('/')->with(["notice" => "Pendaftaran Berhasil Terkirim"]);
    }
}
