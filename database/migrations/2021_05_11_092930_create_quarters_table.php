<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('region_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('name')->nullable();
            $table->string('addres')->nullable();
            $table->string('leader')->nullable();
            $table->string('phone')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quarters');
    }
}
