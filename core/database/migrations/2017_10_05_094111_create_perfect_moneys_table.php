<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfectMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfect_moneys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display_name');
            $table->string('passpharase')->unique();
            $table->string('usd')->unique();
            $table->string('status')->nullable();
            $table->string('prefect_money_picture',10);
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
        Schema::dropIfExists('perfect_moneys');
    }
}
