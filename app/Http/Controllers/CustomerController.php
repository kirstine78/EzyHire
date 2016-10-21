<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            CustomerController.php
 */

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    public function allCustomers(){
        // fetch all customers that are not flagged deleted from db
        $cust = Customer::orderBy('fldFirstName', 'asc')->where('fldDeleted', '=', 0)->get();
        return View('customer.allCustomers', ['customers' => $cust]);
    }

    public function addCustomer(){
        return View('customer.addCustomer');
    }


    public function updateCustomer(){
        return View('customer.updateCustomer');
    }


    public function deleteCustomer(){
        return View('customer.deleteCustomer');
    }


    public function listBookingsByCustomer(){
        return View('customer.listBookingsByCustomer');
    }


    public function listDamageByCustomer(){
        return View('customer.listDamageByCustomer');
    }
}
