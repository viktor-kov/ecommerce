<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comparisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('comparison_id');
            $table->unsignedBigInteger('product_1')->nullable();
            $table->unsignedBigInteger('product_2')->nullable();
            $table->timestamps();
            $table->foreign('product_1')->references('id')->on('products');
            $table->foreign('product_2')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_comparisons');
    }
}
