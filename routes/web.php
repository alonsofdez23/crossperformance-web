<?php

use App\Http\Controllers\EntrenoController;
use App\Http\Controllers\ClaseController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('entrenos', EntrenoController::class);

    Route::resource('clases', ClaseController::class);

    Route::post('/clases/join/{clase}', [ClaseController::class, 'join'])
        ->name('clases.join');
    Route::post('/clases/leave/{clase}', [ClaseController::class, 'leave'])
        ->name('clases.leave');

    Route::get('/clases/{clase}/addEntreno', [ClaseController::class, 'addEntreno'])
        ->name('clases.addentreno');
    Route::post('/clases/{clase}/addEntreno', [ClaseController::class, 'addEntrenoUpdate'])
        ->name('clases.addentreno.update');
    Route::post('/clases/{clase}/deleteEntreno', [ClaseController::class, 'deleteEntrenoUpdate'])
        ->name('clases.deleteentreno.update');
});
