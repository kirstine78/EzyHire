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
        $cust = $this->getAllNotDeletedCustomers();

        return View('customer.allCustomers', ['customers' => $cust]);
    }

    /**
     * when you click 'add new customer' button
     * the form is displayed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function displayAddCustomerForm(){
        return View('customer.displayAddCustomerForm');
    }

    /**
     * when "add customer' button is clicked
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


        // validate input before proceeding
        $isInputOk = $this->isAllInputOk($cust->fldEmail, $cust->fldFirstName, $cust->fldLastName, $cust->fldLicenceNo, $cust->fldMobile);

        if ($isInputOk)
        {
            // check Banned radio buttons
            $isBanned = $request->radBanned;

            $cust->fldBanned = $isBanned;

            // hardcode every new customer to be not deleted
            $cust->fldDeleted = 0;

            // set created at to current date and time
            $cust->created_at = $dateTimeNow;

            // set updated at to current date and time
            $cust->updated_at = $dateTimeNow;

            $cust->save();

            return redirect('customers');
        }
        else
        {
            return redirect('customer');
        }
    }  // end addCustomer


    /**
     * Update a Customer - display form
     */
    public function displayUpdateCustomerForm(Customer $customer){
        return View('customer.displayUpdateCustomerForm')->with('customer', $customer);
    }


    /**
     * Then the FORM calls the ROUTE to EDIT the Customer
     */
    public function updateCustomer(Request $request) {
        // get current time
        $dateTimeNow = Carbon::now();

        // fetch correct Customer
        $cust = Customer::find($request->edit_customer_id);

        $cust->fldEmail = $request->editCustomerEmail;
        $cust->fldFirstName = $request->editCustomerFirstName;
        $cust->fldLastName = $request->editCustomerLastName;
        $cust->fldLicenceNo = $request->editCustomerLicenceNo;
        $cust->fldMobile = $request->editCustomerMobile;
        $cust->fldBanned = $request->radEditCustomerBanned; // get value of Banned radio button

        // set updated_at to current date and time
        $cust->updated_at = $dateTimeNow;

        $cust->save();

        return redirect('customers');
    }


    public function deleteCustomer($id){
        // TODO confirmation box before deleting

        // we don't delete record, instead we just flag as 'deleted'

        // get current time
        $dateTimeNow = Carbon::now();

        // get the correct record
        $cust = Customer::find($id);

        // flag as deleted 1 = true
        $cust->fldDeleted = 1;
        $cust->updated_at = $dateTimeNow;
        $cust->save();

        return redirect('customers');
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

    public function isAllInputOk($email, $fName, $lName, $licence, $mobile) {

        $isOk = false;

//        if (isEmailOk($email))
//        {
//            $isOk = true;
//        }
//        else
//        {
//            $isOk = false;
//            return $isOk;
//        }
//
//        if (isNameOk($fName))
//        {
//            $isOk = true;
//        }
//        else
//        {
//            $isOk = false;
//            return $isOk;
//        }
//
//        if (isNameOk($lName))
//        {
//            $isOk = true;
//        }
//        else
//        {
//            $isOk = false;
//            return $isOk;
//        }
//
//        if (isLicenceOk($licence))
//        {
//            $isOk = true;
//        }
//        else
//        {
//            $isOk = false;
//            return $isOk;
//        }
//
//
//        if (isMobileOk($mobile))
//        {
//            $isOk = true;
//        }
//        else
//        {
//            $isOk = false;
//            return $isOk;
//        }

        return $isOk;
    }

    public function isEmailOk($email){
        $isOk = false;

        if (strlen($email) > 2)
        {
            $isOk = true;
        }
        else
        {
            $isOk = false;
        }
        return $isOk;
    }

    public function isNameOk($fName){
        $isOk = false;

        if (strlen($fName) > 2)
        {
            $isOk = true;
        }
        else
        {
            $isOk = false;
        }
        return $isOk;
    }

    public function isLicenceOk($licence){
        $isOk = false;

        // must be 9 chars
        if (strlen($licence) == 9)
        {
            // must all be digits
            if (ctype_digit($licence))
            {
                // maybe check for unique here???

                $isOk = true;
            }
            else
            {
                $isOk = false;
            }
        }
        else
        {
            $isOk = false;
        }
        return $isOk;
    }

    public function isMobileOk($mobile){
        $isOk = false;

        // must be 9 chars
        if (strlen($mobile) == 10)
        {
            // must all be digits
            if (ctype_digit($mobile))
            {
                $isOk = true;
            }
            else
            {
                $isOk = false;
            }
        }
        else
        {
            $isOk = false;
        }
        return $isOk;
    }

}
