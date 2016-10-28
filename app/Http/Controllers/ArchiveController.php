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

use App\ArchivedBooking;
use App\ArchivedDamage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Carbon\Carbon;

/**
 * Class ArchiveController
 * @package App\Http\Controllers *
 */
class ArchiveController extends Controller
{
    public function showArchiveForm(){
        return View('archive.archive');
    }


    public function archiveBookings(Request $request){

        // validate user input in the form (date). Date must be before today's date
        $this->validate($request, [
            'fldReturnDate' => 'required|before:today',
        ]);

        // if VALIDATION went ok proceed to below
        // archive date
        $archiveDateInput = $request->fldReturnDate;

        // get relevant records from the date and back in time
        // create a Collection based on a join of 2 tables
        $jointable = DB::table('bookings')
            ->leftJoin('damages', 'damages.fldBookingNo', '=', 'bookings.id')
            ->where('bookings.fldReturnDate', '<=', $archiveDateInput)
            ->where('bookings.fldActualReturnDate', '!=', null)
            ->select(   'bookings.id as id',
                'bookings.fldCarId as fldCarId',
                'bookings.fldCustomerId as fldCustomerId',
                'bookings.fldStartDate as fldStartDate',
                'bookings.fldReturnDate as fldReturnDate',
                'bookings.fldActualReturnDate as fldActualReturnDate',
                'bookings.fldOdometerFinish as fldOdometerFinish',
                'bookings.fldHirePricePerDay as fldHirePricePerDay',
                'damages.id as fldDamageId',
                'damages.fldBookingNo as fldBookingNo',
                'damages.fldDamageType as fldDamageType',
                'damages.fldDamageDescription as fldDamageDescription',
                'damages.fldDamageDate as fldDamageDate',
                'damages.fldFixed as fldFixed')
            ->get();

        $this->insertInArchiveBookingsTable($jointable);

        return "ok date";
//        return View('archive.archive');
    }


    /**
     * insert records in archivebookings table and archiveddamages table in db
     * @param $someTable   holding the records we want to insert
     */
    public function insertInArchiveBookingsTable($someTable){
        // get current date time
        $dateTimeNow = Carbon::now();

        // loop through and insert in archived tables (and achived damages table if damage is present)
        foreach ($someTable as $record) {

            // prepare object
            $archBooking = new ArchivedBooking();

            // assign $record col value
            $archBooking->id = $record->id;
            $archBooking->fldCarId = $record->fldCarId;
            $archBooking->fldCustomerId = $record->fldCustomerId;
            $archBooking->fldStartDate = $record->fldStartDate;
            $archBooking->fldReturnDate = $record->fldReturnDate;
            $archBooking->fldActualReturnDate = $record->fldActualReturnDate;
            $archBooking->fldOdometerFinish = $record->fldOdometerFinish;
            $archBooking->fldHirePricePerDay = $record->fldHirePricePerDay;

            // set created at to current date and time
            $archBooking->created_at = $dateTimeNow;

            // set updated at to current date and time
            $archBooking->updated_at = $dateTimeNow;

            $archBooking->save();

            // check if damage is present, if present then insert records in archived damages table
            if ($record->fldDamageId != null)
            {
                // prepare object
                $archDamage = new ArchivedDamage();

                // assign $record col value
                $archDamage->fldArchiveBookingNo = $record->fldBookingNo;
                $archDamage->fldDamageType = $record->fldDamageType;
                $archDamage->fldDamageDescription = $record->fldDamageDescription;
                $archDamage->fldDamageDate = $record->fldDamageDate;
                $archDamage->fldFixed = $record->fldFixed;

                // set created at to current date and time
                $archDamage->created_at = $dateTimeNow;

                // set updated at to current date and time
                $archDamage->updated_at = $dateTimeNow;

                $archDamage->save();
            }
        }
    }  // end function insertInArchiveBookingsTable

}  // end class ArchiveController
