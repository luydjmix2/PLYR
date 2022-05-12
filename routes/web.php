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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'manager-panel'], function () {
    Route::get("/dashboard", [App\Http\Controllers\Admin\DashboardController::class, "index"])->name("dashboard");
    Route::get("/dashboard/register/add", [App\Http\Controllers\Admin\DashboardController::class, "createRegister"])->name("dashboard.register.add");
    Route::get("/dashboard/document/add", [App\Http\Controllers\Admin\DashboardController::class, "createDocuments"])->name("dashboard.document.add");

    Route::get("/mygroups", [App\Http\Controllers\Admin\MyGroupController::class, "index"])->name("mygroups");
    Route::get("/mygroups/add", [App\Http\Controllers\Admin\MyGroupController::class, "create"])->name("mygroups.add");

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


//Route::get('/config-db-refactori-dev-2021-03-29', function() {
//    $exitCode = Artisan::call('migrate:fresh');
//    $exitCode = Artisan::call('db:seed --class=UserSeeder');
//    $exitCode = Artisan::call('db:seed --class=ProyectSeeder');
//    $exitCode = Artisan::call('db:seed --class=CompanySeeder');
//    $exitCode = Artisan::call('db:seed --class=DocumentSeeder');
//    $exitCode = Artisan::call('db:seed --class=TeamSeeder');
//    $exitCode = Artisan::call('db:seed --class=AlertSeeder');
//    $exitCode = Artisan::call('db:seed --class=UseralertSeeder');
//    return 'refresh db Ok';
//});

Route::get('/config-clean-cache-dev-2021-03-29', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:cache');
    return 'refresh cache Ok';
});
