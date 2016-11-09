<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            ReportController.php
 */

namespace App\Http\Controllers;

use App\Fault;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

/**
 * Class ReportController
 * @package App\Http\Controllers
 */
class ReportController extends Controller
{
    /** The constructor has code to restrict access to users that are logged in */
    public function __construct() {
        $this->middleware('auth');
    }


    // ************************************************************
    // ***************** damages report relevant ******************
    // ************************************************************

    /**
     * Show report for damages
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDamagesReport(Request $request){
        // prepare a table to hold damages and their relevant details
        $unionTable = null;

        // check if radio buttons have a value
        if ($request->radFilterDamages == null)
        {
            // no value yet, so set it to default which will be show all (fixed AND un-fixed)
            $filterOption = "fixedAndUnFixed";
        }
        else
        {
            // does have a value
            $filterOption = $request->radFilterDamages;
        }

        // now decide which method to call
        if ($filterOption == "fixedAndUnFixed")
        {
            $unionTable = $this->getFixedAndUnFixedDamages();
        }
        else
        {
            $unionTable = $this->getOnlyUnFixedDamages();
        }

        return View('report.showDamagesReport', ['unionTableArchivedAndNonArchived' => $unionTable, 'filterOption' => $filterOption]);
    }


    /**
     * fetch all damages, both fixed and unfixed, but excluding records related with retired vehicles
     * @return mixed
     */
    public function getFixedAndUnFixedDamages() {

        // get all damages belonging to NON-archived bookings, and car details
        $joinTableNonArchivedBookingVehicleDamage = DB::table('bookings')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.fldCarId')
            ->join('damages', 'bookings.id', '=', 'damages.fldBookingNo')
            ->where('vehicles.fldRetired', '=', 0)
            ->select('vehicles.fldRegoNo as regoNo',
                'damages.fldDamageDate as damageDate',
                'damages.fldDamageType as damageType',
                'damages.fldDamageDescription as damageDescription',
                'damages.fldFixed as fixed');


        // get all damages belonging to archived bookings, and car details,
        // and union it with $joinTableNonArchivedBookingVehicleDamage
        $unionTable = DB::table('archivedbookings')
            ->join('vehicles', 'vehicles.id', '=', 'archivedbookings.fldCarId')
            ->join('archiveddamages', 'archivedbookings.id', '=', 'archiveddamages.fldArchiveBookingNo')
            ->where('vehicles.fldRetired', '=', 0)
            ->select('vehicles.fldRegoNo as regoNo',
                'archiveddamages.fldDamageDate as damageDate',
                'archiveddamages.fldDamageType as damageType',
                'archiveddamages.fldDamageDescription as damageDescription',
                'archiveddamages.fldFixed as fixed')
            ->union($joinTableNonArchivedBookingVehicleDamage)
            ->orderBy('regoNo', 'asc')
            ->orderBy('damageDate', 'desc')
            ->get();

        return $unionTable;
    }  // end getFixedAndUnFixedDamages


    /**
     * fetch all damages, including only unfixed damages, and excluding records related with retired vehicles
     * @return mixed
     */
    public function getOnlyUnFixedDamages() {
        // get all damages belonging to NON-archived bookings, and car details
        $joinTableNonArchivedBookingVehicleDamage = DB::table('bookings')
            ->join('vehicles', 'vehicles.id', '=', 'bookings.fldCarId')
            ->join('damages', 'bookings.id', '=', 'damages.fldBookingNo')
            ->where('vehicles.fldRetired', '=', 0)
            ->where('damages.fldFixed', '=', 0)
            ->select('vehicles.fldRegoNo as regoNo',
                'damages.fldDamageDate as damageDate',
                'damages.fldDamageType as damageType',
                'damages.fldDamageDescription as damageDescription',
                'damages.fldFixed as fixed');

        // get all damages belonging to archived bookings, and car details,
        // and union it with $joinTableNonArchivedBookingVehicleDamage
        $unionTable = DB::table('archivedbookings')
            ->join('vehicles', 'vehicles.id', '=', 'archivedbookings.fldCarId')
            ->join('archiveddamages', 'archivedbookings.id', '=', 'archiveddamages.fldArchiveBookingNo')
            ->where('vehicles.fldRetired', '=', 0)
            ->where('archiveddamages.fldFixed', '=', 0)
            ->select('vehicles.fldRegoNo as regoNo',
                'archiveddamages.fldDamageDate as damageDate',
                'archiveddamages.fldDamageType as damageType',
                'archiveddamages.fldDamageDescription as damageDescription',
                'archiveddamages.fldFixed as fixed')
            ->union($joinTableNonArchivedBookingVehicleDamage)
            ->orderBy('regoNo', 'asc')
            ->orderBy('damageDate', 'desc')
            ->get();

        return $unionTable;
    }  // end getOnlyUnFixedDamages


    // ************************************************************
    // ***************** faults report relevant *******************
    // ************************************************************

    /**
     * Show report for faults
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFaultsReport(Request $request){
        // prepare a table to hold faults and the vehicle details
        $joinTable = null;

        // check if radio buttons have a value
        if ($request->radFilterFaults == null)
        {
            // no value yet, so set it to default which will be show all (fixed AND un-fixed)
            $filterOption = "fixedAndUnFixed";
        }
        else
        {
            // does have a value
            $filterOption = $request->radFilterFaults;
        }

        // now decide which method to call
        if ($filterOption == "fixedAndUnFixed")
        {
            $joinTable = $this->getFixedAndUnFixedFaults();
        }
        else
        {
            $joinTable = $this->getOnlyUnFixedFaults();
        }

        return View('report.showFaultsReport', ['joinTable' => $joinTable, 'filterOption' => $filterOption]);

        // The below does NOT work, since you can't easily sort by because each method only
        // knows of it's own existence and returns a new collection.

//        // use relationship, to get all faults, both fixed and unfixed, but excluding records related with retired vehicles
//        $faults = Fault::with('vehicle')->whereHas('vehicle', function ($query)
//        {
//            return $query->where('fldRetired', 0);
//        })->orderBy('fldFaultDate', 'desc')->get();
//        // order by rego no
//        $sortedFaults = $faults->sortBy('vehicle.fldRegoNo');
//        return View('report.showFaultsReport', ['faults' => $sortedFaults, 'filterOption' => $filterOption]);
    }


    /**
     * fetch all faults, both fixed and unfixed, but excluding records related with retired vehicles
     * @return mixed
     */
    public function getFixedAndUnFixedFaults() {
        // join vehicles and faults
        $joinTable = DB::table('faults')
            ->join('vehicles', 'vehicles.id', '=', 'faults.fldCarId')
            ->where('vehicles.fldRetired', '=', 0)
            ->orderBy('vehicles.fldRegoNo', 'asc')
            ->orderBy('faults.fldFaultDate', 'desc')
            ->get();

        return $joinTable;
    }  // end getFixedAndUnFixedFaults


    /**
     * fetch all faults, including only unfixed faults, and excluding records related with retired vehicles
     * @return mixed
     */
    public function getOnlyUnFixedFaults() {
        $joinTable = DB::table('faults')
            ->join('vehicles', 'vehicles.id', '=', 'faults.fldCarId')
            ->where('vehicles.fldRetired', '=', 0)
            ->where('faults.fldFixed', '=', 0)
            ->orderBy('vehicles.fldRegoNo', 'asc')
            ->orderBy('faults.fldfaultDate', 'desc')
            ->get();

        return $joinTable;
    }  // end getOnlyUnFixedFaults
}
