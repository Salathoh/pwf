<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\BeritaLulusanDosenController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| 
*/

//Route::get('/', function () {
   // return view('home');
//}); 

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');
});

Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');
    Route::get('/berita/form', [BeritaController::class, 'showBeritaForm'])->name('berita.form');
    Route::get('/ftr/lulusan', [BeritaLulusanDosenController::class, 'lulusan'])->name('ftr.lulusan');
    Route::get('/ftr/dosen', [BeritaLulusanDosenController::class, 'dosen'])->name('ftr.dosen');
    Route::get('/dosen/form', [DosenController::class, 'showDosenForm'])->name('dosen.form');
    Route::get('/berita/berita-admin', [BeritaController::class, 'formBeritaAdmin'])->name('berita.berita-admin');
    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
    Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
Route::get('/admin/buku', [AdminController::class, 'adminBuku'])->name('admin.buku');
    Route::get('/admin/tambahBuku', [AdminController::class, 'tambahBuku'])->name('admin.tambahBuku');
    Route::get('/admin/editBuku/{id}', [AdminController::class, 'editBuku'])->name('admin.editBuku');
    Route::get('/admin/deleteBuku/{id}', [AdminController::class, 'deleteBuku'])->name('admin.deleteBuku');
});

Route::post('/tambahAdmin', [AdminController::class, 'postTambahAdmin'])->name('postTambahAdmin');
Route::post('/postEditAdmin/{id}', [AdminController::class, 'postEditAdmin'])->name('postEditAdmin');
Route::post('/postTambahBuku', [AdminController::class, 'postTambahBuku'])->name('postTambahBuku');
Route::post('/postEditBuku/{id}', [AdminController::class, 'postEditBuku'])->name('postEditBuku');

Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
    Route::get('/user/home', [LoginRegisterController::class, 'userHome'])->name('user.home');
    Route::get('/ftr/berita', [BeritaLulusanDosenController::class, 'berita'])->name('ftr.berita');
    Route::get('/ftr/lulusan', [BeritaLulusanDosenController::class, 'lulusan'])->name('ftr.lulusan');
    Route::get('/ftr/dosen', [BeritaLulusanDosenController::class, 'dosen'])->name('ftr.dosen');
    //Route::get('/auth/login', 'BeritaLulusanDosenController@home')->name('auth.login');
});


Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/postBerita', [BeritaController::class, 'postBerita'])->name('postBerita');
Route::post('/postDosen', [DosenController::class, 'postDosen'])->name('postDosen');

//Route::get('/home', [BeritaLulusanDosenController::class, 'home'])->name('home');
//Route::get('/auth/login', [BeritaLulusanDosenController::class, 'home'])->name('auth.login');



Route::get('/form','BeritaController@create')->name('form');
Route::get('/form','DosenController@create')->name('form');
Route::post('/berita/{id}/edit', 'BeritaController@edit')->name('berita.edit');


Route::post('berita/edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
Route::post('berita/update/{id}', 'BeritaController@update')->name('berita.edit');
