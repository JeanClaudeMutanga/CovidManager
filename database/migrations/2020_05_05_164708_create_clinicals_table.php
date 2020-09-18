<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicals', function (Blueprint $table) {
            $table->id();
            $table->string('patients_id');
            $table->string('date')->nullable();
            $table->string('asymptomatic')->nullable();
            $table->string('fever')->nullable();
            $table->string('cough')->nullable();
            $table->string('chills')->nullable();
            $table->string('throat')->nullable();
            $table->string('breath')->nullable();
            $table->string('vomiting')->nullable();
            $table->string('diarrhoea')->nullable();
            $table->string('bodypains')->nullable();
            $table->string('weakness')->nullable();
            $table->string('confusion')->nullable();
            $table->string('other')->nullable();
            $table->timestamps();
            $table->index('patients_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinicals');
    }
}
