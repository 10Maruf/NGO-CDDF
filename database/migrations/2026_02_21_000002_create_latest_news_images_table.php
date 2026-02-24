<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatestNewsImagesTable extends Migration
{
    public function up()
    {
        Schema::create('latest_news_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('news_id')->index();
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('latest_news_images');
    }
}
