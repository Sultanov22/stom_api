<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'register', 'as' => 'register.'], function () {
        Route::post('/', [\App\Http\Controllers\loginController::class, 'register'])->name('register');
        Route::post('/login',[\App\Http\Controllers\loginController::class, 'login'])->name('login');
    });
});

Route::group(['prefix' => 'patients', 'as' => 'patients.'], function () {
    Route::get('/', [\App\Http\Controllers\PatientController::class, 'index'])->name('index');
    Route::post('/', [\App\Http\Controllers\PatientController::class, 'store'])->name('store');
    Route::put('/{id}/update', [\App\Http\Controllers\PatientController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [\App\Http\Controllers\PatientController::class, 'destroy'])->name('destroy');
});
