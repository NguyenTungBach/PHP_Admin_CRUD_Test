<?php

use App\Enums\OrderStatus;
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
            $table->id();
            $table->boolean('check_out'); // thanh toán hay chưa -> tách phần thanh toán
            $table->unsignedBigInteger('user_id');// ai mua
//            $table->foreign('user_id')->references('id')->on('users');
            $table->double('total_price');// tổng giá
            $table->string('ship_name');// ship cho ai
            $table->string('ship_phone');// phone là gì
            $table->string('ship_email');// email là gì
            $table->string('ship_address');// địa chỉ cần gửi đến
            $table->text('ship_note');// note
            $table->timestamps(); // ngày tạo, ngày update
            $table->unsignedBigInteger('status')->default(OrderStatus::Waiting); // 1.done | 2. waiting_to_confirm | 3.processing(đang vận chuyển)

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
