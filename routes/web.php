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

Route::get('/password/resets/{token}/{ic_number}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Auth::routes();


//AUTHENTICATE ROUTE
Route::middleware(['auth'])->group(function () {
    Route::get('/tukar-kata-laluan', [App\Http\Controllers\HomeController::class, 'change_password'])->name('tukar-kata-laluan');
    Route::post('/tukar-kata-laluan/kemaskini', [App\Http\Controllers\GeneralController::class, 'update_password'])->name('tukar-kata-laluan.kemaskini');
});


//USER ROUTE
Route::middleware([User::class])->group(function(){
    Route::get('/halaman-utama', [App\Http\Controllers\UserController::class, 'index_user'])->name('user.halaman-utama');

    Route::post('/halaman-utama/kemaskini-profil-update', [App\Http\Controllers\UserController::class, 'update_profile'])->name('users.kemaskini-profil-update');

    Route::get('/halaman-utama/kemaskini-profil', [App\Http\Controllers\UserController::class, 'update_profile_pengguna'])->name('users.kemaskini-profil');


    //Rumah Ibadat
    Route::get('/halaman-utama/rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'pilih_rumah_ibadat'])->name('users.rumah-ibadat.pilih');

    Route::get('/halaman-utama/rumah-ibadat/daftar-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'daftar_rumah_ibadat'])->name('users.rumah-ibadat.daftar');

    Route::post('/halaman-utama/rumah-ibadat/daftar-rumah-ibadat/daftar', [App\Http\Controllers\RumahIbadatController::class, 'tambah_rumah_ibadat'])->name('users.rumah-ibadat.daftar.tambah');

    Route::get('/halaman-utama/rumah-ibadat/permohonan-tukar-hak-milik-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'menukar_rumah_ibadat'])->name('users.rumah-ibadat.menukar');

    Route::get('/halaman-utama/rumah-ibadat/profil-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'profil_rumah_ibadat'])->name('users.rumah-ibadat.kemaskini');

    Route::post('/halaman-utama/rumah-ibadat/profil-rumah-ibadat/kemaskini', [App\Http\Controllers\RumahIbadatController::class, 'update_rumah_ibadat'])->name('users.rumah-ibadat.kemaskini.update');

    //Permohonan
    Route::get('/halaman-utama/permohonan', [App\Http\Controllers\PermohonanController::class, 'pilih_permohonan'])->name('users.permohonan.pilih');

    Route::get('/halaman-utama/permohonan/permohonan-baru', [App\Http\Controllers\PermohonanController::class, 'permohonan_baru'])->name('users.permohonan.baru');

    Route::post('/permohonan/permohonan/permohonan-baru/hantar', [App\Http\Controllers\PermohonanController::class, 'permohonan_hantar'])->name('users.permohonan.baru.hantar');

    Route::get('/permohonan/permohonan/permohonan-khas', [App\Http\Controllers\PermohonanController::class, 'permohonan_khas'])->name('users.permohonan.khas');

    Route::get('/permohonan/permohonan-proses', [App\Http\Controllers\PermohonanController::class, 'permohonan_proses'])->name('users.permohonan.proses');

    Route::get('/permohonan/permohonan-lulus', [App\Http\Controllers\PermohonanController::class, 'permohonan_lulus'])->name('users.permohonan.lulus');

    Route::get('/permohonan/permohonan-gagal', [App\Http\Controllers\PermohonanController::class, 'permohonan_gagal'])->name('users.permohonan.gagal');

});

//EXCO ROUTE
Route::middleware([Exco::class])->group(function () {
    Route::get('/exco/dashboard', [App\Http\Controllers\ExcoController::class, 'dashboard'])->name('excos.dashboard');

    Route::get('/exco/permohonan', [App\Http\Controllers\ExcoController::class, 'permohonan'])->name('excos.permohonan.pilih');

    Route::get('/exco/permohonan/permohonan-baru', [App\Http\Controllers\ExcoController::class, 'permohonan_baru'])->name('excos.permohonan.baru');


});

//YB ROUTE
Route::middleware([Yb::class])->group(function () {

});

//UPEN ROUTE
Route::middleware([Upen::class])->group(function () {

});


//ADMIN ROUTE
Route::middleware([Admin::class])->group(function () {
    // Route::get('/admin', function () { return view('admins.dashboard'); });

    Route::get('/dashboard-admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admins.dashboard');

    Route::get('/dashboard-admin/pengguna', [App\Http\Controllers\AdminController::class, 'pengguna'])->name('admins.pengguna.pilih');

    Route::get('/dashboard-admin/pengguna/senarai-pemohon', [App\Http\Controllers\AdminController::class, 'pemohon'])->name('admins.pengguna.pemohon');

    Route::get('/dashboard-admin/pengguna/senarai-pengguna-dalaman', [App\Http\Controllers\AdminController::class, 'pengguna_dalaman'])->name('admins.pengguna.pengguna-dalaman');

});


//SUPER ADMIN ROUTE (not used)
Route::middleware([SuperAdmin::class])->group(function () {
    Route::get('/super-admin/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_super_admin'])->name('super-admin.halaman-utama');
});


