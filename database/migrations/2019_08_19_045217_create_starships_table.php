<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->unique();
            $table->string('name');
            $table->string('model');
            $table->string('starship_class');
            $table->string('cost_in_credits');
            $table->string('manufacturer');
            $table->string('length');
            $table->string('crew');
            $table->string('passengers');
            $table->string('max_atmosphering_speed');
            $table->string('hyperdrive_rating');
            $table->string('MGLT');
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
        Schema::dropIfExists('starships');
    }
}
