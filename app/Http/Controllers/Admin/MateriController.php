<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\MateriDeleteEvent;
use App\Services\SummernoteService;
use App\Services\UploadService;
use App\Models\Materi;
use App\Models\KategoriMateri;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    private $summernoteService;
    private $uploadService;

    public function __construct(SummernoteService $summernoteService, UploadService $uploadService)
    {
        $this->summernoteService = $summernoteService;
        $this->uploadService = $uploadService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materis = Materi::with(['user', 'kategoriMateri'])->orderBy('tersedia')->get()->groupBy('tersedia');
        // dd($materi);
        return view('admin.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriMateri = KategoriMateri::all();
        return view('admin.materi.create', compact('kategoriMateri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tersedia' => ['regex:/^\d{4}\/\d{2}\/\d{2} ([01]\d|2[0-3]):[0-5]\d$/', 'required'],
            'kategori_materi_id' => 'required'
        ]);

        Materi::create([
            'judul' => $request->judul,
            'deskripsi' => $this->summernoteService->imageUpload('materi'),
            'thumbnail' => $this->uploadService->imageUpload('materi'),
            'slug' => Str::slug($request->judul),
            'user_id' => auth()->user()->id,
            'tersedia' => $request->tersedia ?? now(),
            'kategori_materi_id' => $request->kategori_materi_id,
        ]);
        return redirect()->route('admin.materi.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        $kategoriMateri = KategoriMateri::get();
        return view('admin.materi.edit', compact('materi', 'kategoriMateri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $this->authorize('update', $materi);
        $requestBody = [
            'judul' => $request->judul,
            'deskripsi' => $this->summernoteService->imageUpload('materi'),
            'thumbnail' => $this->uploadService->imageUpload('materi'),
            'slug' => Str::slug($request->judul),
            'user_id' => auth()->user()->id,
            'tersedia' => $request->tersedia ?? now(),
            'kategori_materi_id' => $request->kategori_materi_id,
        ];
        foreach ($requestBody as $key => $value) {
            $materi[$key] = $value;
        }
        $materi->save();
        return redirect()->route('admin.materi.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        $this->authorize('delete', $materi);

        event(new MateriDeleteEvent($materi));

        $materi->delete();
        return redirect()->route('admin.materi.index')->with('success', 'Data berhasil dihapus');
    }
}
