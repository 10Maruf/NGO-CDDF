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
        Schema::table('policy_guideline', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('legal_affilation', function (Blueprint $table) {
            $table->timestamps();
        });
        
        // Fill timestamps for existing records
        DB::table('policy_guideline')->update(['created_at' => now(), 'updated_at' => now()]);
        DB::table('legal_affilation')->update(['created_at' => now(), 'updated_at' => now()]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('policy_guideline', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('legal_affilation', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
