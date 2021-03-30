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

// Example Routes
Route::get('/', function () {
    return \Illuminate\Support\Facades\Redirect::route('dashboard');
});
Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
//Route::match(['get', 'post'], '/dashboard', function(){
//    return view('admin.dashboard');
//});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//proyectos
Route::get('/proyects', [App\Http\Controllers\ProyectController::class, 'index'])->name('proyects');
Route::get('/proyects/create', [App\Http\Controllers\ProyectController::class, 'create'])->name('proyects.create');
Route::post('/proyects/store', [App\Http\Controllers\ProyectController::class, 'store'])->name('proyects.store');
Route::get('/proyect/{nameproyect?}', [App\Http\Controllers\ProyectController::class, 'show'])->name('proyect.view');


Route::get('/config-db-refactori-dev-2021-03-29', function() {
    $exitCode = Artisan::call('migrate:fresh');
    $exitCode = Artisan::call('db:seed --class=UserSeeder');
    $exitCode = Artisan::call('db:seed --class=ProyectSeeder');
    $exitCode = Artisan::call('db:seed --class=DocumentSeeder');
    return 'refresh db Ok';
});

Route::get('/config-clean-cache-dev-2021-03-29', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:cache');
    return 'refresh cache Ok';
});
