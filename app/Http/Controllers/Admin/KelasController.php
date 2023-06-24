<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelass = Kelas::with(['jurusan'])->get();
        return view('admin.kelas.index', compact('kelass'));
    }

    public function publicIndex()
    {
        $kelass = Kelas::latest()->paginate(4);
        return view('kelas.index', compact('kelass'));
    }
    public function publicSearch(Request $request)
    {
        $kelass = Kelas::where(function ($query) use ($request) {
            $query->where('nama_kelas', 'like', '%' . $request->keyword . '%');
            // ->orWhere('deskripsi','like','%'.$request->keyword.'%');
        })->paginate(4);

        return view('kelas.index', compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.kelas.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'slug' => Str::slug($request->nama_kelas),
            'jurusan_id' => $request->jurusan_id
        ]);
        return redirect()->route('admin.kelas.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $kelass = Kelas::with(['tabMateri', 'tabMateri.materi'])->where(compact('slug'))->first();
        return view('admin.kelas.show', compact('kelass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $kelas = Kelas::where(compact('slug'))->first();
        return view('admin.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $kelas->update($request->all());
        return redirect()->route('admin.kelas.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('admin.kelas.index')->with('success', 'Data berhasil dihapus');
    }
}
