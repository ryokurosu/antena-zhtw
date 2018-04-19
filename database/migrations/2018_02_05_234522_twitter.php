<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Twitter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('twitters', function (Blueprint $table) {
        $table->increments('id');
        $table->Integer('article_id');
        $table->string('user_id');
        $table->string('tweet_id');
        $table->longtext('text');
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
       Schema::dropIfExists('twitters');
   }
}
