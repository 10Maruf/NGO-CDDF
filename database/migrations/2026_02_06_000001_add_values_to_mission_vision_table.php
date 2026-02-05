<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('mission_vision')) {
            return;
        }

        Schema::table('mission_vision', function (Blueprint $table) {
            if (! Schema::hasColumn('mission_vision', 'values')) {
                $table->text('values')->nullable();
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('mission_vision')) {
            return;
        }

        if (! Schema::hasColumn('mission_vision', 'values')) {
            return;
        }

        Schema::table('mission_vision', function (Blueprint $table) {
            $table->dropColumn('values');
        });
    }
};
