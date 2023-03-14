<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\LaporanBencanaController;
use App\Http\Controllers\RawanBencanaController;
use App\Models\RawanBencana;
use Illuminate\Http\Request;
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

// Route for admin
Route::group(['middleware' => ['auth:sanctum', 'checkRole:admin']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('/tasks', TaskController::class);
    Route::resource('/rawan/bencana', RawanBencanaController::class)->except(['show']);
    Route::resource('/laporan/bencana', LaporanBencanaController::class)->except(['show']);
    Route::put('/dampak/bencana/{bencana}', [LaporanBencanaController::class, 'updateDampakBencana']);
});
