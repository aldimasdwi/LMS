<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriRequest as Request;
use App\Models\KategoriMateri;
use App\Models\Materi;
use Illuminate\Support\Carbon;

class MateriController extends Controller
{
    public function index()
    {
    	// $materi = Materi::with(['user','kategoriMateri'])->latest()->paginate(4);
    	$kategoris = KategoriMateri::latest()->paginate(4);

    	return view('materi.index',['kategoris' => $kategoris]);
    }

    public function show(Materi $materi)
    {
        $tersedia = new Carbon($materi->tersedia);
        if ($tersedia->greaterThan(now())){
            return redirect()->back()->withErrors(['tersedia' => 'Materi akan tersedia '.$tersedia->locale('id')->diffForHumans()]);
        }

    	return view('materi.show',compact('materi'));
    }

    public function search(Request $request)
    {	
    	$materi = Materi::with(['user','kategoriMateri'])->where(function($query) use ($request){
    		$query->where('judul','like','%'.$request->keyword.'%')
            ->orWhere('deskripsi','like','%'.$request->keyword.'%');
    	})->paginate(4);

    	return view('materi.index',compact('materi'));
    }
}