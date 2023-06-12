<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakDaruratController;
use App\Http\Controllers\LaporanBencanaController;
use App\Http\Controllers\MitigasiBencanaController;
use App\Http\Controllers\PeringatanDiniController;
use App\Http\Controllers\RawanBencanaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Models\VisiMisi;
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

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');


/** Public */
// Beranda
Route::get('/', [WeatherController::class, 'getWeather'])->name('public');


//Pdf
// Route::post('/laporan-bencana/export', [LaporanBencanaController::class, 'export'])->name('laporan-bencana.export');
Route::post('/laporan-bencana/export-pdf', [LaporanBencanaController::class, 'exportPDF'])->name('laporan-bencana.export-pdf');

//Excel
// Route::get('/export-csv', 'ExportController@exportCSV',)->name('export.csv');

// Route::get('/export-csv', [LaporanBencanaController::class, 'exportExcel']);
Route::get('/export-excel', 'App\Http\Controllers\LaporanBencanaController@exportExcel')->name('export-excel');





Route::get('/show-form', [LaporanBencanaController::class, 'showForm']);
Route::get('/get-desa-by-kecamatan', [LaporanBencanaController::class, 'getDesaByKecamatan']);


// Mitigasi Bencana
Route::get('/public/mitigasi/bencana', [MitigasiBencanaController::class, 'indexPublic'])->name('mitigasi.public');
Route::get('/public/mitigasi/bencana/{id}', [MitigasiBencanaController::class, 'showPublic'])->name('mitigasi.public.detail');

// Laporan Bencana
Route::get('/public/laporan', [LaporanBencanaController::class, 'publicAdd'])->name('report.add');
// Route::post('/public/laporan/add', [LaporanBencanaController::class, 'publicStore'])->name('report.store');
Route::get('/laporan/{id}/detail', [LaporanBencanaController::class, 'detailPublic'])->name('report.detail');
//Fetail Artikel
Route::get('/artikel/{id}/detail', [ArtikelController::class, 'ArtikelPublic'])->name('artikel.detail');
// Data Bencana
Route::get('/bencana/alam', [LaporanBencanaController::class, 'bencanaAlam'])->name('bencana.alam');
Route::get('/bencana/nonalam', [LaporanBencanaController::class, 'bencanaNonAlam'])->name('bencana.nonalam');
Route::get('/bencana/sosial', [LaporanBencanaController::class, 'bencanaSosial'])->name('bencana.sosial');

// Profil BPBD
Route::get('/bpbd/profil', [HomeController::class, 'profile_bpbd'])->name('bpbd.profil');

// Registrasi
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi', [AuthController::class, 'registrasiStore'])->name('registrasi');

/** Auth All User */
Route::group(['middleware' => ['auth', 'checkRoleUser:pra_bencana,admin,tanggap_darurat,pasca_bencana,user']], function() {
    // Add Laporan from all user
    Route::post('/public/laporan/add', [LaporanBencanaController::class, 'publicStore'])->name('report.store');

    // Manage User Account
    Route::get('/users', [UserController::class, 'indexAdmin'])->name('users.index');
    Route::post('/users', [UserController::class, 'addAdmin'])->name('users.add');
    Route::put('/users', [UserController::class, 'updateAdmin'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'deleteAdmin'])->name('users.delete');
    Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile.index');
    Route::put('/users/profile/update', [UserController::class, 'updateProfile'])->name('users.profile.update');

    // Manage Kontak Darurat
    Route::get('/contacts', [KontakDaruratController::class, 'indexAdmin'])->name('kontak.index');
    Route::post('/contacts', [KontakDaruratController::class, 'addAdmin'])->name('kontak.add');
    Route::put('/contacts', [KontakDaruratController::class, 'updateAdmin'])->name('kontak.update');
    Route::delete('/contacts/{id}', [KontakDaruratController::class, 'deleteAdmin'])->name('kontak.delete');

    // Manage Visi Misi
    Route::get('/visi', [VisiMisiController::class, 'indexAdmin'])->name('profile.index');
    Route::post('/visi', [VisiMisiController::class, 'addAdmin'])->name('visimisi.add');
    Route::get('/visi/{id}/edit', [VisiMisiController::class, 'editAdmin'])->name('visimisi.edit');
    Route::put('/visi/{id}', [VisiMisiController::class, 'updateAdmin'])->name('visimisi.update');
    Route::delete('/visi/{id}', [VisiMisiController::class, 'deleteAdmin'])->name('visimisi.delete');

    //Manage Pengurus
    Route::get('/pengurus', [PetugasController::class, 'indexAdmin'])->name('petugas.index');
    Route::post('/pengurus', [PetugasController::class, 'addAdmin'])->name('petugas.add');
    Route::get('/pengurus/{id}/edit', [PetugasController::class, 'editAdmin'])->name('pengurus.edit');
    Route::put('/pengurus/{id}', [PetugasController::class, 'updateAdmin'])->name('pengurus.update');
    Route::delete('/pengurus/{id}',[PetugasController::class, 'deleteAdmin'])->name('petugas.delete');


    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/** Auth without general user */
Route::group(['middleware' => ['auth', 'checkRoleUser:pra_bencana,admin,tanggap_darurat,pasca_bencana']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Artikel
    Route::get('/articles', [ArtikelController::class, 'indexAdmin'])->name('artikel.index');
    Route::post('/articles', [ArtikelController::class, 'addAdmin'])->name('artikel.add');
    Route::get('/articles/{id}/edit', [ArtikelController::class, 'editAdmin'])->name('artikel.edit');
    Route::put('/articles/{id}', [ArtikelController::class, 'updateAdmin'])->name('artikel.update');
    Route::delete('/articles/{id}', [ArtikelController::class, 'deleteAdmin'])->name('artikel.delete');

    // Report
    Route::get('/laporan/bencana', [LaporanBencanaController::class, 'indexAdmin'])->name('laporan_bencana.index');
    Route::get('/laporan/bencana/{id}', [LaporanBencanaController::class, 'detailAdmin'])->name('laporan_bencana.detail');
    Route::post('/laporan/bencana/read', [LaporanBencanaController::class, 'markNotification'])->name('admin.markNotification');
});

/** Auth Pra Bencana */
Route::group(['middleware' => ['auth', 'checkRoleUser:pra_bencana,admin']], function() {
    // Peringatan Dini
    Route::get('/peringatan/dini', [PeringatanDiniController::class, 'indexAdmin'])->name('peringatan_dini.index');
    Route::post('/peringatan/dini', [PeringatanDiniController::class, 'addAdmin'])->name('peringatan_dini.add');
    Route::put('/peringatan/dini', [PeringatanDiniController::class, 'updateAdmin'])->name('peringatan_dini.update');
    Route::delete('/peringatan/dini/{id}', [PeringatanDiniController::class, 'deleteAdmin'])->name('peringatan_dini.delete');

    // Rawan Bencana
    Route::get('/rawan/bencana', [RawanBencanaController::class, 'indexAdmin'])->name('rawan_bencana.index');
    Route::post('/rawan/bencana', [RawanBencanaController::class, 'addAdmin'])->name('rawan_bencana.add');
    Route::put('/rawan/bencana', [RawanBencanaController::class, 'updateAdmin'])->name('rawan_bencana.update');
    Route::delete('/rawan/bencana/{id}', [RawanBencanaController::class, 'deleteAdmin'])->name('rawan_bencana.delete');

    //Kecamatan
    Route::get('data/kecamatan', [KecamatanController::class, 'indexAdmin'])->name('kecamatan.index');
    Route::post('data/kecamatan', [KecamatanController::class, 'addAdmin'])->name('kecamatan.add');
    Route::put('data/kecamatan', [KecamatanController::class, 'updateAdmin'])->name('kecamatan.update');
    Route::delete('data/kecamatan/{id}', [KecamatanController::class, 'deleteAdmin'])->name('kecamatan.delete');

    //Desa
    Route::get('data/desa', [DesaController::class, 'indexAdmin'])->name('desa.index');
    Route::post('data/desa', [DesaController::class, 'addAdmin'])->name('desa.add');
    Route::put('data/desa', [DesaController::class, 'updateAdmin'])->name('desa.update');
    Route::delete('data/desa/{id}', [DesaController::class, 'deleteAdmin'])->name('desa.delete');

    // Mitigasi Bencana
    Route::get('/mitigasi/bencana', [MitigasiBencanaController::class, 'indexAdmin'])->name('mitigasi_bencana.index');
    Route::post('/mitigasi/bencana', [MitigasiBencanaController::class, 'addAdmin'])->name('mitigasi_bencana.add');
    Route::put('/mitigasi/bencana', [MitigasiBencanaController::class, 'updateAdmin'])->name('mitigasi_bencana.update');
    Route::delete('/mitigasi/bencana/{id}', [MitigasiBencanaController::class, 'deleteAdmin'])->name('mitigasi_bencana.delete');
});

/** Auth Tanggap Darurat */
Route::group(['middleware' => ['auth', 'checkRoleUser:tanggap_darurat,admin,user']], function() {
    // Manage Laporan Bencana
    Route::get('/show-form', [LaporanBencanaController::class, 'showForm']);
    Route::get('/get-desa-by-kecamatan', [LaporanBencanaController::class, 'getDesaByKecamatanadmin']);
    Route::post('/laporan/bencana', [LaporanBencanaController::class, 'addAdmin'])->name('laporan_bencana.add');
    Route::put('/laporan/bencana', [LaporanBencanaController::class, 'updateAdmin'])->name('laporan_bencana.update');
    Route::get('/show-form', [LaporanBencanaController::class, 'showForm']);
    Route::get('/get-desa-by-kecamatans', [LaporanBencanaController::class, 'getDesaByKecamatanedit']);
    Route::delete('/laporan/bencana/{id}', [LaporanBencanaController::class, 'deleteAdmin'])->name('laporan_bencana.delete');
    Route::get('/laporan/bencana/{id}/confirm', [LaporanBencanaController::class, 'confirmAdmin'])->name('laporan_bencana.confirm');
    Route::put('/laporan/bencana/{id}/reject', [LaporanBencanaController::class, 'rejectAdmin'])->name('laporan_bencana.reject');
    Route::put('/laporan/bencana/{id}/process', [LaporanBencanaController::class, 'processAdmin'])->name('laporan_bencana.process');
    Route::put('/laporan/bencana/{id}/complete', [LaporanBencanaController::class, 'completeAdmin'])->name('laporan_bencana.complete');
});

Route::group(['middleware' => ['auth', 'checkRoleUser:tanggap_darurat,pasca_bencana,admin']], function() {

});

Route::group(['middleware' => ['auth', 'checkRoleUser:pasca_bencana,admin']], function() {
    Route::get('/dampak/bencana/{id}', [LaporanBencanaController::class, 'updateDampakBencanaAdmin'])->name('dampak_bencana.edit');
    Route::put('/dampak/bencana/{id}', [LaporanBencanaController::class, 'updateDampakBencanaAdminStore'])->name('dampak_bencana.update');
});

Route::group(['middleware' => ['auth', 'checkRoleUser:user']], function() {
    //LAPORANKU
    Route::get('/public/laporan/laporanku', [LaporanBencanaController::class, 'indexPublic'])->name('laporanku.public');
});

Route::group(['middleware' => ['auth', 'checkRoleUser:admin']], function() {
});
