<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url')->unique();
            $table->string('name');
            $table->string('model');
            $table->string('vehicle_class');
            $table->string('manufacturer');
            $table->string('length');
            $table->string('cost_in_credits');
            $table->string('crew');
            $table->string('passengers');
            $table->string('max_atmosphering_speed');
            $table->string('cargo_capacity');
            $table->string('consumables');
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
}
