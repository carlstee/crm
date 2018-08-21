<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplied_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->integer('supply_table_id');
            $table->integer('supplier_id');
            $table->string('service_price');
            $table->string('service_quantity');
            $table->string('service_amount');
            $table->string('invoice_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplied_products');
    }
}
