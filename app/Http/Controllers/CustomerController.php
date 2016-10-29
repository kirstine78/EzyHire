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
    /**
     * show all customers, excluding all customers flagged as deleted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
        // make sure to pass in empty customer
        $customer = new Customer();

        return View('customer.displayAddCustomerForm')->with('customer', $customer);
    }


    /**
     * when "add customer' button is clicked, add to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addCustomer(Request $request){

        // TODO how to trim input before validating
        // TODO accept space in Names fx mary ann

        // handle validation, if not validated redirect back to where you came from
        $this->validateCustomer($request);

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
        $cust->fldBanned = $request->radCustomerBanned;  // get value of Banned radio button

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
     * @param Customer $customer
     * @return $this
     */
    public function displayUpdateCustomerForm(Customer $customer){
        return View('customer.displayUpdateCustomerForm')->with('customer', $customer);
    }


    /**
     * Validate input and then update record in database if valid
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateCustomer(Request $request) {

        // TODO how to trim input before validating

        // handle validation, if not validated redirect back to where you came from
        $this->validateCustomer($request);

        // if VALIDATION went ok proceed to below
        // get current time
        $dateTimeNow = Carbon::now();

        // fetch correct Customer
        $cust = Customer::find($request->specific_customer_id);

        $cust->fldEmail = $request->fldEmail;
        $cust->fldFirstName = $request->fldFirstName;
        $cust->fldLastName = $request->fldLastName;
        $cust->fldLicenceNo = $request->fldLicenceNo;
        $cust->fldMobile = $request->fldMobile;
        $cust->fldBanned = $request->radCustomerBanned; // get value of Banned radio button

        // set updated_at to current date and time
        $cust->updated_at = $dateTimeNow;

        $cust->save();

        return redirect('customers');
    }


    public function validateCustomer(Request $request) {
        // my array of customized messages
        $messages = ['fldMobile.digits' => 'The :attribute is optional or must be exactly 10 digits.'];

        // rename attributes to look pretty in form
        $attributes = [
            'fldEmail' => 'email',
            'fldFirstName' => 'first name',
            'fldLastName' => 'last name',
            'fldLicenceNo' => 'licence no',
            'fldMobile' => 'mobile',
        ];

        // validation of user input in the form
        // regarding "UPDATE Customer" accept if user doesn't change email and licence no (so use: fldEmail,'.$request->specific_customer_id)
        $this->validate($request, [
            'fldEmail' => 'required|between:3,254|email|unique:customers,fldEmail,'.$request->specific_customer_id,
            'fldFirstName' => 'Required|Min:2|Max:40|Alpha',
            'fldLastName' => 'Required|Min:2|Max:40|Alpha',
            'fldLicenceNo' => 'Required|digits:9|unique:customers,fldLicenceNo,'.$request->specific_customer_id,
            'fldMobile' => 'digits:10',
        ], $messages, $attributes);
    }


    /**
     * flag customer as deleted in database
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteCustomer(Customer $customer){
        // use Route Model Binding.
        // Laravel will automatically inject the model instance that has
        // an ID matching the corresponding value from the request URI.

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
     * fetch all customers from database that are not flagged as deleted
     * @return mixed
     */
    public function getAllNotDeletedCustomers() {
        // fetch all customers that are not flagged deleted from db
        $cust = Customer::orderBy('fldFirstName', 'asc')->where('fldDeleted', '=', 0)->get();
        return $cust;
    }


}
