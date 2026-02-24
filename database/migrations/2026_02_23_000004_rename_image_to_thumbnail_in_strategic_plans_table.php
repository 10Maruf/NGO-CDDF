<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->string('thumbnail')->nullable()->after('description');
        });

        // Copy image data to thumbnail
        DB::statement('UPDATE strategic_plans SET thumbnail = image WHERE image IS NOT NULL AND image != \'\'');

        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }

    public function down(): void
    {
        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description');
        });

        DB::statement('UPDATE strategic_plans SET image = thumbnail WHERE thumbnail IS NOT NULL AND thumbnail != \'\'');

        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->dropColumn('thumbnail');
        });
    }
};
