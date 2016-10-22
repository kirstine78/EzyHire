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
        return View('vehicle.displayAddVehicleForm');
    }


    /**
     * when "add vehicle' button is clicked
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addVehicle(Request $request){
        // get date time
        $dateTimeNow = Carbon::now();

        $vehi = new Vehicle();

        // get someValue from the name="someValue"  key/value pair
        $vehi->fldRegoNo = $request->addVehicleRegoNo;
        $vehi->fldBrand = $request->addVehicleBrand;
        $vehi->fldSeating = $request->addVehicleSeating;
        $vehi->fldHirePriceCurrent = $request->addVehicleHirePrice;

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
     */
    public function displayUpdateHireRateForm(Vehicle $vehicle){
        return View('vehicle.displayUpdateHireRateForm')->with('vehicle', $vehicle);
    }


    /**
     * Then the FORM calls the ROUTE to EDIT the Vehicle
     */
    public function updateHireRate(Request $request){
        // get current time
        $dateTimeNow = Carbon::now();

        // fetch correct Vehicle
        $vehi = Vehicle::find($request->edit_vehicle_id);

        // only hire price and updated_at are updated
        $vehi->fldHirePriceCurrent = $request->editVehicleHirePrice;

        // set updated_at to current date and time
        $vehi->updated_at = $dateTimeNow;

        $vehi->save();

        return redirect('vehicles');
    }


    public function retireVehicle($id){
        // TODO confirmation box before deleting

        // we just flag as 'retired'

        // get current time
        $dateTimeNow = Carbon::now();

        // get the correct record
        $vehi = Vehicle::find($id);

        // flag as retired 1 = true
        $vehi->fldRetired = 1;
        $vehi->updated_at = $dateTimeNow;
        $vehi->save();

        return redirect('vehicles');
    }


    /**
     * fetch all vehicles from database that are not flagged retired
     * @return mixed
     */
    public function getAllNotRetiredVehicles() {
        // fetch all vehicles that are not flagged retired from db
        $vehi = Vehicle::orderBy('fldRegoNo', 'asc')->where('fldRetired', '=', 0)->get();
        return $vehi;
    }
}
