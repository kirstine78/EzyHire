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

        // TODO how to redisplay the fields
        // TODO how to make customized messages
        // TODO how to trim input before validating
        // TODO accept space in Names fx mary ann

        // validation of user input in the form
        $this->validate($request, [
            'fldEmail' => 'required|unique:customers|between:3,254|email',
            'fldFirstName' => 'Required|Min:2|Max:40|Alpha',
            'fldLastName' => 'Required|Min:2|Max:40|Alpha',
            'fldLicenceNo' => 'Required|digits:9|unique:customers',
            'fldMobile' => 'digits:10',
        ]);

        // if VALIDATION went ok proceed to below
        // get date time
        $dateTimeNow = Carbon::now();

        $cust = new Customer();

        // get someValue from the name="someValue"  key/value pair from incoming $request
        $cust->fldEmail = $request->fldEmail;
        $cust->fldFirstName = $request->fldFirstName;
        $cust->fldLastName = $request->fldLastName;
        $cust->fldLicenceNo = $request->fldLicenceNo;
        $cust->fldMobile = $request->fldMobile;

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

        // TODO how to redisplay the fields with what user has entered???
        // TODO how to make customized messages
        // TODO how to trim input before validating

        // validation of user input in the form
        // accept if user doesn't change email and licence no (so use: fldEmail,'.$request->edit_customer_id)
        $this->validate($request, [
            'fldEmail' => 'required|between:3,254|email|unique:customers,fldEmail,'.$request->edit_customer_id,
            'fldFirstName' => 'Required|Min:2|Max:40|Alpha',
            'fldLastName' => 'Required|Min:2|Max:40|Alpha',
            'fldLicenceNo' => 'Required|digits:9|unique:customers,fldLicenceNo,'.$request->edit_customer_id,
            'fldMobile' => 'digits:10',
        ]);

        // get current time
        $dateTimeNow = Carbon::now();

        // fetch correct Customer
        $cust = Customer::find($request->edit_customer_id);

        $cust->fldEmail = $request->fldEmail;
        $cust->fldFirstName = $request->fldFirstName;
        $cust->fldLastName = $request->fldLastName;
        $cust->fldLicenceNo = $request->fldLicenceNo;
        $cust->fldMobile = $request->fldMobile;
        $cust->fldBanned = $request->radEditCustomerBanned; // get value of Banned radio button

        // set updated_at to current date and time
        $cust->updated_at = $dateTimeNow;

        $cust->save();

        return redirect('customers');
    }


//    public function deleteCustomer($id){
//
//        // we don't delete record, instead we just flag as 'deleted'
//
//        // get current time
//        $dateTimeNow = Carbon::now();
//
//        // get the correct record
//        $cust = Customer::find($id);
//
//        // flag as deleted 1 = true
//        $cust->fldDeleted = 1;
//        $cust->updated_at = $dateTimeNow;
//        $cust->save();
//
//        return redirect('customers');
//    }


    // use Route Model Binding.
    // Laravel will automatically inject the model instance that has
    // an ID matching the corresponding value from the request URI.
    public function deleteCustomer(Customer $customer){
        // TODO confirmation box before deleting

        // we don't delete record, instead we just flag as 'deleted'

        // get current time
        $dateTimeNow = Carbon::now();

        // flag as deleted 1 = true
        $customer->fldDeleted = 1;
        $customer->updated_at = $dateTimeNow;
        $customer->save();

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


}
