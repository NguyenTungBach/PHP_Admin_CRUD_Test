<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');// order nào
//            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('product_id');// sản phẩm nào
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('quantity');// số lượng
            $table->double('unit_price');// giá một sản phẩm
            $table->primary(['order_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
