<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            ListController.php
 */

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

/**
 * Class ListController
 * @package App\Http\Controllers
 */
class ListController extends Controller
{
    /** The constructor has code to restrict access to users that are logged in */
    public function __construct() {
        $this->middleware('auth');
    }


    /**
     * Fetch form for list by customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listByCustomerForm(){

        // fetch ALL customers that are not flagged deleted from db
        $cust = app('App\Http\Controllers\CustomerController')->getAllNotDeletedCustomers();

        // make sure to pass empty $joinTable and empty $joinTableDamages
        $joinTable = [];
        $joinTableDamages = [];

        // make sure to pass in null for $customerIdDropDownSelected
        $customerIdSelected = null;

        return View('list.listByCustomer',
                ['customers' => $cust,
                'joinTable' => $joinTable,
                'joinTableDamages' => $joinTableDamages,
                'customerIdSelected' => $customerIdSelected]);
    }


    /**
     * show list of bookings for specific customer, excluding archived bookings
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listBookingsByCustomer(Request $request){

        // fetch ALL customers that are not flagged deleted from db
        $cust = app('App\Http\Controllers\CustomerController')->getAllNotDeletedCustomers();

        // make sure to pass empty $joinTableDamages
        $joinTableDamages = [];

        $customerIdSelected = $request->customer_id;

        // create a Collection based on a join of 4 tables
        $joinTable = DB::table('bookings')
            ->join('customers', 'bookings.fldCustomerId', '=', 'customers.id')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.fldCarId')
            ->leftJoin('damages', 'bookings.id', '=', 'damages.fldBookingNo')
            ->where('customers.id', '=', $customerIdSelected)
            ->orderBy('bookings.fldStartDate', 'desc')->get();

        return View('list.listByCustomer',
                ['customers' => $cust,
                'joinTable' => $joinTable,
                'joinTableDamages' => $joinTableDamages,
                'customerIdSelected' => $customerIdSelected]);
    }


    /**
     * show list of damages for specific customer, excluding damages belonging to archived bookings
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listDamagesByCustomer(Request $request){

        // fetch ALL customers that are not flagged deleted from db
        $cust = app('App\Http\Controllers\CustomerController')->getAllNotDeletedCustomers();

        // make sure to pass empty $joinTable
        $joinTable = [];

        $customerIdSelected = $request->customer_id;

        // create a Collection based on a join of 4 tables
        $joinTableDamages = DB::table('bookings')
            ->join('customers', 'bookings.fldCustomerId', '=', 'customers.id')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.fldCarId')
            ->join('damages', 'bookings.id', '=', 'damages.fldBookingNo')
            ->where('customers.id', '=', $customerIdSelected)
            ->orderBy('damages.fldDamageDate', 'desc')->get();

        return View('list.listByCustomer',
                ['customers' => $cust,
                'joinTable' => $joinTable,
                'joinTableDamages' => $joinTableDamages,
                'customerIdSelected' => $customerIdSelected]);
    }
}
