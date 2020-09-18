<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDischargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharges', function (Blueprint $table) {
            $table->id();
            $table->string('patients_id');
            $table->string('patients_name');
            $table->string('patients_idnumber');
            $table->string('facility_id');
            $table->string('facility_name');
            $table->string('date_admitted');
            $table->string('notes');
            $table->timestamps();

            $table->index('patients_id');
            $table->index('facility_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discharges');
    }
}
