<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            VehicleController.php
 */

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;

/**
 * Class VehicleController handles logic for vehicle related
 * @package App\Http\Controllers
 */
class VehicleController extends Controller
{
    /**
     * display all vehicles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allVehicles(){
        // fetch all vehicles that are not flagged retired from db
        $vehi = $this->getAllNotRetiredVehicles();

        return View('vehicle.allVehicles', ['vehicles' => $vehi]);
    }


    /**
     * when you click 'add new vehicle' button
     * the form is displayed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function displayAddVehicleForm(){
        // make sure to pass in empty vehicle
        $vehicle = new Vehicle();

        return View('vehicle.displayAddVehicleForm')->with('vehicle', $vehicle);
    }


    /**
     * when "add vehicle' button is clicked, add record to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addVehicle(Request $request){
        // sanitize input (function in Controller parent)
        $this->formatInput($request);

        // validation of user input in the form
        $this->validateVehicle($request);

        // if VALIDATION went ok proceed to below
        $vehi = new Vehicle();

        // get someValue from the name="someValue"  key/value pair
        $vehi->fldRegoNo = strtoupper($request->fldRegoNo);  // convert to uppercase
        $vehi->fldBrand = $request->fldBrand;
        $vehi->fldSeating = $request->fldSeating;
        $vehi->fldHirePriceCurrent = $request->fldHirePriceCurrent;

        // assuming every new vehicle added is not damaged nor retired, so hardcode these values
        $vehi->fldDamaged = 0;
        $vehi->fldRetired = 0;

        // set created_at to current date and time
        $vehi->created_at = Carbon::now();

        // set fldLocationId to null since we don't implement location/suburb in this assignment
        $vehi->fldLocationId = null;

        $vehi->save();

        return redirect('vehicles');
    }


    /**
     * Update Hire Rate for a vehicle - display form
     * @param Vehicle $vehicle
     * @return $this
     */
    public function displayUpdateHireRateForm(Vehicle $vehicle){
        return View('vehicle.displayUpdateHireRateForm')->with('vehicle', $vehicle);
    }


    /**
     * Validate input and then update record in database if valid
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateHireRate(Request $request){
        // sanitize input (function in Controller parent)
        $this->formatInput($request);

        // validation of user input in the form
        $this->validateVehicle($request);

        // if VALIDATION went ok proceed to below
        // fetch correct Vehicle
        $vehi = Vehicle::find($request->specific_vehicle_id);

        // only hire price and updated_at are updated
        $vehi->fldHirePriceCurrent = $request->fldHirePriceCurrent;

        $vehi->save();

        return redirect('vehicles');
    }


    /**
     * validate user input, display customized error messages
     * @param Request $request
     */
    public function validateVehicle(Request $request) {
        // my array of customized messages
        $messages = [];

        // rename attributes to look pretty in form
        $attributes = [
            'fldRegoNo' => 'rego no',
            'fldBrand' => 'brand',
            'fldSeating' => 'seating',
            'fldHirePriceCurrent' => 'hire',
        ];

        // validation of user input in the form
        // regarding "UPDATE hire price Vehicle" do accept rego no as it is
        // (so use: fldRegoNo,'.$request->specific_vehicle_id)
        // accept space and dash in brand
        $this->validate($request, [
            'fldRegoNo' => 'required|alpha_num|size:6|unique:vehicles,fldRegoNo,'.$request->specific_vehicle_id,
            'fldBrand' => 'required|Max:15|regex:/^([A-Za-z\s\-]*)$/',
            'fldSeating' => 'required|integer|between:1,20',
            'fldHirePriceCurrent' => 'required|numeric|between:0,9999.99|regex:/.*[^.]$/',
        ], $messages, $attributes);
    }


    /**
     * Flag vehicle as retired in database
     * @param Vehicle $vehicle
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function retireVehicle(Vehicle $vehicle){
        // Because of Route Model Binding,
        // Laravel will automatically inject the model instance that has
        // an ID matching the corresponding value from the request URI.

        // get current time
        $dateTimeNow = Carbon::now();

        // flag as retired 1 = true
        $vehicle->fldRetired = 1;  // we just flag as 'retired'
        $vehicle->updated_at = $dateTimeNow;
        $vehicle->save();

        return redirect('vehicles');
    }


    /**
     * fetch all vehicles from database that are not flagged as retired
     * @return mixed
     */
    public function getAllNotRetiredVehicles() {
        // fetch all vehicles from db that are not flagged as retired
        $vehi = Vehicle::orderBy('fldRegoNo', 'asc')->where('fldRetired', '=', 0)->get();

        return $vehi;
    }
}  // end class
