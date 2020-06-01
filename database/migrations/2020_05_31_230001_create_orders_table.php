<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('quantity');
            $table->integer('idStore')->unsigned();
            $table->integer('idProduct')->unsigned();
            $table->integer('idState')->unsigned();
            $table->integer('idUser')->unsigned();

            $table->foreign('idStore')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade'); 
            $table->foreign('idState')->references('id')->on('state_orders')->onDelete('cascade'); 
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');            
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
