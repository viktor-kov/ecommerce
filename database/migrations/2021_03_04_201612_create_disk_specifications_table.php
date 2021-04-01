<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disk_specifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->text('disk_type');
            $table->text('disk_format');
            $table->text('disk_memory');
            $table->text('disk_capacity');
            $table->text('disk_width');
            $table->text('disk_height');
            $table->text('disk_depth');
            $table->text('disk_weight');
            $table->text('disk_usage');
            $table->text('disk_read_speed');
            $table->text('disk_write_speed');
            $table->text('disk_consumption');
            $table->text('disk_life');
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
        Schema::dropIfExists('disk_specifications');
    }
}
