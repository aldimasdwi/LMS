<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agenda;
use App\Models\Materi;
use App\Models\Pengumuman;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home.index',[
            'agenda' => Agenda::latest()->take(2)->get(),
            'materi' => Materi::with(['user','kategoriMateri'])->latest()->take(2)->get(),
            'pengumuman' => Pengumuman::with(['user'])->latest()->take(2)->get(),
        ]);
    }

    public function about()
    {
    	return view('home.about');
    }

    public function contact()
    {
    	return view('home.contact');
    }
}
