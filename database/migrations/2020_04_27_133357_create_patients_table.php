<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('idnumber');
            $table->string('name');
            $table->string('surname');
            $table->string('dob');
            $table->string('sex');
            $table->string('residency');
            $table->string('address');
            $table->string('province');
            $table->string('race');
            $table->string('email')->nullable();
            $table->string('kids');
            $table->string('elderly');
            $table->string('occupation')->nullable();
            $table->string('type')->nullable();
            $table->string('result')->nullable();
            $table->string('document')->nullable();
            $table->string('district')->nullable();
            $table->string('employer')->nullable();
            $table->timestamps();

            $table->index('user_id');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
