<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->string('facility_id');
            $table->string('sending_facility_name');
            $table->string('patients_id');
            $table->string('patients_name');
            $table->string('recipient_id');
            $table->string('recipient_facility_name');
            $table->string('notes');
            $table->timestamps();

            $table->index('facility_id');
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
        Schema::dropIfExists('referrals');
    }
}
