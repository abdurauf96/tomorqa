<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firms', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('region_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('name')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_currency')->nullable();
            $table->string('addres')->nullable();
            $table->string('director')->nullable();
            $table->string('phone')->nullable();
            $table->string('inn')->nullable();
            $table->string('hr')->nullable();
            $table->string('mfo')->nullable();
            $table->string('currency_mfo')->nullable();
            $table->string('currency_hr')->nullable();
            $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('firms');
    }
}
