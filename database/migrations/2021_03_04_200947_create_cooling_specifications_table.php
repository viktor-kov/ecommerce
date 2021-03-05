<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoolingSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooling_specifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->text('cooling_type');
            $table->text('cooling_weight');
            $table->text('cooling_max_tdp');
            $table->text('cooling_min_speed');
            $table->text('cooling_max_speed');
            $table->text('cooling_average_fan');
            $table->text('coling_intel_socket');
            $table->text('cooling_amd_socket');
            $table->text('cooling_height');
            $table->text('cooling_width');
            $table->text('cooling_depth');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooling_specifications');
    }
}
