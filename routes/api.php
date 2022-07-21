<?php

use App\Http\Controllers\api\v1\DepartmentController;
use App\Http\Controllers\api\v1\JabatanController;
use App\Http\Controllers\api\v1\KaryawanController;
use App\Http\Controllers\api\v1\LevelController;
use App\Http\Controllers\api\v1\TestOneController;
use App\Http\Controllers\api\v1\TestTwoController;
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

Route::post('/v1/test-one', [TestOneController::class, 'store']);
Route::post('/v1/test-two', [TestTwoController::class, 'store']);

Route::post('/v1/department/update', [DepartmentController::class, 'update']);
Route::resource('/v1/department', DepartmentController::class)->except('create', 'edit', 'update');

Route::post('/v1/level/update', [LevelController::class, 'update']);
Route::resource('/v1/level', LevelController::class)->except('create', 'edit', 'update');

Route::post('/v1/jabatan/update', [JabatanController::class, 'update']);
Route::resource('/v1/jabatan', JabatanController::class)->except('create', 'edit', 'update');

Route::post('/v1/karyawan/update', [KaryawanController::class, 'update']);
Route::resource('/v1/karyawan', KaryawanController::class)->except('create', 'edit', 'update');
