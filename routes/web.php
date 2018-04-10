<?php

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
Route::get('/home','HomeController@index');
Route::get('/adminlogin','AdminController@loginform')->name('loginform');

Route::post('/admin_login','AdminController@login')->name('login');


Route::get('/role','RolesController@index')->name('index');
Route::post('/role/store','RolesController@store')->name('store');
Route::get('/role/delete-roles/{id}','RolesController@destroy')->name('destroy');
Route::get('/role/edit-role/{id}','RolesController@edit')->name('edit');

Route::get('/member','MembersController@index')->name('index');

Route::get('/location','LocationsController@index')->name('index');
Route::get('/location/delete/{id}','LocationsController@destroy')->name('destroy');

Route::get('/admin-user','AdminController@index')->name('index');
Route::get('/admin-user/add-admin','AdminController@create')->name('create');
Route::get('/admin-user/edit-admin/{id}','AdminController@edit')->name('edit');
Route::get('/admin-user/delete-admin/{id}','AdminController@destroy')->name('destroy');
Route::post('/admin-user/store-admin','AdminController@store')->name('store');
Route::post('/admin-user/update-admin/','AdminController@update')->name('update');

Route::get('/payment','PaymentController@index')->name('index');
Route::get('/holiday-request-get-all-details','HolidayController@index')->name('index');

Route::get('/voucher','VoucherController@index')->name('index');

Route::get('/configuration-detail','ConfigurationController@index')->name('index');
Route::get('/configuration-detail/delete-config/{id}','ConfigurationController@destroy')->name('destroy');
Route::get('/configuration-detail/edit-config/{id}','ConfigurationController@edit')->name('edit');


Route::get('generate-pdf', 'PdfGenerateController@pdfview')->name('pdfview');
Route::get('/reportuser/{id}', 'ReportController@index')->name('index');

Route::group(['middlewere'=>'auth'],function(){

	Route::get('/home',function(){
		return view('home');
	})->name('home');
	Route::get('/dashboard','AdminController@dashboard')->name('dashboard');

    Route::get('/adminlogin','AdminController@loginform')->name('adminlogin');
	
});
