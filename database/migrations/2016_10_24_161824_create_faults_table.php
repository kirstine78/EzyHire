<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faults', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('fldCarId')->unsigned();
            $table->string('fldFaultType', 50);
            $table->string('fldFaultDescription', 200);
            $table->date('fldFaultDate');
            $table->boolean('fldFixed');

            $table->foreign('fldCarId')->references('id')->on('vehicles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('faults');
    }
}
