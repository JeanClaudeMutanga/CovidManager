<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admits', function (Blueprint $table) {
            $table->id();
            $table->string('facility_id');
            $table->string('patients_id');
            $table->string('beds_id');
            $table->string('left_at');
            $table->timestamps();

            $table->index('facility_id');
            $table->index('patients_id');
            $table->index('beds_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admits');
    }
}
