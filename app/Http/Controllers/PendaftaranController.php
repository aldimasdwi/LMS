<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftaranRequest;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Family;
use App\Models\Kuesioner;
use App\Models\PersonalData;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Redirect;

class PendaftaranController extends Controller
{
    public function index()
    {
        return View::make('pendaftaran');
    }
    public function adminIndex()
    {
        $users = User::where("status_id", 1)->get();
        return View::make('admin.pendaftaran.index', compact('users'));
    }
    public function daftar(PendaftaranRequest $request)
    {
        $user = User::create($request->validated());
        PersonalData::create($request->validated() + ["user_id" => $user->id]);
        Contact::create($request->validated() + ["user_id" => $user->id]);
        Education::create($request->validated() + ["user_id" => $user->id]);
        Family::create($request->validated() + ["user_id" => $user->id]);
        Kuesioner::create($request->validated() + ["user_id" => $user->id]);
        return Redirect::to('/')->with(["notice" => "Pendaftaran Berhasil Terkirim"]);
    }
}