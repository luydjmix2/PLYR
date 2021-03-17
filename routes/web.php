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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//portal web
//Route::get('/', [App\Http\Controllers\PortalController::class, 'index'])->name('index');
Route::get('/', function () {
    return redirect()->route('login');
})->name('index');

//administracion
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/edirUser', [App\Http\Controllers\AdminController::class, 'editUser'])->name('editUser');

Route::get('/databases', function () {
    return 'esta es una ruta vacia';
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas usuarios

Route::resource('/admin/users', 'App\Http\Controllers\UserController');
Route::resource('/admin/documents', 'App\Http\Controllers\DocumentController');
Route::resource('/admin/groups', 'App\Http\Controllers\GroupController');
Route::resource('/admin/proyects', 'App\Http\Controllers\ProyectController');