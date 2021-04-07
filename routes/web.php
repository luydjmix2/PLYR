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
Route::get('/group/user/create/{id_group}', [App\Http\Controllers\GroupUserController::class, 'create'])->name('group.user.create');
Route::post('/group/user/update', [App\Http\Controllers\GroupUserController::class, 'store'])->name('group.user.store');
Route::get('/group/user/edit/{id_group}/{id}', [App\Http\Controllers\GroupUserController::class, 'edit'])->name('group.user.edit');
Route::post('/group/user/edit/update', [App\Http\Controllers\GroupUserController::class, 'update'])->name('group.user.update');
Route::get('/group/user/remove/{id_user?}', [App\Http\Controllers\GroupUserController::class, 'destroy'])->name('group.user.remove');


Route::get('/config-db-refactori-dev-2021-03-29', function() {
    $exitCode = Artisan::call('migrate:fresh');
    $exitCode = Artisan::call('db:seed --class=UserSeeder');
    $exitCode = Artisan::call('db:seed --class=ProyectSeeder');
    $exitCode = Artisan::call('db:seed --class=DocumentSeeder');
    $exitCode = Artisan::call('db:seed --class=TeamSeeder');
    return 'refresh db Ok';
});

    Route::get('/config-clean-cache-dev-2021-03-29', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:cache');
    return 'refresh cache Ok';
});
