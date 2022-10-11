<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\web\EventoController;
use App\Http\Controllers\web\FotografiaController;
use App\Http\Controllers\web\FotografoController;
use App\Http\Controllers\web\PerfilController;
use App\Http\Controllers\web\WelcomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[WelcomeController::class,'welcome'])->name('welcome');
Route::get('/upload-create',[FotografiaController::class,'create'])->middleware(['auth'])->name('fotografia.create');
//Route::post('/upload-create',[FotografiaController::class,'store'])->name('fotografia.store');

//*******EVENTO */
Route::get('/evento',[EventoController::class,'index'])->middleware(['auth'])->name('evento.index');
Route::post('/evento',[EventoController::class,'store'])->middleware(['auth'])->name('evento.store');
Route::get('/evento/{id}',[EventoController::class,'edit'])->middleware(['auth'])->name('evento.edit');
Route::put('/evento/{id}',[EventoController::class,'update'])->middleware(['auth'])->name('evento.update');
Route::get('/evento-share/{id}',[EventoController::class,'compartir'])->middleware(['auth'])->name('evento.compartir');

Route::delete('/evento/{id}',[EventoController::class,'destroy'])->middleware(['auth'])->name('evento.destroy');
Route::post('/evento-fotografos/{id}',[EventoController::class,'fotografosEvento'])->middleware(['auth'])->name('evento.fotografos');
//*******FOTOGRAFIA */
Route::get('/fotografia',[FotografiaController::class,'index'])->middleware(['auth'])->name('fotografia.index');
Route::post('/fotografia',[FotografiaController::class,'store'])->middleware(['auth'])->name('fotografia.store');
Route::get('/Perfil',[PerfilController::class,'index'])->middleware(['auth'])->name('perfil.index');
//*******FOTOGRAFO */
Route::get('fotografo',[FotografoController::class,'index'])->middleware(['auth'])->name('fotografo.index');

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');
