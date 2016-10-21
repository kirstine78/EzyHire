<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            GeneralController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class GeneralController
 * @package App\Http\Controllers
 * Controller for pages that can be viewed without being logged in
 */
class GeneralController extends Controller
{
    // show home page
    public function index() {
        return View('home');
    }

    // show suburbs in company
    public function getSuburbs(){
        return View('general.suburb');
    }

    // show brands in company
    public function getBrands(){
        return View('general.brand');
    }
}
