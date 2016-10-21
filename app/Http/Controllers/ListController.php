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
        $cust = Customer::orderBy('fldFirstName', 'asc')->where('fldDeleted', '=', 0)->get();

        $joinTable = [];

        return View('list.listBookingsByCustomer', ['customers' => $cust, 'joinTable' => $joinTable]);
    }


    public function listBookingsByCustomer(Request $request){

        // the form will need a Customer DROP DOWN list
        // fetch all customers that are not flagged deleted from db
        $cust = Customer::orderBy('fldFirstName', 'asc')->where('fldDeleted', '=', 0)->get();

        $customerIdDropDown = $request->customer_id;

        // create a Collection based on a join of 4 tables
        $joinTable = DB::table('bookings')->join('customers', 'bookings.fldCustomerId', '=', 'customers.id')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.fldCarId')
            ->where('customers.id', '=', $customerIdDropDown)->get();


//        ->join('damages', 'bookings.id', '=', 'damages.fldBookingNo')
//            ->select(   'movies.id as m_id',
//                'movies.created_at as created_at',
//                'movies.updated_at as updated_at',
//                'movies.title as title',
//                'movies.hire_price as hire_price',
//                'movies.quantity as quantity',
//                'categories.name as name',
//                'categories.id as c_id')->get();

//        -- List Bookings by Customer
//        SELECT 	b.fldBookingNo, b.fldStartDate, b.fldReturnDate, ca.fldRegoNo, ca.fldBrand, d.fldDamageId
//        FROM 	tblBooking b
//                join tblCustomer cu on (b.fldCustomerId=cu.fldCustomerId)
//                join tblCar ca on (ca.fldCarId=b.fldCarId)
//                left outer join tblDamage d on (b.fldBookingNo=d.fldBookingNo)
//        WHERE cu.fldLicenceNo='222234561';

        return View('list.listBookingsByCustomer', ['customers' => $cust, 'joinTable' => $joinTable]);
    }



    public function listDamagesByCustomer(){
        return View('list.listDamagesByCustomer');
    }
}
