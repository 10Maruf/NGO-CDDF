<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('org_members', function (Blueprint $table) {
            $table->dropColumn('department');
            $table->string('linkedin')->nullable()->after('youtube');
        });
    }

    public function down(): void
    {
        Schema::table('org_members', function (Blueprint $table) {
            $table->string('department')->nullable()->after('designation');
            $table->dropColumn('linkedin');
        });
    }
};
