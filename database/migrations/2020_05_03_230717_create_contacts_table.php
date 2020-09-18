<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('patients_id');
            $table->string('name');
            $table->string('surname');
            $table->string('sex');
            $table->string('age')->nullable();
            $table->string('relation');
            $table->string('date')->nullable();
            $table->string('place');
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('hcw');
            $table->string('facility')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
