<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpectedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expected_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('region_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('quarter_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->string('home_number')->nullable();
            $table->string('owner')->nullable();
            $table->integer('firm_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('amount')->nullable();
            $table->date('expected_date')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('expected_products');
    }
}
