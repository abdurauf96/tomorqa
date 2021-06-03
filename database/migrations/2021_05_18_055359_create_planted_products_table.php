<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlantedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planted_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('region_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('quarter_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('home_number')->nullable();
            $table->string('owner')->nullable();
            $table->string('product_id')->nullable();
            $table->string('amount')->nullable();
            $table->integer('firm_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planted_products');
    }
}
