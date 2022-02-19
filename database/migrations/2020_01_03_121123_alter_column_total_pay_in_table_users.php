<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnTotalPayInTableUsers extends Migration
{
    public function up()
    {
        // Thêm column  pro_pay va pro_number bi thieu
        Schema::table('users', function (Blueprint $table) {
            $table->integer('total_pay')->default(0)->comment('Số sản phẩm đã mua');
            
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('total_pay');           
        });
    }
}
