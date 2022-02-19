<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnProContentAndProTitleSeoInTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    // Them 2 cot thieu

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('pro_title_seo')->nullable();
            $table->longText('pro_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('pro_title_seo');
            $table->dropColumn('pro_content');
        });
    }
}
