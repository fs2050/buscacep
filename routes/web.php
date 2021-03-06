<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSearch;


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


Route::get('/', [ControllerSearch::class, 'index'])->name('index');


Route::get('/buscar', [ControllerSearch::class, 'buscar'])->name('buscar');



Route::get('/search', [ControllerSearch::class, 'search'])->name('search');


Route::post('/salvar', [ControllerSearch::class, 'salvar'])->name('salvar');

Route::fallback(function () {
    echo 'A página acessada não existe. <a href="' . route('index') . '"> Voltar a Home</a>';
});
