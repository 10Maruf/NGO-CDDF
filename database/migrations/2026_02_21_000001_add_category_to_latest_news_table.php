<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToLatestNewsTable extends Migration
{
    public function up()
    {
        Schema::table('latest_news', function (Blueprint $table) {
            $table->enum('category', ['news', 'event'])->default('news')->after('id');
        });
    }

    public function down()
    {
        Schema::table('latest_news', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}
