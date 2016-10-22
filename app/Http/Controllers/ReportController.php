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

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

/**
 * Class ReportController
 * @package App\Http\Controllers
 */
class ReportController extends Controller
{
    public function showDamagesReport(Request $request){

        $unionTable = $this->getFixedAndUnFixedDamages();

//        // get all damages belonging to NON-archived bookings, and car details
//        $joinTableNonArchivedBookingVehicleDamage = DB::table('bookings')
//            ->join('vehicles', 'vehicles.id', '=', 'bookings.fldCarId')
//            ->join('damages', 'bookings.id', '=', 'damages.fldBookingNo')
//            ->where('vehicles.fldRetired', '=', 0)
//            ->select('vehicles.fldRegoNo as regoNo',
//                'damages.fldDamageDate as damageDate',
//                'damages.fldDamageType as damageType',
//                'damages.fldDamageDescription as damageDescription',
//                'damages.fldFixed as fixed');
//
//        // get all damages belonging to archived bookings, and car details, and union it with $joinTableNonArchivedBookingVehicleDamage
//        $unionTable = DB::table('archivedbookings')
//            ->join('vehicles', 'vehicles.id', '=', 'archivedbookings.fldCarId')
//            ->join('archiveddamages', 'archivedbookings.id', '=', 'archiveddamages.fldArchiveBookingNo')
//            ->where('vehicles.fldRetired', '=', 0)
//            ->select('vehicles.fldRegoNo as regoNo',
//                'archiveddamages.fldDamageDate as damageDate',
//                'archiveddamages.fldDamageType as damageType',
//                'archiveddamages.fldDamageDescription as damageDescription',
//                'archiveddamages.fldFixed as fixed')
//            ->union($joinTableNonArchivedBookingVehicleDamage)
//            ->orderBy('regoNo', 'asc')
//            ->orderBy('damageDate', 'desc')
//            ->get();

        if ($request->radFilterDamages == null)
        {
            $filterOption = "fixedAndUnFixed";
        }
        else
        {
            $filterOption = $request->radFilterDamages;
        }

        return View('report.showDamagesReport', ['unionTableArchivedAndNonArchived' => $unionTable, 'filterOption' => $filterOption]);
    }

    public function showFaultsReport(){
        return View('report.showFaultsReport');
    }

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

        // get all damages belonging to archived bookings, and car details, and union it with $joinTableNonArchivedBookingVehicleDamage
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
    }


}
