<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('region_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('quarter_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('home_number')->nullable();
            $table->string('landarea')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('homes');
    }
}
