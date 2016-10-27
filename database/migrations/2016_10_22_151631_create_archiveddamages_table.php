<?php

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
            $table->integer('fldArchiveBookingNo')->unsigned();
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
