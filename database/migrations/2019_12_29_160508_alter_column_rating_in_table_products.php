<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnRatingInTableProducts extends Migration
{
    public function up()
    {
        // Thêm column  pro_pay va pro_number bi thieu
        Schema::table('products', function (Blueprint $table) {
            $table->integer('pro_total_rating')->default(0)->comment('Tổng số đánh giá');
            $table->integer('pro_total_number')->default(0)->comment('Tổng số điểm đánh giá');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('pro_pay');
            $table->dropColumn('pro_number');
           
        });
    }
}
