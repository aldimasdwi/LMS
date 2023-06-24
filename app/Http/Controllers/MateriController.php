<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriRequest as Request;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Support\Carbon;

class MateriController extends Controller
{
    public function index()
    {
        // $materi = Materi::with(['user','kelas'])->latest()->paginate(4);
        $materis = Materi::latest()->paginate(4);
        return view('kelas.index', ['materis' => $materis]);
    }

    public function show(Materi $materi)
    {
        $tersedia = new Carbon($materi->tersedia);
        if ($tersedia->greaterThan(now())) {
            return redirect()->back()->withErrors(['tersedia' => 'Materi akan tersedia ' . $tersedia->locale('id')->diffForHumans()]);
        }

        return view('materi.show', compact('materi'));
    }

    public function search(Request $request)
    {
        $materi = Materi::with(['user', 'kelas'])->where(function ($query) use ($request) {
            $query->where('judul', 'like', '%' . $request->keyword . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->keyword . '%');
        })->paginate(4);

        return view('materi.index', compact('materi'));
    }
}
