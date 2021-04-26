<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_loai')->unsigned();
            $table->string('Name');
            $table->Text('Image');
            $table->integer('Price');
            $table->integer('Promotion_price');
            $table->Text('Detail');
            $table->Date('Hansd');
            $table->integer('id_u')->unsigned();
            $table->foreign('id_loai')->references('id')->on('loaiproducts')->onDelete('cascade');
            $table->foreign('id_u')->references('id')->on('users')->onDelete('cascade');
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
