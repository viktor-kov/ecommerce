<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingAddressToInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('town')->nullable();
            $table->string('psc')->nullable();
            $table->string('street')->nullable();
            $table->string('house_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->dropColumn('town_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
}
