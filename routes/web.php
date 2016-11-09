<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            web.php
 */

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
Route::get('/','GeneralController@index');
Route::get('suburbs', 'GeneralController@getSuburbs');
Route::get('brands', 'GeneralController@getBrands');


Route::get('home','GeneralController@index');



// ********** VehicleController **********
Route::get('vehicles', 'VehicleController@allVehicles');


// ********** CustomerController **********
Route::get('customers', 'CustomerController@allCustomers');

// To add a Customer we display a form then the form submits the data
// First we display a view with a Form on it
Route::get('customer', 'CustomerController@displayAddCustomerForm');

// then the form calls the ROUTE to save the data
Route::put('customer', 'CustomerController@addCustomer');

// To update a Customer we display a form then the form submits the data
// First we display a view with a update Form on it
Route::get('customer/{customer}', 'CustomerController@displayUpdateCustomerForm');

// Then the FORM calls the ROUTE to EDIT the Customer
Route::post('customer/update', 'CustomerController@updateCustomer');

// Delete Customer
Route::delete('customer/{customer}', 'CustomerController@deleteCustomer');


//
//// ********** VehicleController **********
//Route::get('vehicles', 'VehicleController@allVehicles');

// To add a Vehicle we display a form then the form submits the data
// First we display a view with a Form on it
Route::get('vehicle', 'VehicleController@displayAddVehicleForm');

// then the form calls the ROUTE to save the data
Route::put('vehicle', 'VehicleController@addVehicle');

// To update a  Hire Rate for Vehicle we display a form then the form submits the data
// First we display a view with a update Form on it
Route::get('vehicle/{vehicle}', 'VehicleController@displayUpdateHireRateForm');

// Then the FORM calls the ROUTE to EDIT the Customer
Route::post('vehicle/update', 'VehicleController@updateHireRate');

// Retire Vehicle
Route::post('vehicle/retire/{vehicle}', 'VehicleController@retireVehicle');



// ********** ListController **********
// display form with drop down for customer
Route::get('list', 'ListController@listByCustomerForm');
// display the list of bookings for the chosen customer
Route::post('list/bookings', 'ListController@listBookingsByCustomer');
// display the list of damages for the chosen customer
Route::post('list/damages', 'ListController@listDamagesByCustomer');



// ********** ReportController **********
Route::get('report/damage', 'ReportController@showDamagesReport');
Route::get('report/fault', 'ReportController@showFaultsReport');



// ********** ArchiveController **********
Route::get('archive', 'ArchiveController@showArchiveForm');
Route::post('archive', 'ArchiveController@archiveBookings');






// ********** StaffController **********
Route::get('register', 'StaffController@registerStaffMember');
Route::get('login', 'StaffController@login');
Route::get('logout', 'StaffController@logout');



Auth::routes();

