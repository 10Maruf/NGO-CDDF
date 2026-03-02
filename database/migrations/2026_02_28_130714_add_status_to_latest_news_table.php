<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('latest_news')) return;
        Schema::table('latest_news', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('latest_news', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
