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

    public function listBookingsByCustomerForm(){

        // the form will need a Customer DROP DOWN list
        // fetch all customers that are not flagged deleted from db
        $cust = $this->getAllNotDeletedCustomers();

        // make sure to pass empty $joinTable
        $joinTable = [];

        // make sure to pass in null for $customerIdDropDownSelected
        $customerIdDropDownSelected = null;

        return View('list.listBookingsByCustomer', ['customers' => $cust, 'joinTable' => $joinTable, 'customerIdDropDown' => $customerIdDropDownSelected]);
    }


    public function listBookingsByCustomer(Request $request){

        // the form will need a Customer DROP DOWN list
        // fetch all customers that are not flagged deleted from db
        $cust = $this->getAllNotDeletedCustomers();

        $customerIdDropDownSelected = $request->customer_id;

        // create a Collection based on a join of 4 tables
        $joinTable = DB::table('bookings')
            ->join('customers', 'bookings.fldCustomerId', '=', 'customers.id')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.fldCarId')
            ->leftJoin('damages', 'bookings.id', '=', 'damages.fldBookingNo')
            ->where('customers.id', '=', $customerIdDropDownSelected)
            ->orderBy('bookings.fldStartDate', 'desc')->get();

        return View('list.listBookingsByCustomer', ['customers' => $cust, 'joinTable' => $joinTable, 'customerIdDropDown' => $customerIdDropDownSelected]);
    }


    public function listDamagesByCustomerForm(){

        // the form will need a Customer DROP DOWN list
        // fetch all customers that are not flagged deleted from db
        $cust = $this->getAllNotDeletedCustomers();

        // make sure to pass empty $joinTable
        $joinTable = [];

        // make sure to pass in null for $customerIdDropDownSelected
        $customerIdDropDownSelected = null;

        return View('list.listDamagesByCustomer', ['customers' => $cust, 'joinTable' => $joinTable, 'customerIdDropDown' => $customerIdDropDownSelected]);
    }


    public function listDamagesByCustomer(Request $request){

        // the form will need a Customer DROP DOWN list
        // fetch all customers that are not flagged deleted from db
        $cust = $this->getAllNotDeletedCustomers();

        $customerIdDropDownSelected = $request->customer_id;

        // create a Collection based on a join of 4 tables
        $joinTable = DB::table('bookings')
            ->join('customers', 'bookings.fldCustomerId', '=', 'customers.id')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.fldCarId')
            ->join('damages', 'bookings.id', '=', 'damages.fldBookingNo')
            ->where('customers.id', '=', $customerIdDropDownSelected)
            ->orderBy('damages.fldDamageDate', 'desc')->get();

        return View('list.listDamagesByCustomer', ['customers' => $cust, 'joinTable' => $joinTable, 'customerIdDropDown' => $customerIdDropDownSelected]);
    }


    /**
     * fetch all customers from database that are not flagged deleted
     * @return mixed
     */
    public function getAllNotDeletedCustomers() {
        // fetch all customers that are not flagged deleted from db
        $cust = Customer::orderBy('fldFirstName', 'asc')->where('fldDeleted', '=', 0)->get();
        return $cust;
    }
}
