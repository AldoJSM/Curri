<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProfileController::class, 'regresarCountry'])->name('regresarCountry');
Route::post('/profile', [ProfileController::class, 'registerProfile'])->name('registerProfile');
Route::get('/consulta-ajax', [ProfileController::class, 'consultaAjax'])->name('consultaAjax');
Route::get('/getMunicipios', [ProfileController::class, 'getMunicipios'])->name('getMunicipios');
