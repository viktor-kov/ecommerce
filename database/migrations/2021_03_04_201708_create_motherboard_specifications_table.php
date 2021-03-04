<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherboardSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motherboard_specifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->text('motherboard_socket');
            $table->text('motherboard_chipset');
            $table->text('motherboard_format');
            $table->text('motherboard_functions');
            $table->text('motherboard_memory');
            $table->text('motherboard_memory_slots');
            $table->text('motherboard_memory_insertion');
            $table->text('motherboard_memory_frequency');
            $table->text('motherboard_extern');
            $table->text('motherboard_intern');
            $table->text('motherboard_pci_x16');
            $table->text('motherboard_pci_x1');
            $table->text('motherboard_m2');
            $table->text('motherboard_usb20');
            $table->text('motherboard_usb32');
            $table->text('motherboard_usb31');
            $table->text('motherboard_sata');
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
        Schema::dropIfExists('motherboard_specifications');
    }
}
