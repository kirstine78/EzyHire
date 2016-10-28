<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivedbookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivedbookings', function (Blueprint $table) {
            $table->integer('id');  // cannot use increment because special case regarding archiving process
            $table->timestamps();
            $table->integer('fldCarId')->unsigned();
            $table->integer('fldCustomerId')->unsigned();
            $table->date('fldStartDate');
            $table->date('fldReturnDate');
            $table->date('fldActualReturnDate');
            $table->integer('fldOdometerFinish')->nullable();
            $table->double('fldHirePricePerDay', 6, 2);

            $table->primary('id');
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
        Schema::drop('archivedbookings');
    }
}
