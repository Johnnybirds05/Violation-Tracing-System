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
        Schema::create('ordinance_penalties', function (Blueprint $table) {
            $table->id('ordinance_penalty_id');

            $table->unsignedBigInteger('ordinance_id');
            $table->foreign('ordinance_id')->references('ordinance_id')->on('ordinances')
                ->onUpdate('cascade')
                ->onDelete('cascade');


            $table->string('offense_order');
            $table->double('cost');
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
        Schema::dropIfExists('ordiance_penalties');
    }
};
