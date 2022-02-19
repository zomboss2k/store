<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   // Bang luu chi tiet don hang
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            // chi tiết đơn hàng của đơn nào    (chi tiết) *-1 (đơn hàng)
            $table->integer('or_transaction_id')->index()->default(0);
            // mặt hàng nào
            $table->integer('or_product_id')->index()->default(0);
            //  Số lượng của mặt hàng
            $table->tinyInteger('or_qty')->default(0);
            // Giá tại thời điểm mua hàng 
            $table->integer('or_price')->default(0);
            // Sale tại thời điểm mua hàng
            $table->tinyInteger('or_sale')->default(0);         
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
