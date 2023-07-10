<?php

use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleController;

//Admin Namespace
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\KelasController;

//Controllers Namespace
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PengumumanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/in', function () {
    return view('admin.kelas.in');
});

//Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Pendaftaran
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::post('/pendaftaran', [PendaftaranController::class, 'daftar']);

//Materi
Route::get('/kelas', [KelasController::class, 'publicIndex'])->name('kelas.publicIndex');
// Route::get('/materi/search',[MateriController::class,'search'])->name('materi.search');

// Route::get('/materi/{materi:slug}',[MateriController::class,'show'])->name('materi.show');

// Google Login
Route::get('/auth/google',[GoogleController::class,'redirectToGoogle']);
Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback']);

//Pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/{pengumuman:slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');

//Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::name('admin.')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('/data', [ProfileController::class, 'data'])->name('profile.data');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/tambahadmin', [ProfileController::class, 'tambahadmin'])->name('profile.tambahadmin');
        Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');

        //Resource Controller
        Route::resource('users', 'UsersController');
        Route::resource('pengumuman', 'PengumumanController');
        Route::resource('agenda', 'AgendaController');
        Route::resource('kelas', 'KelasController')->parameters([
            'kelas' => 'kelas',
        ])->scoped([
            'kelas' => 'slug'
        ]);
        Route::resource('kelas.materi', 'MateriController')->parameters([
            'kelas' => 'kelas',
            'materi' => 'materi',
        ])->scoped([
            'kelas' => 'slug',
            'materi' => 'slug',
        ]);

        // Pendaftaran
        Route::get("/pendaftaran", [PendaftaranController::class, "adminIndex"])->name("pendaftaran.index");
    });
});
