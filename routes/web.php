<?php

use App\Http\Middleware\SuperAdmin;
use Illuminate\Support\Facades\Route;
// use Auth;
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


//landing page
Route::get('/', function () {
    return view('welcome');
});
Route::get('/selamat-datang', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');

Auth::routes();

//AUTHENTICATE ROUTE
Route::middleware(['auth'])->group(function () {
    Route::get('/profil-rumah-ibadat', [App\Http\Controllers\HomeController::class, 'profil_rumah_ibadat'])->name('profil-rumah-ibadat');
    Route::get('/profil/tukar-kata-laluan', [App\Http\Controllers\HomeController::class, 'change_password'])->name('tukar-kata-laluan');
    Route::post('/tukar-kata-laluan/kemaskini', [App\Http\Controllers\GeneralController::class, 'update_password'])->name('tukar-kata-laluan.kemaskini');
});

//USER ROUTE
Route::middleware([User::class])->group(function(){
    Route::get('/pengguna/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_user'])->name('user.halaman-utama');

    //Rumah Ibadat
    Route::get('/rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'pilih_rumah_ibadat'])->name('users.rumah-ibadat.pilih');

    Route::get('/rumah-ibadat/daftar-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'daftar_rumah_ibadat'])->name('users.rumah-ibadat.daftar');

    Route::get('/rumah-ibadat/menukar-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'menukar_rumah_ibadat'])->name('users.rumah-ibadat.menukar');

    //Permohonan
    Route::get('/pengguna/permohonan/baru', [App\Http\Controllers\PermohonanController::class, 'permohonan_baru'])->name('users.permohonan.baru');
});


//ADMIN ROUTE
Route::middleware([Admin::class])->group(function () {
    Route::get('/admin/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_admin'])->name('admin.halaman-utama');
});


//SUPER ADMIN ROUTE
Route::middleware([SuperAdmin::class])->group(function () {
    Route::get('/super-admin/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_super_admin'])->name('super-admin.halaman-utama');
});


