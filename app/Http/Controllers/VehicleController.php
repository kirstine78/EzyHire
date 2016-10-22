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

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class VehicleController
 * @package App\Http\Controllers
 */
class VehicleController extends Controller
{
    public function allVehicles(){
        return View('vehicle.allVehicles');
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
}
