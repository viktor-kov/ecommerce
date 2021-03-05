<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGpuSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpu_specifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->text('gpu_chip_manufacturer');
            $table->text('gpu_model');
            $table->text('gpu_processor');
            $table->text('gpu_architecture');
            $table->text('gpu_stream');
            $table->text('gpu_technology');
            $table->text('gpu_usage');
            $table->text('gpu_memory_type');
            $table->text('gpu_directx');
            $table->text('gpu_opengl');
            $table->text('gpu_cooling');
            $table->text('gpu_width');
            $table->text('gpu_height');
            $table->text('gpu_depth');
            $table->text('gpu_supply_power');
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
        Schema::dropIfExists('gpu_specifications');
    }
}
