<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            archiveddamages migration
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchiveddamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archiveddamages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('fldArchiveBookingNo');
            $table->string('fldDamageType', 50);
            $table->string('fldDamageDescription', 200);
            $table->date('fldDamageDate');
            $table->boolean('fldFixed');

            $table->foreign('fldArchiveBookingNo')->references('id')->on('archivedbookings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('archiveddamages');
    }
}
