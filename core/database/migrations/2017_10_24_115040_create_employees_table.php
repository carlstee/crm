<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('name');
            $table->string('f_name')->nullable();
            $table->string('b_date');
            $table->string('gender');
            $table->string('phone');
            $table->text('local_add');
            $table->text('per_add')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->integer('employee_id')->unique();
            $table->integer('dept_id');
            $table->integer('deg_id');
            $table->string('date');
            $table->string('salary');
            $table->string('ac_name')->nullable();
            $table->string('ac_num');
            $table->string('bank_name');
            $table->string('code')->nullable();
            $table->string('pan_num')->nullable();
            $table->string('branch')->nullable();
            $table->string('resume')->nullable();
            $table->string('offer_letter')->nullable();
            $table->string('join_letter')->nullable();
            $table->string('con_letter')->nullable();
            $table->string('proof')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
