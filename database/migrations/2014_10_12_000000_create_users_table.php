<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username')->unique();
            $table->string('phone_no')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('street_address');
            $table->unsignedInteger('division_id')->comment('division table id');
            $table->unsignedInteger('district_id')->comment('district table id');
            $table->string('ip_address')->nullable();
            $table->string('avater')->nullable();
            $table->text('shipping_address')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0=inactive 1=active 2=ban');
            $table->remember_token();
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
        Schema::dropIfExists('users');
    }
}
