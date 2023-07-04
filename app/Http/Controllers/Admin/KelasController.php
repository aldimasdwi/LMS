<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use App\Services\SummernoteService;
use App\Services\UploadService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class KelasController extends Controller
{

    public function __construct(private SummernoteService $summernoteService, private UploadService $uploadService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $adminQuery = fn ($query) => $query;
        $santriQuery = function ($query) use ($user) {
            return $query->where('jurusan_id', $user->personal_data->jurusan_id);
        };

        $kelass = Kelas::with(['jurusan'])->when($user->isAdmin(), $adminQuery, $santriQuery)->get();
        // dd($kelass->toArray());
        return view('admin.kelas.index', compact('kelass'));
    }

    public function publicIndex()
    {
        return Redirect::route('admin.kelas.index');
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
        $dir = config('app.default_dir_path_kelas_thumbnail');
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'slug' => Str::slug($request->nama_kelas),
            'jurusan_id' => $request->jurusan_id,
            'thumbnail' => '/uploads/img/' . $dir . '/' . $this->uploadService->imageUpload($dir)
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
        $routeParameters = function (string $start) {
            $path = trim(request()->getPathInfo(), '/');
            $result = new Collection(explode('/', $path));
            return $result->slice($result->search($start));
        };

        $kelass = Kelas::with(['tabMateri', 'tabMateri.materi'])->where(compact('slug'))->first();
        return view('admin.kelas.show', [
            'kelass' => $kelass,
            'routeParameters' => $routeParameters('kelas')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $jurusans = Jurusan::all();
        $kelas = Kelas::where(compact('slug'))->first();
        return view('admin.kelas.edit', compact('kelas', 'jurusans'));
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
        $dir = config('app.default_dir_path_kelas_thumbnail');
        $request["thumbnail"] = '/uploads/img/' . $dir . '/' . $this->uploadService->imageUpload($dir);
        $request["slug"] = Str::slug($request->nama_kelas);
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
