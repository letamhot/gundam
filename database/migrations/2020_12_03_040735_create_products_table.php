<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->integer('id_category')->unsigned()->nullable();
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('id_producer')->unsigned()->nullable();
            $table->foreign('id_producer')->references('id')->on('producers')->onDelete('cascade');
            $table->integer('amount')->nullable();
            $table->longtext('image')->nullable();
            $table->longtext('image1')->nullable();
            $table->longtext('image2')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('new')->nullable()->default(0);
            $table->mediumText('description')->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
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
