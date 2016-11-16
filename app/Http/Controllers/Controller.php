<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            Controller.php
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


/**
 * Class Controller, my custom controller will extend this
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * sanitize inputs
     * @param Request $request
     */
    public function formatInput(Request $request) {
        // trim all input from white space pre and post string
        $trim_if_string = function ($var) { return is_string($var) ? trim($var) : $var; };
        $request->merge(array_map($trim_if_string, $request->all()));
    }
}
