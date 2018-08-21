<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('btcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display_name');
            $table->string('api_key')->unique();
            $table->string('xpub_code')->unique();
            $table->string('status')->nullable();
            $table->string('btc_picture',10);
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
        Schema::dropIfExists('btcs');
    }
}
