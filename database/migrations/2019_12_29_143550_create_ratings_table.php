<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            // đánh giá của sản phẩm nào
            $table->integer('ra_product_id')->index()->default(0);
            // Số điểm đánh giá
            $table->tinyInteger('ra_number')->default(0);
            // Nội dung đánh giá
            $table->string('ra_content')->nullable();
            // id người đánh giá
            $table->integer('ra_user_id')->index()->default(0);
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
        Schema::dropIfExists('ratings');
    }
}
