<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelRequest as Request;

use App\Models\Artikel;
use Illuminate\Support\Carbon;

class ArtikelController extends Controller
{
    public function index()
    {
    	$artikel = Artikel::with(['user','kategoriArtikel'])->latest()->paginate(4);
    	return view('artikel.index',compact('artikel'));
    }

    public function show(Artikel $artikel)
    {
        $tersedia = new Carbon($artikel->tersedia);
        if ($tersedia->greaterThan(now())){
            return redirect()->back()->withErrors(['tersedia' => 'Artikel akan tersedia '.$tersedia->locale('id')->diffForHumans()]);
        }

    	return view('artikel.show',compact('artikel'));
    }

    public function search(Request $request)
    {	
    	$artikel = Artikel::with(['user','kategoriArtikel'])->where(function($query) use ($request){
    		$query->where('judul','like','%'.$request->keyword.'%')
            ->orWhere('deskripsi','like','%'.$request->keyword.'%');
    	})->paginate(4);

    	return view('artikel.index',compact('artikel'));
    }
}