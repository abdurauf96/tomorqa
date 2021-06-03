<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoredProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stored_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('region_id');
            $table->integer('district_id');
            $table->integer('quarter_id');
            $table->integer('street_id');
            $table->string('home_number');
            $table->string('owner');
            $table->integer('firm_id');
            $table->integer('product_id');
            $table->string('amount');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stored_products');
    }
}
