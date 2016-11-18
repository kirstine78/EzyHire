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


use App\Booking;
use App\Damage;

/**
 * Class ArchiveController handles the logic for archiving bookings (and belonging damages)
 * @package App\Http\Controllers *
 */
class ArchiveController extends Controller
{
    /**
     * display archive form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showArchiveForm(){
        // make sure to pass in false
        $isArchived = false;

        return View('archive.archive', ['isArchived' => $isArchived]);
    }


    /**
     * handles the archiving of bookings
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function archiveBookings(Request $request){
        // validate user input in the form (date). Date must be before today's date
        $this->validateArchiveDate($request);

        // if VALIDATION went ok proceed to below
        // archive date
        $archiveDateInput = $request->fldReturnDate;

        // get relevant records from the date and back in time
        // create a Collection based on a join of 2 tables
        $jointable = DB::table('bookings')
            ->leftJoin('damages', 'damages.fldBookingNo', '=', 'bookings.id')
            ->where('bookings.fldReturnDate', '<=', $archiveDateInput)
            ->where('bookings.fldActualReturnDate', '!=', null)
            ->select(   'bookings.id as fldBookingId',
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
                'damages.fldFixed as fldFixed')->get();

        // insert in archive tables
        $this->insertInArchivedTables($jointable);

        // delete records from bookings table (and damages table if relevant)
        $this->deleteFromNonArchivedTables($jointable);

        $isArchived = true;
        return View('archive.archive', ['isArchived' => $isArchived, 'numberOfRecords' => count($jointable)]);
    }


    /**
     * validate user input, customize error messages
     * @param Request $request
     */
    public function validateArchiveDate(Request $request) {
        // my array of customized messages
        $messages = [];

        // rename attributes to look pretty in form
        $attributes = [
            'fldReturnDate' => 'date',
        ];

        // validate user input in the form (date). Date must be before today's date
        $this->validate($request, [
            'fldReturnDate' => 'required|before:today',
        ], $messages, $attributes);
    }


    /**
     * insert records in archivebookings table (and archiveddamages table in db if relevant)
     * @param $someTable    is holding the records we want to insert
     */
    public function insertInArchivedTables($someTable){
        // get current date time
        $dateTimeNow = Carbon::now();

        // loop through and insert in archived tables (and archived damages table if damage is present)
        foreach ($someTable as $record) {

            // prepare object
            $archBooking = new ArchivedBooking();

            // assign $record col value
            $archBooking->id = $record->fldBookingId;
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


    /**
     * delete records in bookings table (and damages table in db if relevant)
     * @param $someTable    is holding the records we want to delete
     */
    public function deleteFromNonArchivedTables($someTable){

        // loop through table and delete all records in bookings table (and in damages table if relevant)
        foreach ($someTable as $record) {

            Booking::where('id', '=', $record->fldBookingId)->delete();

            // check if damage is present, if present then delete records in damages table
            if ($record->fldDamageId != null)
            {
                Damage::where('id', '=', $record->fldDamageId)->delete();
            }
        }
    }

}  // end class ArchiveController
