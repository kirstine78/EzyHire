<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            ArchiveController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ArchiveController
 * @package App\Http\Controllers *
 */
class ArchiveController extends Controller
{
    public function index(){
        return View('archive.archive');
    }
}
