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
use Carbon\Carbon;

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

    /**
     * when you click 'add new customer' button is clicked
     * the form is displayed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function displayAddCustomerForm(){
        return View('customer.displayAddCustomerForm');
    }

    /**
     * when "add customer' button is clickec
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addCustomer(Request $request){
        // get date time
        $dateTimeNow = Carbon::now();

        $cust = new Customer();
        // get someValue from the name="someValue"  key/value pair
        $cust->fldEmail = $request->addCustomerEmail;
        $cust->fldFirstName = $request->addCustomerFirstName;
        $cust->fldLastName = $request->addCustomerLastName;
        $cust->fldLicenceNo = $request->addCustomerLicenceNo;
        $cust->fldMobile = $request->addCustomerMobile;

        // check Banned radio buttons
        $isBanned = $request->radBanned;

        $cust->fldBanned = $isBanned;

        // check Deleted radio buttons
//        $isDeleted = $request->radDeleted;

        // hardcode every new customer to be not deleted
        $cust->fldDeleted = 0;

        // set created at to current date and time
        $cust->created_at = $dateTimeNow;

        // set updated at to current date and time
        $cust->updated_at = $dateTimeNow;

        $cust->save();

        return redirect('customers');
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
