<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnCHomeInTableCategories extends Migration
{
    public function up()
    {
        // Thêm column  pro_pay va pro_number bi thieu
        Schema::table('categories', function (Blueprint $table) {
            $table->string('c_avatar')->nullable();
            $table->tinyInteger('c_home')->default(0)->index();
            
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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('c_avatar'); 
            $table->dropColumn('c_home');
        });
    }
}
