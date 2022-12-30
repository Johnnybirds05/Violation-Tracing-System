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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('vehicle_id');
            $table->string('plate')->nullable();
            $table->string('model')->nullable();
            $table->string('body_type')->nullable();
            $table->string('serial')->nullable();
            $table->string('color')->nullable();
            $table->date('expiration')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('vehicle_img_path')->nullable();
            $table->tinyInteger('is_verified')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
