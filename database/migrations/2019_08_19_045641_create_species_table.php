<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->unique();
            $table->string('name');
            $table->string('classification');
            $table->string('designation');
            $table->string('average_height');
            $table->string('average_lifespan');
            $table->string('eye_colors');
            $table->string('hair_colors');
            $table->string('skin_colors');
            $table->string('language');
            $table->string('homeworld')->nullable();
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
        Schema::dropIfExists('species');
    }
}
