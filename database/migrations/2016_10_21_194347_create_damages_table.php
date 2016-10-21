<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->mediumInteger('fldBookingNo');
            $table->string('fldDamageType', 50);
            $table->string('fldDamageDescription', 200);
            $table->date('fldDamageDate');
            $table->boolean('fldFixed');

            $table->foreign('fldBookingNo')->references('id')->on('bookings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('damages');
    }
}
