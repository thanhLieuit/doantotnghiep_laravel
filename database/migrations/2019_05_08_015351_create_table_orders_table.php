<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_c')->unsigned();
            $table->integer('id_u')->unsigned();
            $table->integer('qty');
            $table->String('type');
            $table->integer('Sum');
            $table->String('Note');
            $table->foreign('id_c')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
