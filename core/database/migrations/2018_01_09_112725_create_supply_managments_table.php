<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyManagmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_managments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id');
            $table->integer('item_id');
            $table->integer('status');
            $table->string('quantity');
            $table->string('rate');
            $table->date('form_date')->nullable();
            $table->date('to_date')->nullable();
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
        Schema::dropIfExists('supply_managments');
    }
}
