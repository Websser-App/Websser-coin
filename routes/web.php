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
    return view('auth.login');
});


Route::get('inicio', function () {
    return view('auth.login');
})->name('inicio');

route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
route::post('loginForm', [App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->name('loginForm');
route::get('registration', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('registration');
route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
route::post('validation/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'validation'])->name('validation');
route::get('resendCode/{id}', [App\Http\Controllers\Auth\RegisterController::class, 'resendCode'])->name('resendCode');
route::post('completedRegister', [App\Http\Controllers\Auth\RegisterController::class, 'completedRegister'])->name('completedRegister');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('building', 'BuildingController');
Route::resource('tenants', 'TenantsController')->except('create','destroy','edit','show', 'update');
route::get('tenants/{id}/create', 'TenantsController@create')->name('tenants.create');
Route::resource('departaments', 'DepatamentsController')->except('create','destroy','edit', 'update');
route::get('departaments/{id}/create', 'DepatamentsController@create')->name('departaments.create');
Route::resource('bills', 'BillsController')->except('show','destroy','edit', 'update');
Route::resource('vouchers', 'VoucherController')->except('show','destroy','edit', 'update');



