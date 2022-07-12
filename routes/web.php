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
route::post('ajaxImageUploadPost', [App\Http\Controllers\Auth\RegisterController::class, 'ajaxImageUploadPost'])->name('ajaxImageUploadPost');
route::post('/ajaxIneFrontUploadPost', [App\Http\Controllers\Auth\RegisterController::class, 'ajaxIneFrontUploadPost'])->name('ajaxIneFrontUploadPost');
route::post('/ajaxIneBackUploadPost', [App\Http\Controllers\Auth\RegisterController::class, 'ajaxIneBackUploadPost'])->name('ajaxIneBackUploadPost');
route::post('/ajaxCertificateUploadPost', [App\Http\Controllers\Auth\RegisterController::class, 'ajaxCertificateUploadPost'])->name('ajaxCertificateUploadPost');
route::post('completedRegister', [App\Http\Controllers\Auth\RegisterController::class, 'completedRegister'])->name('completedRegister');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('building', 'BuildingController');

Route::resource('tenants', 'TenantsController')->except('create','destroy','show');
route::get('tenants/{id}/create', 'TenantsController@create')->name('tenants.create');

Route::resource('departaments', 'DepatamentsController')->except('create','destroy','edit', 'update');
route::get('departaments/{id}/create', 'DepatamentsController@create')->name('departaments.create');

Route::resource('bills', 'BillsController')->except('show');
Route::get('bills/tenants/{id}', 'BillsController@tenants')->name('bills.tenants');
Route::get('bills/tenants/sendEmail/{id}', 'BillsController@sendEmail')->name('sendEmail');
Route::get('bills/tenants/paymentReport/{id}', 'BillsController@paymentReport')->name('paymentReport');
Route::get('bills/tenants/downloadPDF/{id}', 'BillsController@downloadPDF')->name('downloadPDF');
Route::post('bills/tenants/paid/{id}', 'BillsController@paid')->name('bills.paid');
Route::post('bills/tenants/notPayed/{id}', 'BillsController@notPayed')->name('bills.notPayed');


Route::resource('vouchers', 'VoucherController')->except('show','destroy','edit', 'update');

Route::resource('tenantpayments', 'TenantPaymentsController')->except('show', 'create', 'store');
Route::post('tenantpayments/storeDepartament', 'TenantPaymentsController@storeDepartament')->name('tenantpayments.storeDepartament');
Route::get('tenantpayments/wallet', 'TenantPaymentsController@wallet')->name('tenantpayments.wallet');
Route::post('tenantpayments/chooseBills', 'TenantPaymentsController@chooseBills')->name('tenantpayments.chooseBills');
Route::post('tenantpayments/generatePDF', 'TenantPaymentsController@generatePDF')->name('tenantpayments.generatePDF');



Route::get('/profile', 'UserController@profile')->name('profile');

Route::get('/packages', 'paymentsController@payment')->name('packages');
Route::get('/contacts', 'ContactsController@contact')->name('contacts');



