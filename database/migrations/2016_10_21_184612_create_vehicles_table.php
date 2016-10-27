<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('fldLocationId')->nullable();
            $table->string('fldRegoNo', 6)->unique();
            $table->string('fldBrand', 15);
            $table->tinyInteger('fldSeating');
            $table->double('fldHirePriceCurrent', 6, 2);
            $table->boolean('fldDamaged');
            $table->boolean('fldRetired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicles');
    }
}
