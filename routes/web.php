<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("contactos", "App\\Http\\Controllers\\ContactoController");
Route::resource("tiposredes", "App\Http\Controllers\TiporedController")
    ->parameters(["tiposredes"=>"tipored"]);
Route::resource("contactos.redessociales", "App\\Http\\Controllers\\RedsocialController")
    ->parameters(["contactos"=>"contacto", "redessociales" => "redsocial"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
