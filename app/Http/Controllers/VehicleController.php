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

    public function addVehicle(){
        return View('vehicle.addVehicle');  // view folder - vehicle folder - addVehicle.blade.php file
    }


    public function retireVehicle(){
        return View('vehicle.retireVehicle');
    }


    public function updateHireRate(){
        return View('vehicle.updateHireRate');
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
