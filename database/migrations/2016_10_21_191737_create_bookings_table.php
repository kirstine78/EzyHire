<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            18.10.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            bookings migration
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('fldCarId')->unsigned();
            $table->integer('fldCustomerId')->unsigned();
            $table->date('fldStartDate');
            $table->date('fldReturnDate');
            $table->date('fldActualReturnDate')->nullable();
            $table->integer('fldOdometerFinish')->nullable();
            $table->double('fldHirePricePerDay', 6, 2);

            $table->foreign('fldCarId')->references('id')->on('vehicles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fldCustomerId')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
