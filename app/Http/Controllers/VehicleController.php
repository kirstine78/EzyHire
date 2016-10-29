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
 * Class VehicleController
 * @package App\Http\Controllers
 */
class VehicleController extends Controller
{
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

        // TODO how to make customized messages
        // TODO how to trim input before validating
        // TODO accept space in Brand fx Rolls Royce

        // validation of user input in the form
        $this->validateVehicle($request);

//        $this->validate($request, [
//            'fldRegoNo' => 'required|unique:vehicles|alpha_num|size:6',
//            'fldBrand' => 'required|Max:15|Alpha',
//            'fldSeating' => 'required|integer|between:1,20',
//            'fldHirePriceCurrent' => 'required|numeric|between:0,9999.99',
//        ]);

        // if VALIDATION went ok proceed to below
        // get date time
        $dateTimeNow = Carbon::now();

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
        $vehi->created_at = $dateTimeNow;

        // set updated_at to current date and time
        $vehi->updated_at = $dateTimeNow;

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

        // TODO how to make customized messages
        // TODO how to trim input before validating
        // TODO accept space in Brand fx Rolls Royce
        // TODO error if input is 100.     full stop followed by nothing

        // validation of user input in the form
        $this->validateVehicle($request);

        // if VALIDATION went ok proceed to below
        // get current time
        $dateTimeNow = Carbon::now();

        // fetch correct Vehicle
        $vehi = Vehicle::find($request->edit_vehicle_id);

        // only hire price and updated_at are updated
        $vehi->fldHirePriceCurrent = $request->fldHirePriceCurrent;

        // set updated_at to current date and time
        $vehi->updated_at = $dateTimeNow;

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
        // regarding "UPDATE hire price Vehicle" accept rego no as it is (so use: fldRegoNo,'.$request->edit_vehicle_id)
        $this->validate($request, [
            'fldRegoNo' => 'required|alpha_num|size:6|unique:vehicles,fldRegoNo,'.$request->edit_vehicle_id,
            'fldBrand' => 'required|Max:15|Alpha',
            'fldSeating' => 'required|integer|between:1,20',
            'fldHirePriceCurrent' => 'required|numeric|between:0,9999.99',
        ], $messages, $attributes);
    }



//    public function retireVehicle($id){
//        // TODO confirmation box before retiring
//
//        // we just flag as 'retired'
//
//        // get current time
//        $dateTimeNow = Carbon::now();
//
//        // get the correct record
//        $vehi = Vehicle::find($id);
//
//        // flag as retired 1 = true
//        $vehi->fldRetired = 1;
//        $vehi->updated_at = $dateTimeNow;
//        $vehi->save();
//
//        return redirect('vehicles');
//    }


    /**
     * Flag vehicle as retired in database
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function retireVehicle(Vehicle $vehicle){
        // TODO confirmation box before retiring

        // we just flag as 'retired'

        // get current time
        $dateTimeNow = Carbon::now();

        // get the correct record
//        $vehi = Vehicle::find($id);

        // flag as retired 1 = true
        $vehicle->fldRetired = 1;
        $vehicle->updated_at = $dateTimeNow;
        $vehicle->save();

        return redirect('vehicles');
    }


    /**
     * fetch all vehicles from database that are not flagged as retired
     * @return mixed
     */
    public function getAllNotRetiredVehicles() {
        // fetch all vehicles that are not flagged retired from db
        $vehi = Vehicle::orderBy('fldRegoNo', 'asc')->where('fldRetired', '=', 0)->get();
        return $vehi;
    }
}
