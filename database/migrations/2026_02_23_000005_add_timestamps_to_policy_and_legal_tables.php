<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('policy_guideline')) {
            Schema::table('policy_guideline', function (Blueprint $table) {
                $table->timestamps();
            });
            DB::table('policy_guideline')->update(['created_at' => now(), 'updated_at' => now()]);
        }

        if (Schema::hasTable('legal_affilation')) {
            Schema::table('legal_affilation', function (Blueprint $table) {
                $table->timestamps();
            });
            DB::table('legal_affilation')->update(['created_at' => now(), 'updated_at' => now()]);
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('policy_guideline')) {
            Schema::table('policy_guideline', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }

        if (Schema::hasTable('legal_affilation')) {
            Schema::table('legal_affilation', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }
    }
};
