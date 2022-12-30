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
        Schema::create('violators', function (Blueprint $table) {
            $table->id('violator_id');


            $table->unsignedBigInteger('ordinance_id');
            $table->foreign('ordinance_id')->references('ordinance_id')->on('ordinances')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->string('driver_lname')->nullable();
            $table->string('driver_fname')->nullable();
            $table->string('driver_mname')->nullable();
            $table->string('driver_suffix')->nullable();

            $table->string('driver_mobile_no')->nullable();
            $table->string('driver_location_province')->nullable();
            $table->string('driver_location_city')->nullable();
            $table->string('driver_location_barangay')->nullable();
            $table->string('driver_location_street')->nullable();

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
        Schema::dropIfExists('violations');
    }
};
