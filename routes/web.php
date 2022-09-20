<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\General;
use App\Http\Controllers\Home;

use App\Http\Controllers\Penilai;

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

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



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::post('/postloginuser', [LoginController::class, 'postLoginUser']);
Route::post('/registeruser', [LoginController::class, 'registerUser']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/logoutuser', [LoginController::class, 'logoutUser']);
Route::get('/', [LoginController::class, 'login']);

// Route::get('/', [Home::class, 'halamanDepan']);

// Route::get('/info/{id_kategori}', [Home::class, 'info']);
// Route::get('/sejarah', [Home::class, 'sejarah']);
// Route::get('/pahlawan', [Home::class, 'pahlawan']);
// Route::get('/gunung', [Home::class, 'gunung']);
// Route::get('/wisata', [Home::class, 'wisata']);
// Route::get('/kuliner', [Home::class, 'kuliner']);
// Route::get('/tari', [Home::class, 'tari']);
// Route::get('/study', [Home::class, 'study']);
// Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:admin,siswa,guru']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_data', [General::class, 'ubahData']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:siswa']], function () {
    Route::post('/tambah_favorit', [UserController::class, 'tambahFavorit']);
    Route::post('/hapus_favorit', [UserController::class, 'hapusFavorit']);
    Route::get('/favorit', [UserController::class, 'favorit']);
    Route::get('/userprofile', [UserController::class, 'userProfile']);
    Route::get('/layanan', [UserController::class, 'layanan']);
    Route::get('/penilaian', [UserController::class, 'penilaian']);
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:admin,guru']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);

        // CRUD VIDEO
        Route::post('/create_video', [Admin::class, 'createVideo']);
        Route::post('/update_video', [Admin::class, 'updateVideo']);
        Route::post('/delete_video', [Admin::class, 'deleteVideo']);

        Route::get('/kategori', [Admin::class, 'kategori']);
        Route::get('/video', [Admin::class, 'video']);
        Route::get('/evaluasi', [Admin::class, 'evaluasi']);
        Route::post('/create_soal', [Admin::class, 'createSoal']);
        Route::post('/delete_soal', [Admin::class, 'deleteSoal']);
        Route::get('/info/{id_kategori}', [Admin::class, 'info']);
        Route::get('/sub_info/{id_info}', [Admin::class, 'subInfo']);
        Route::get('/sub_info/{id_info}/{id_sub_info}', [Admin::class, 'subInfo']);
        // Route::get('/pahlawan', [Admin::class, 'info']);
        // Route::get('/gunung', [Admin::class, 'info']);
        // Route::get('/wisata', [Admin::class, 'info']);
        // Route::get('/kuliner', [Admin::class, 'info']);
        // Route::get('/tari', [Admin::class, 'info']);
        // Route::get('/study', [Admin::class, 'info']);
        // Route::get('/media', [Admin::class, 'info']);

        // CRUD
        Route::post('/simpan_info', [Admin::class, 'simpanInfo']);
        Route::post('/simpan_sub_info', [Admin::class, 'simpanSubInfo']);
        Route::post('/simpan_kategori', [Admin::class, 'simpanKategori']);
        Route::post('/hapus_info', [Admin::class, 'hapusInfo']);
        Route::post('/hapus_sub_info', [Admin::class, 'hapusSubInfo']);
        Route::post('/hapus_kategori', [Admin::class, 'hapusKategori']);
    });
});

// GURU ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:guru']], function () {
    Route::group(['prefix' => 'admin'], function () {


        Route::get('/kategori', [Admin::class, 'kategori']);
        Route::get('/kategori/{id_kategori}', [Admin::class, 'kategori']);
        Route::get('/info/{id_kategori}', [Admin::class, 'info']);
        Route::get('/info/{id_kategori}/{id_info}', [Admin::class, 'info']);
        // Route::get('/pahlawan', [Admin::class, 'info']);
        // Route::get('/gunung', [Admin::class, 'info']);
        // Route::get('/wisata', [Admin::class, 'info']);
        // Route::get('/kuliner', [Admin::class, 'info']);
        // Route::get('/tari', [Admin::class, 'info']);
        // Route::get('/study', [Admin::class, 'info']);
        // Route::get('/media', [Admin::class, 'info']);

        // CRUD
        Route::post('/simpan_info', [Admin::class, 'simpanInfo']);
        Route::post('/simpan_kategori', [Admin::class, 'simpanKategori']);
        Route::post('/hapus_info', [Admin::class, 'hapusInfo']);
        Route::post('/hapus_kategori', [Admin::class, 'hapusKategori']);
    });
});
