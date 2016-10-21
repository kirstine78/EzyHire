<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('fldCustomerId');
            $table->timestamps();
            $table->string('fldEmail', 40)->unique();
            $table->string('fldFirstName', 20);
            $table->string('fldLastName', 20);
            $table->char('fldLicenceNo', 9)->unique();
            $table->string('fldMobile', 10);
            $table->boolean('fldBanned');
            $table->boolean('fldDeleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('customers');
    }
}
