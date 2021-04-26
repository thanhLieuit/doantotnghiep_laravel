<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLoaiproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaiproducts', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_menu')->unsigned();
            $table->string('Name_loai');
            $table->foreign('id_menu')->references('id')->on('menuchas')->onDelete('cascade');
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
        Schema::dropIfExists('loaiproducts');
    }
}
