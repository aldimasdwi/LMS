<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('admin.profile');
    }
    public function tambahadmin()
    {
    	return view('admin.tambahadmin');
    }

    function data(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status_id' => $request->status_id,
            'password' => bcrypt($request->password)
         ]);

         return redirect()->route('admin.profile.tambahadmin')->with('ubahh', 'admin baru sudah ditambahkan');

     }
}
