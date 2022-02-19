<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnAHotInTableArticles extends Migration
{
    public function up()
    {
        // Thêm column  a_hot
        Schema::table('articles', function (Blueprint $table) {
           
            $table->tinyInteger('c_hot')->default(0)->index();
            
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
        Schema::table('articles', function (Blueprint $table) {
            
            $table->dropColumn('c_hot');
        });
    }
}
