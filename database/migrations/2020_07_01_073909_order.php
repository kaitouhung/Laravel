<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->Increments('order_id');
            $table->integer('customer_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->integer('shipping_id')->unsigned();
            $table->string('order_total');
            $table->string('order_status');
            $table->timestamps();
           
            $table->foreign('customer_id')->references('customer_id')->on('customer');
            $table->foreign('payment_id')->references('payment_id')->on('payment');
            $table->foreign('shipping_id')->references('shipping_id')->on('shipping');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
