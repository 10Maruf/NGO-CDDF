<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('focus_areas', function (Blueprint $table) {
            if (!Schema::hasColumn('focus_areas', 'icon_class')) {
                $table->string('icon_class')->nullable()->after('description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('focus_areas', function (Blueprint $table) {
            $table->dropColumn('icon_class');
        });
    }
};
