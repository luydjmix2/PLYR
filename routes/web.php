<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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
    return Redirect::route('login');
});
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
//Route::match(['get', 'post'], '/dashboard', function(){
//    return view('admin.dashboard');
//});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Grupos
Route::get("/__('proyects.name')", [App\Http\Controllers\ProyectController::class, 'index'])->name('groups');
Route::get('/groups/create', [App\Http\Controllers\ProyectController::class, 'create'])->name('groups.create');
Route::post('/groups/store', [App\Http\Controllers\ProyectController::class, 'store'])->name('groups.store');
Route::get('/group/{namegroup?}', [App\Http\Controllers\ProyectController::class, 'show'])->name('group.view');
Route::post('/group/file', [App\Http\Controllers\ProyectController::class, 'updateFile'])->name('group.file');
Route::post('/group/user/create', [App\Http\Controllers\GroupUserController::class, 'create'])->name('group.user.create');



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
