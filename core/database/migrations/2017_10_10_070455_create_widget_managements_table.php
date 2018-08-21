<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('search',5)->nullable();
            $table->string('category',5)->nullable();
            $table->string('recent_post',5)->nullable();
            $table->string('tag',5)->nullable();
            $table->string('advertisement',5)->nullable();
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
        Schema::dropIfExists('widget_managements');
    }
}
