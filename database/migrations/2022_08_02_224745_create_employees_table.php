<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('empnumber');
            $table->string('gsis');
            $table->string('philhealth');
            $table->string('pagibig');
            $table->string('tin');
            $table->string('itemnumber');
            $table->string('position');
            $table->string('coordinatorship')->nullable();
            $table->string('subjects');
            $table->smallInteger('loads');
            $table->string('advisory')->nullable();
            $table->date('firstdose')->nullable();
            $table->date('seconddose')->nullable();
            $table->date('additional')->nullable();
            $table->string('firstbrand')->nullable();
            $table->string('secondbrand')->nullable();
            $table->string('additionalbrand')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
