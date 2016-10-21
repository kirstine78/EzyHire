<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            StaffController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class StaffController
 * @package App\Http\Controllers
 * controls staff member related
 */
class StaffController extends Controller
{
    public function registerStaffMember(){
        return View('staff.register');
    }

    public function login(){
        return View('staff.login');
    }

    public function logout(){
        return View('home');
    }
}
