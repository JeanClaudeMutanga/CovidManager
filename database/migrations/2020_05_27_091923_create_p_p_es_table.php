<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePPEsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_p_es', function (Blueprint $table) {
            $table->id();
            $table->string('facility_id');
            $table->string('patients_id');
            $table->string('user_id');
            $table->timestamps();

            $table->index('facility_id');
            $table->index('patients_id');
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
        Schema::dropIfExists('p_p_es');
    }
}
