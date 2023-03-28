<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanBencanaController;
use App\Http\Controllers\RawanBencanaController;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth', 'checkRoleUser:pra_bencana,admin,tanggap_darurat']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['auth', 'checkRoleUser:pra_bencana']], function() {
    Route::get('/rawan/bencana', [RawanBencanaController::class, 'indexAdmin'])->name('rawan_bencana.index');
    Route::post('/rawan/bencana', [RawanBencanaController::class, 'addAdmin'])->name('rawan_bencana.add');
    Route::put('/rawan/bencana', [RawanBencanaController::class, 'updateAdmin'])->name('rawan_bencana.update');
    Route::delete('/rawan/bencana/{id}', [RawanBencanaController::class, 'deleteAdmin'])->name('rawan_bencana.delete');
});

Route::group(['middleware' => ['auth', 'checkRoleUser:tanggap_darurat']], function() {
    Route::get('/laporan/bencana', [LaporanBencanaController::class, 'indexAdmin'])->name('laporan_bencana.index');
    Route::post('/laporan/bencana', [LaporanBencanaController::class, 'addAdmin'])->name('laporan_bencana.add');
    // Route::put('/rawan/bencana', [RawanBencanaController::class, 'updateAdmin'])->name('rawan_bencana.update');
    // Route::delete('/rawan/bencana/{id}', [RawanBencanaController::class, 'deleteAdmin'])->name('rawan_bencana.delete');
});

Route::group(['middleware' => ['auth', 'checkRoleUser:pasca_bencana']], function() {
});

Route::group(['middleware' => ['auth', 'checkRoleUser:user']], function() {
});

Route::group(['middleware' => ['auth', 'checkRoleUser:admin']], function() {
});
