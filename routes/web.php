<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


// GeneralController
Route::get('/','GeneralController@index' );
Route::get('suburbs','GeneralController@getSuburbs' );
Route::get('brands','GeneralController@getBrands' );

// CustomerController
Route::get('customer','CustomerController@allCustomers' );
Route::get('customer/add','CustomerController@addCustomer' );
Route::get('customer/update','CustomerController@updateCustomer' );
Route::get('customer/delete','CustomerController@deleteCustomer' );

// VehicleController
Route::get('vehicle','VehicleController@index' );
Route::get('vehicle/add','VehicleController@addVehicle' );
Route::get('vehicle/retire','VehicleController@retireVehicle' );
Route::get('vehicle/rateupdate','VehicleController@updateHireRate' );

// ReportController
Route::get('report/damage','ReportController@showDamagesReport' );
Route::get('report/fault','ReportController@showFaultsReport' );

// ListController
Route::get('list/bookings','ListController@listBookingsByCustomer' );
Route::get('list/damages','ListController@listDamagesByCustomer' );

// ArchiveController
Route::get('archive','ArchiveController@index' );

// StaffController
Route::get('register','StaffController@registerStaffMember' );
Route::get('login','StaffController@login' );
Route::get('logout','StaffController@logout' );