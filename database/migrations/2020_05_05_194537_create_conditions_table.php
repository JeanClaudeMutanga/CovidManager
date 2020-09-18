<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->string('patients_id');
            $table->string('asthma')->nullable();
            $table->string('neurological')->nullable();
            $table->string('hiv')->nullable();
            $table->string('obesity')->nullable();
            $table->string('other')->nullable();
            $table->string('cardiac')->nullable();
            $table->string('pulmonary')->nullable();
            $table->string('viral')->nullable();
            $table->string('pregnant')->nullable();
            $table->string('kidney')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('viralload')->nullable();
            $table->string('trimester')->nullable();
            $table->string('immuno')->nullable();
            $table->string('liver')->nullable();
            $table->string('arv')->nullable();
            $table->string('tb')->nullable();
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
        Schema::dropIfExists('conditions');
    }
}
