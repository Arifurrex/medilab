<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catagory_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug');
            $table->integer('quantity')->default(1);
            $table->integer('price')->nullable();
            $table->integer('offer_price')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('admin_id')->unsigned();
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
        Schema::dropIfExists('products');
    }
}
