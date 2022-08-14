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
            $table->string('email')->unique();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->integer('empnumber');
            $table->integer('gsis');
            $table->integer('philhealth');
            $table->integer('pagibig');
            $table->integer('tin');
            $table->integer('itemnumber');
            $table->string('position');
            $table->string('subjects');
            $table->integer('loads');
            $table->string('advisory');
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
