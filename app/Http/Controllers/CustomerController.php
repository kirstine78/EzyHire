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
    /** The constructor has code to restrict access to users that are logged in */
    public function __construct() {
        $this->middleware('auth');
    }

    
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
        // sanitize input (function in Controller parent)
        $this->formatInput($request);

        // handle validation, if not validated redirect back to where you came from
        $this->validateCustomer($request);

        // if VALIDATION went ok proceed to below
        $cust = new Customer();

        // assign input values to fields for the customer record
        $cust = $this->populateCustomerFromRequest($cust, $request);

        // hardcode every new customer to be not deleted
        $cust->fldDeleted = 0;

        // set created at to current date and time
        $cust->created_at = Carbon::now();

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
        // sanitize input (function in Controller parent)
        $this->formatInput($request);

        // handle validation, if not validated redirect back to where you came from
        $this->validateCustomer($request);

        // if VALIDATION went ok proceed to below
        // fetch correct Customer
        $cust = Customer::find($request->specific_customer_id);

        // assign input values to fields for the customer record
        $cust = $this->populateCustomerFromRequest($cust, $request);

        $cust->save();

        return redirect('customers');
    }


    /**
     * validate user input, customize error messages
     * @param Request $request
     */
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
        // accept space and dash in FIRST NAME only
        $this->validate($request, [
            'fldEmail' => 'required|between:3,254|email|unique:customers,fldEmail,'.$request->specific_customer_id,
            'fldFirstName' => 'Required|Min:2|Max:40|regex:/^([A-Za-z\s\-]*)$/',
            'fldLastName' => 'Required|Min:2|Max:40|Alpha',
            'fldLicenceNo' => 'Required|digits:9|unique:customers,fldLicenceNo,'.$request->specific_customer_id,
            'fldMobile' => 'digits:10',
        ], $messages, $attributes);
    }


    /**
     * from request assign values to column fields in the customer record
     * @param Customer $customer
     * @param Request $request
     * @return Customer
     */
    public function populateCustomerFromRequest(Customer $customer, Request $request) {
        // get someValue from the name="someValue"  key/value pair from incoming $request
        $customer->fldEmail = $request->fldEmail;
        $customer->fldFirstName = $request->fldFirstName;
        $customer->fldLastName = $request->fldLastName;
        $customer->fldLicenceNo = $request->fldLicenceNo;
        $customer->fldMobile = $request->fldMobile;
        $customer->fldBanned = $request->radCustomerBanned;  // get value of Banned radio button

        return $customer;
    }


    /**
     * flag customer as deleted in database
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteCustomer(Customer $customer){
        // Because of Route Model Binding,
        // Laravel will automatically inject the model instance that has
        // an ID matching the corresponding value from the request URI.

        // get current time
        $dateTimeNow = Carbon::now();

        // flag as deleted 1 = true
        $customer->fldDeleted = 1;  // we don't delete record, instead we just flag as 'deleted'
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
