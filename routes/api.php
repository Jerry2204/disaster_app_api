<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LaporanBencanaController;
use App\Http\Controllers\MitigasiBencanaController;
use App\Http\Controllers\PeringatanDiniController;
use App\Http\Controllers\RawanBencanaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected Routes
// Route for all users
Route::get('/rawan/bencana/{id}', [RawanBencanaController::class, 'show']);
Route::get('/laporan/bencana/{id}', [LaporanBencanaController::class, 'show']);
Route::put('/laporan/bencana/{id}', [LaporanBencanaController::class, 'update']);
Route::get('/laporan/bencana', [LaporanBencanaController::class, 'index']);
Route::get('/articles', [ArtikelController::class, 'index']);
Route::get('/mitigasi/bencana', [MitigasiBencanaController::class, 'index']);
Route::get('/mitigasi/bencana/{id}', [MitigasiBencanaController::class, 'show']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/laporan/bencanas', [LaporanBencanaController::class, 'store']);
});

Route::get('/peringatan/dini', [PeringatanDiniController::class, 'index']);

// Route for admin
Route::group(['middleware' => ['auth:sanctum', 'checkRole:admin']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('/tasks', TaskController::class);
    Route::resource('/rawan/bencana', RawanBencanaController::class)->except(['show', 'store']);
    Route::resource('/laporan/bencana', LaporanBencanaController::class)->except(['show', 'index', 'update']);
    Route::resource('/mitigasi/bencana', MitigasiBencanaController::class)->except(['show', 'index']);
    Route::put('/dampak/bencana/{bencana}', [LaporanBencanaController::class, 'updateDampakBencana']);
});

Route::get('/file/pdf', function () {
    $path = storage_path('app/public/pdf/example.pdf');

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);

    return response($file, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="example.pdf"',
    ]);
});
