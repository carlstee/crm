<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomePageManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_section',10)->nullable();
            $table->string('featured_section',10)->nullable();
            $table->string('category_section',10)->nullable();
            $table->string('recent_items',10)->nullable();
            $table->string('team_section',10)->nullable();
            $table->string('countdown_section',10)->nullable();
            $table->string('popular_items',10)->nullable();
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
        Schema::dropIfExists('home_page_managements');
    }
}
