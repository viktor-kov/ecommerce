<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpuSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpu_specifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->text('cpu_series');
            $table->text('cpu_socket');
            $table->text('cpu_cores');
            $table->text('cpu_threads');
            $table->text('cpu_frequency');
            $table->text('cpu_max_frequency');
            $table->text('cpu_ram');
            $table->text('cpu_max_channels');
            $table->text('cpu_functions');
            $table->text('cpu_tdp');
            $table->text('cpu_technology');
            $table->text('cpu_cache');
            $table->text('cpu_chipset');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpu_specifications');
    }
}
