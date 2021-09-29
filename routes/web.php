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
    return redirect()->route('welcome');
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

    Route::get('/halaman-utama/kemaskini-profil', [App\Http\Controllers\UserController::class, 'update_profile_pengguna'])->name('users.kemaskini-profil');

    Route::post('/halaman-utama/kemaskini-profil-update', [App\Http\Controllers\UserController::class, 'update_profile'])->name('users.kemaskini-profil-update');


    //Rumah Ibadat
    Route::get('/halaman-utama/rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'pilih_rumah_ibadat'])->name('users.rumah-ibadat.pilih');

    Route::get('/halaman-utama/rumah-ibadat/daftar-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'daftar_rumah_ibadat'])->name('users.rumah-ibadat.daftar');

    Route::post('/halaman-utama/rumah-ibadat/daftar-rumah-ibadat/daftar', [App\Http\Controllers\RumahIbadatController::class, 'tambah_rumah_ibadat'])->name('users.rumah-ibadat.daftar.tambah');

    //Rumah Ibadat - Menukar Hak Milik
    Route::get('/halaman-utama/rumah-ibadat/permohonan-menukar-wakil-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'menukar_rumah_ibadat'])->name('users.rumah-ibadat.menukar');

    Route::post('/halaman-utama/rumah-ibadat/permohonan-menukar-wakil-rumah-ibadat/hantar', [App\Http\Controllers\RumahIbadatController::class, 'menukar_rumah_ibadat_submit'])->name('users.rumah-ibadat.menukar.submit');

    Route::get('/status-permohonan-menukar-wakil-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'status_tukar'])->name('users.rumah-ibadat.status');



    Route::get('/halaman-utama/rumah-ibadat/kemaskini-profil-rumah-ibadat', [App\Http\Controllers\RumahIbadatController::class, 'profil_rumah_ibadat'])->name('users.rumah-ibadat.kemaskini');

    Route::post('/halaman-utama/rumah-ibadat/profil-rumah-ibadat/kemaskini', [App\Http\Controllers\RumahIbadatController::class, 'update_rumah_ibadat'])->name('users.rumah-ibadat.kemaskini.update');

    //Permohonan
    Route::get('/halaman-utama/permohonan', [App\Http\Controllers\PermohonanController::class, 'pilih_permohonan'])->name('users.permohonan.pilih');


    //PERMOHONAN BARU
    Route::get('/halaman-utama/permohonan/permohonan-baru', [App\Http\Controllers\PermohonanController::class, 'permohonan_baru'])->name('users.permohonan.baru');

    Route::post('/halaman-utama/permohonan/permohonan-baru/hantar', [App\Http\Controllers\PermohonanController::class, 'permohonan_hantar'])->name('users.permohonan.baru.hantar');

    //PERMOHONAN SEDANG DIPROSES
    Route::get('/halaman-utama/permohonan/permohonan-sedang-diproses', [App\Http\Controllers\PermohonanController::class, 'permohonan_proses'])->name('users.permohonan.sedang-diproses');

    Route::get('/halaman-utama/permohonan/permohonan-sedang-diproses/batal', [App\Http\Controllers\PermohonanController::class, 'batal_permohonan'])->name('users.permohonan.sedang-diproses.batal');

    Route::get('/halaman-utama/permohonan/permohonan-sedang-diproses/papar-permohonan', [App\Http\Controllers\PermohonanController::class, 'papar_permohonan_sedang_diproses'])->name('users.permohonan.papar-sedang-diproses');

    Route::get('/halaman-utama/permohonan/permohonan-sedang-diproses/semakan-semula-permohonan', [App\Http\Controllers\PermohonanController::class, 'permohonan_semakan_semula'])->name('users.permohonan.semak-semula');

    Route::post('/halaman-utama/permohonan/permohonan-sedang-diproses/semakan-semula-permohonan/hantar', [App\Http\Controllers\PermohonanController::class, 'hantar_permohonan_semakan_semula'])->name('users.permohonan.semak-semula.hantar');

    //PERMOHONAN LULUS
    Route::get('/halaman-utama/permohonan/permohonan-lulus', [App\Http\Controllers\PermohonanController::class, 'permohonan_lulus'])->name('users.permohonan.lulus');

    //PERMOHONAN TIDAK LULUS
    Route::get('/halaman-utama/permohonan/permohonan-tidak-lulus', [App\Http\Controllers\PermohonanController::class, 'permohonan_tidak_lulus'])->name('users.permohonan.tidak-lulus');

});

//EXCO ROUTE
Route::middleware([Exco::class])->group(function () {
    Route::get('/dashboard-pejabat-exco', [App\Http\Controllers\ExcoController::class, 'dashboard'])->name('excos.dashboard');

    //download API
    Route::get('/dashboard-pejabat-exco/muat-turun/permohonan', [App\Http\Controllers\ExcoController::class, 'download_permohonan'])->name('muat-turun.permohonan');

    Route::get('/dashboard-pejabat-exco/cetak-permohonan', [App\Http\Controllers\ExcoController::class, 'print_permohonan'])->name('excos.permohonan.print');

    Route::get('/dashboard-pejabat-exco/cetak-permohonan-khas', [App\Http\Controllers\ExcoController::class, 'print_permohonan_khas'])->name('excos.permohonan-khas.print');


    // Permohonan
    Route::get('/dashboard-pejabat-exco/permohonan', [App\Http\Controllers\ExcoController::class, 'permohonan'])->name('excos.permohonan.pilih');

    Route::get('/dashboard-pejabat-exco/permohonan/status-permohonan-keseluruhan', [App\Http\Controllers\ExcoController::class, 'permohonan_status'])->name('excos.permohonan.status-permohonan');


    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru', [App\Http\Controllers\ExcoController::class, 'permohonan_baru'])->name('excos.permohonan.baru');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan'])->name('excos.permohonan.papar');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru/maklumat-permohonan/semak-semula', [App\Http\Controllers\ExcoController::class, 'permohonan_semak_semula'])->name('excos.permohonan.papar.semak-semula');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru/maklumat-permohonan/sahkan', [App\Http\Controllers\ExcoController::class, 'permohonan_pengesahan'])->name('excos.permohonan.papar.sahkan');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-baru/maklumat-permohonan/batalkan', [App\Http\Controllers\ExcoController::class, 'permohonan_pembatalan'])->name('excos.permohonan.papar.batalkan');


    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-sedang-diproses', [App\Http\Controllers\ExcoController::class, 'permohonan_sedang_diproses'])->name('excos.permohonan.sedang-diproses');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-sedang-diproses/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_sedang_diproses'])->name('excos.permohonan.sedang-diproses.papar');


    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-semakan-semula', [App\Http\Controllers\ExcoController::class, 'permohonan_semakan_semula'])->name('excos.permohonan.semakan-semula');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-semakan-semula/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_semakan_semula'])->name('excos.permohonan.semakan-semula.papar');


    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-lulus', [App\Http\Controllers\ExcoController::class, 'permohonan_lulus'])->name('excos.permohonan.lulus');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-lulus/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_lulus'])->name('excos.permohonan.lulus.papar');


    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-tidak-lulus', [App\Http\Controllers\ExcoController::class, 'permohonan_tidak_lulus'])->name('excos.permohonan.tidak-lulus');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-tidak-lulus/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_tidak_lulus'])->name('excos.permohonan.tidak-lulus.papar');

    //PERMOHONAN KHAS
    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-khas/status-permohonan-keseluruhan', [App\Http\Controllers\ExcoController::class, 'permohonan_khas_status'])->name('excos.permohonan.khas.status-permohonan');


    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-khas', [App\Http\Controllers\ExcoController::class, 'permohonan_khas'])->name('excos.permohonan.khas');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-khas/maklumat-permohonan', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_khas'])->name('excos.permohonan.khas.papar');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-khas/maklumat-permohonan/lulus', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_khas_lulus'])->name('excos.permohonan.khas.lulus');

    Route::get('/dashboard-pejabat-exco/permohonan/permohonan-khas/maklumat-permohonan/tidak-lulus', [App\Http\Controllers\ExcoController::class, 'papar_permohonan_khas_tidak_lulus'])->name('excos.permohonan.khas.tidak-lulus');


    //  Rumah Ibadat
    Route::get('/dashboard-pejabat-exco/rumah-ibadat', [App\Http\Controllers\ExcoController::class, 'rumah_ibadat'])->name('excos.rumah-ibadat');

    Route::get('/dashboard-pejabat-exco/rumah-ibadat/senarai-rumah-ibadat', [App\Http\Controllers\ExcoController::class, 'senarai_rumah_ibadat'])->name('excos.rumah-ibadat.senarai');

    Route::get('/dashboard-pejabat-exco/rumah-ibadat/senarai-rumah-ibadat/maklumat-rumah-ibadat', [App\Http\Controllers\ExcoController::class, 'papar_rumah_ibadat'])->name('excos.rumah-ibadat.senarai.papar');

});

//YB ROUTE
Route::middleware([Yb::class])->group(function () {
    Route::get('/dashboard-YB-pengerusi', [App\Http\Controllers\YbController::class, 'dashboard'])->name('ybs.dashboard');

    Route::get('/dashboard-YB-pengerusi/cetak-permohonan', [App\Http\Controllers\YbController::class, 'print_permohonan'])->name('ybs.permohonan.print');

    Route::get('/dashboard-YB-pengerusi/cetak-permohonan-khas', [App\Http\Controllers\YbController::class, 'print_permohonan_khas'])->name('ybs.permohonan-khas.print');


    //PERMOHONAN
    Route::get('/dashboard-YB-pengerusi/permohonan', [App\Http\Controllers\YbController::class, 'permohonan'])->name('ybs.permohonan.pilih');

    Route::get('/dashboard-YB-pengerusi/permohonan/status-permohonan-keseluruhan', [App\Http\Controllers\YbController   ::class, 'permohonan_status'])->name('ybs.permohonan.status-permohonan');



    //PERMOHONAN BARU
    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-baru', [App\Http\Controllers\YbController::class, 'permohonan_baru'])->name('ybs.permohonan.baru');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-baru/maklumat-permohonan', [App\Http\Controllers\YbController::class, 'papar_permohonan'])->name('ybs.permohonan.papar');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-baru/maklumat-permohonan/semak-semula', [App\Http\Controllers\YbController::class, 'permohonan_semak_semula'])->name('ybs.permohonan.papar.semak-semula');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-baru/maklumat-permohonan/sahkan', [App\Http\Controllers\YbController::class, 'permohonan_pengesahan'])->name('ybs.permohonan.papar.sahkan');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-baru/maklumat-permohonan/batalkan', [App\Http\Controllers\YbController::class, 'permohonan_pembatalan'])->name('ybs.permohonan.papar.batalkan');

    //PEMROHONAN SEDANG DIPROSES
    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-sedang-diproses', [App\Http\Controllers\YbController::class, 'permohonan_sedang_diproses'])->name('ybs.permohonan.sedang-diproses');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-sedang-diproses/maklumat-permohonan', [App\Http\Controllers\YbController::class, 'papar_permohonan_sedang_diproses'])->name('ybs.permohonan.sedang-diproses.papar');

    //PEMROHONAN SEMAKAN SEMULA
    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-semakan-semula', [App\Http\Controllers\YbController::class, 'permohonan_semakan_semula'])->name('ybs.permohonan.semak-semula');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-semakan-semula/maklumat-permohonan', [App\Http\Controllers\YbController::class, 'papar_permohonan_semakan_semula'])->name('ybs.permohonan.semakan-semula.papar');

    //PERMOHONAN LULUS
    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-lulus', [App\Http\Controllers\YbController::class, 'permohonan_lulus'])->name('ybs.permohonan.lulus');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-lulus/maklumat-permohonan', [App\Http\Controllers\YbController::class, 'papar_permohonan_lulus'])->name('ybs.permohonan.lulus.papar');

    //PERMOHONA TIDAK LULUS
    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-tidak-lulus', [App\Http\Controllers\YbController::class, 'permohonan_tidak_lulus'])->name('ybs.permohonan.tidak-lulus');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-tidak-lulus/maklumat-permohonan', [App\Http\Controllers\YbController::class, 'papar_permohonan_tidak_lulus'])->name('ybs.permohonan.tidak-lulus.papar');


    //PERMOHONAN KHAS
    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-khas/status-permohonan-keseluruhan', [App\Http\Controllers\YbController::class, 'permohonan_khas_status'])->name('ybs.permohonan.khas.status-permohonan');



    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-khas', [App\Http\Controllers\YbController::class, 'permohonan_khas'])->name('ybs.permohonan.khas');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-khas/maklumat-permohonan', [App\Http\Controllers\YbController::class, 'papar_permohonan_khas'])->name('ybs.permohonan.khas.papar');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-khas/maklumat-permohonan/lulus', [App\Http\Controllers\YbController::class, 'papar_permohonan_khas_lulus'])->name('ybs.permohonan.khas.lulus');

    Route::get('/dashboard-YB-pengerusi/permohonan/permohonan-khas/maklumat-permohonan/tidak-lulus', [App\Http\Controllers\YbController::class, 'papar_permohonan_khas_tidak_lulus'])->name('ybs.permohonan.khas.tidak-lulus');


    //rumah ibadat
    Route::get('/dashboard-YB-pengerusi/rumah-ibadat', [App\Http\Controllers\YbController::class, 'rumah_ibadat'])->name('ybs.rumah-ibadat');

    Route::get('/dashboard-YB-pengerusi/rumah-ibadat/senarai-rumah-ibadat', [App\Http\Controllers\YbController::class, 'senarai_rumah_ibadat'])->name('ybs.rumah-ibadat.senarai');

    Route::get('/dashboard-YB-pengerusi/rumah-ibadat/senarai-rumah-ibadat/maklumat-rumah-ibadat', [App\Http\Controllers\YbController::class, 'papar_rumah_ibadat'])->name('ybs.rumah-ibadat.senarai.papar');
});

//UPEN ROUTE
Route::middleware([Upen::class])->group(function () {
    Route::get('/dashboard-pejabat-UPEN', [App\Http\Controllers\UpenController::class, 'dashboard'])->name('upens.dashboard');

    Route::get('/dashboard-pejabat-UPEN/kemaskini-peruntukan', [App\Http\Controllers\UpenController::class, 'update_peruntukan'])->name('upens.peruntukan.update');



    //API
    Route::get('/dashboard-pejabat-UPEN/cetak-permohonan', [App\Http\Controllers\UpenController::class, 'print_permohonan'])->name('upens.permohonan.print');

    Route::get('/dashboard-pejabat-UPEN/cetak-permohonan-khas', [App\Http\Controllers\UpenController::class, 'print_permohonan_khas'])->name('upens.permohonan-khas.print');


    //PERMOHONAN BARU
    Route::get('/dashboard-pejabat-UPEN/permohonan', [App\Http\Controllers\UpenController::class, 'permohonan'])->name('upens.permohonan.pilih');

    Route::get('/dashboard-pejabat-UPEN/permohonan/status-permohonan-keseluruhan', [App\Http\Controllers\UpenController::class, 'permohonan_status'])->name('upens.permohonan.status-permohonan');

    //PERMOHONAN BARU
    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-baru', [App\Http\Controllers\UpenController::class, 'permohonan_baru'])->name('upens.permohonan.baru');

    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-baru/maklumat-permohonan', [App\Http\Controllers\UpenController::class, 'papar_permohonan'])->name('upens.permohonan.papar');

    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-baru/maklumat-permohonan/kemaskini-peruntukan', [App\Http\Controllers\UpenController::class, 'permohonan_kemaskini_peruntukan'])->name('upens.permohonan.kemaskini-peruntukan');

    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-baru/maklumat-permohonan/semak-semula', [App\Http\Controllers\UpenController::class, 'permohonan_semak_semula'])->name('upens.permohonan.papar.semak-semula');

    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-baru/maklumat-permohonan/batalkan', [App\Http\Controllers\UpenController::class, 'permohonan_pembatalan'])->name('upens.permohonan.papar.batalkan');

    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-baru/maklumat-permohonan/sahkan', [App\Http\Controllers\UpenController::class, 'permohonan_pengesahan'])->name('upens.permohonan.papar.sahkan');

    //PERMOHONAN SEMAK SEMULA
    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-semak-semula', [App\Http\Controllers\UpenController::class, 'permohonan_semak_semula_list'])->name('upens.permohonan.semak-semula');

    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-semakan-semula/maklumat-permohonan', [App\Http\Controllers\UpenController::class, 'papar_permohonan_semakan_semula'])->name('upens.permohonan.semakan-semula.papar');


    //PERMOHONAN LULUS
    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-lulus', [App\Http\Controllers\UpenController::class, 'permohonan_lulus'])->name('upens.permohonan.lulus');

    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-lulus/maklumat-permohonan', [App\Http\Controllers\UpenController::class, 'papar_permohonan_lulus'])->name('upens.permohonan.lulus.papar');

    //PERMOHONAN TIDAK LULUS
    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-tidak-lulus', [App\Http\Controllers\UpenController::class, 'permohonan_tidak_lulus'])->name('upens.permohonan.tidak-lulus');

    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-tidak-lulus/maklumat-permohonan', [App\Http\Controllers\UpenController::class, 'papar_permohonan_tidak_lulus'])->name('upens.permohonan.tidak-lulus.papar');



    //PERMOHONAN KHAS
    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-khas/status-permohonan-keseluruhan', [App\Http\Controllers\UpenController::class, 'permohonan_khas_status'])->name('upens.permohonan.khas.status-permohonan');


    Route::get('/dashboard-pejabat-UPEN/permohonan/permohonan-khas', [App\Http\Controllers\UpenController::class, 'permohonan_khas'])->name('upens.permohonan-khas.baru');

    Route::post('/dashboard-pejabat-UPEN/permohonan/permohonan-khas/hantar', [App\Http\Controllers\UpenController::class, 'permohonan_khas_hantar'])->name('upens.permohonan-khas.hantar');

    Route::get('/dashboard-pejabat-UPEN/permohonan/senarai-permohonan-khas', [App\Http\Controllers\UpenController::class, 'permohonan_khas_senarai'])->name('upens.permohonan-khas.senarai');

    Route::get('/dashboard-pejabat-UPEN/permohonan/senarai-permohonan-khas/maklumat-permohonan', [App\Http\Controllers\UpenController::class, 'permohonan_khas_papar'])->name('upens.permohonan-khas.papar');

    //RUMAH IBADAT
    Route::get('/dashboard-pejabat-UPEN/rumah-ibadat', [App\Http\Controllers\UpenController::class, 'rumah_ibadat'])->name('upens.rumah-ibadat.pilih');

    Route::get('/dashboard-pejabat-UPEN/rumah-ibadat/permohonan-menukar-wakil-rumah-ibadat', [App\Http\Controllers\UpenController::class, 'tukar_wakil'])->name('upens.rumah-ibadat.permohonan');

    Route::get('/dashboard-pejabat-UPEN/rumah-ibadat/permohonan-menukar-wakil-rumah-ibadat/maklumat-permohonan', [App\Http\Controllers\UpenController::class, 'tukar_wakil_papar'])->name('upens.rumah-ibadat.permohonan.papar');

    Route::get('/dashboard-pejabat-UPEN/rumah-ibadat/permohonan-menukar-wakil-rumah-ibadat/maklumat-permohonan/tidak-lulus', [App\Http\Controllers\UpenController::class, 'tukar_wakil_tidak_lulus'])->name('upens.rumah-ibadat.permohonan.tidak-lulus');

    Route::get('/dashboard-pejabat-UPEN/rumah-ibadat/permohonan-menukar-wakil-rumah-ibadat/maklumat-permohonan/lulus', [App\Http\Controllers\UpenController::class, 'tukar_wakil_lulus'])->name('upens.rumah-ibadat.permohonan.lulus');



    //TETAPAN
    Route::get('/dashboard-pejabat-UPEN/tetapan', [App\Http\Controllers\UpenController::class, 'tetapan'])->name('upens.tetapan.pilih');


    Route::get('/dashboard-pejabat-UPEN/tetapan/tetapan-permohonan', [App\Http\Controllers\UpenController::class, 'tetapan_permohonan'])->name('upens.tetapan.permohonan');

    Route::get('/dashboard-pejabat-UPEN/tetapan/tetapan-permohonan/buka-tutup-permohonan', [App\Http\Controllers\UpenController::class, 'allow_permohonan'])->name('upens.tetapan.permohonan.allow');

    Route::get('/dashboard-pejabat-UPEN/tetapan/tetapan-permohonan/batch-baru', [App\Http\Controllers\UpenController::class, 'new_batch'])->name('upens.tetapan.permohonan.batch-baru');

    Route::get('/dashboard-pejabat-UPEN/tetapan/tetapan-permohonan/tetapan-semula-batch', [App\Http\Controllers\UpenController::class, 'reset_batch'])->name('upens.tetapan.permohonan.reset-batch');


    Route::get('/dashboard-pejabat-UPEN/tetapan/tetapan-pengumuman', [App\Http\Controllers\UpenController::class, 'tetapan_pengumuman'])->name('upens.tetapan.pengumuman');

    Route::get('/dashboard-pejabat-UPEN/tetapan/tetapan-pengumuman/pengumuman-baru', [App\Http\Controllers\UpenController::class, 'pengumuman_baru'])->name('upens.tetapan.pengumuman.baru');

    Route::get('/dashboard-pejabat-UPEN/tetapan/tetapan-pengumuman/pengumuman-submit', [App\Http\Controllers\UpenController::class, 'pengumuman_baru_submit'])->name('upens.tetapan.pengumuman.baru.submit');

});


//ADMIN ROUTE
Route::middleware([Admin::class])->group(function () {

    Route::get('/dashboard-admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admins.dashboard');



    // Pengguna
    Route::get('/dashboard-admin/pengguna', [App\Http\Controllers\AdminController::class, 'pengguna'])->name('admins.pengguna.pilih');

    // Pengguna : Pemohon
    Route::get('/dashboard-admin/pengguna/senarai-pemohon', [App\Http\Controllers\AdminController::class, 'pemohon'])->name('admins.pengguna.pemohon');

    Route::get('/dashboard-admin/pengguna/senarai-pemohon/tukar-status', [App\Http\Controllers\AdminController::class, 'pemohon_change_status'])->name('admins.pengguna.pemohon.tukar-status');

    Route::get('/dashboard-admin/pengguna/senarai-pemohon/kemaskini-maklumat-pemohon', [App\Http\Controllers\AdminController::class, 'kemaskini_pemohon'])->name('admins.pengguna.pemohon.papar');

    Route::get('/dashboard-admin/pengguna/senarai-pemohon/kemaskini-maklumat-pemohon/update', [App\Http\Controllers\AdminController::class, 'kemaskini_pemohon_update'])->name('admins.pengguna.pemohon.papar.update');

    // Pengguna : Pengguna Dalaman
    Route::get('/dashboard-admin/pengguna/senarai-pengguna-dalaman', [App\Http\Controllers\AdminController::class, 'pengguna_dalaman'])->name('admins.pengguna.pengguna-dalaman');

    Route::get('/dashboard-admin/pengguna/senarai-pengguna-dalaman/tukar-status', [App\Http\Controllers\AdminController::class, 'pengguna_dalaman_change_status'])->name('admins.pengguna.pengguna-dalaman.tukar-status');

    Route::get('/dashboard-admin/pengguna/senarai-pengguna-dalaman/daftar-pengguna-dalaman', [App\Http\Controllers\AdminController::class, 'pengguna_dalaman_daftar'])->name('admins.pengguna.pengguna-dalaman.daftar');

    Route::get('/dashboard-admin/pengguna/senarai-pengguna-dalaman/daftar-pengguna-dalaman/daftar', [App\Http\Controllers\AdminController::class, 'pengguna_dalaman_daftar_submit'])->name('admins.pengguna.pengguna-dalaman.daftar.submit');

    Route::get('/dashboard-admin/pengguna/senarai-pengguna-dalaman/kemaskini-maklumat-pengguna', [App\Http\Controllers\AdminController::class, 'kemaskini_maklumat'])->name('admins.pengguna.pengguna-dalaman.kemaskini-maklumat-pengguna');

    Route::get('/dashboard-admin/pengguna/senarai-pengguna-dalaman/kemaskini-maklumat-pengguna/kemaskini', [App\Http\Controllers\AdminController::class, 'kemaskini_maklumat_update'])->name('admins.pengguna.pengguna-dalaman.kemaskini-maklumat-pengguna.kemaskini');



    // Rumah Ibadat
    Route::get('/dashboard-admin/rumah-ibadat', [App\Http\Controllers\AdminController::class, 'rumah_ibadat'])->name('admins.rumah-ibadat.pilih');

    Route::get('/dashboard-admin/rumah-ibadat/senarai-rumah-ibadat', [App\Http\Controllers\AdminController::class, 'senarai_rumah_ibadat'])->name('admins.rumah-ibadat.senarai');

    Route::get('/dashboard-admin/rumah-ibadat/senarai-rumah-ibadat/kemaskini-rumah-ibadat', [App\Http\Controllers\AdminController::class, 'senarai_rumah_ibadat_papar'])->name('admins.rumah-ibadat.senarai.papar');

    Route::get('/dashboard-admin/rumah-ibadat/senarai-rumah-ibadat/kemaskini-rumah-ibadat/update', [App\Http\Controllers\AdminController::class, 'update_rumah_ibadat'])->name('admins.rumah-ibadat.senarai.update');


    //Tetapan
    Route::get('/dashboard-admin/tetapan', [App\Http\Controllers\AdminController::class, 'tetapan'])->name('admins.tetapan.pilih');

    Route::get('/dashboard-admin/tetapan/tetapan-halaman-utama', [App\Http\Controllers\AdminController::class, 'halaman_utama'])->name('admins.tetapan.halaman-utama');

    Route::post('/dashboard-admin/tetapan/tetapan-halaman-utama/submit', [App\Http\Controllers\AdminController::class, 'halaman_utama_submit'])->name('admins.tetapan.halaman-utama.submit');


    // Audit Trail
    Route::get('/dashboard-admin/audit-trail', [App\Http\Controllers\AdminController::class, 'audit_trail'])->name('admins.audit-trail.pilih');

    Route::get('/dashboard-admin/audit-trail/audit-trail-proses', [App\Http\Controllers\AdminController::class, 'audit_trail_process'])->name('admins.audit-trail.proses');

    Route::get('/dashboard-admin/audit-trail/audit-trail-log-akses', [App\Http\Controllers\AdminController::class, 'audit_trail_log_user'])->name('admins.audit-trail.log-user');

});


//SUPER ADMIN ROUTE (not used)
Route::middleware([SuperAdmin::class])->group(function () {
    Route::get('/super-admin/halaman-utama', [App\Http\Controllers\HomeController::class, 'index_super_admin'])->name('super-admin.halaman-utama');
});


