<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('org_members', function (Blueprint $table) {
            $table->string('education')->nullable()->after('joining_date');
            $table->unsignedSmallInteger('experience_years')->nullable()->after('education');
        });
    }

    public function down(): void
    {
        Schema::table('org_members', function (Blueprint $table) {
            $table->dropColumn(['education', 'experience_years']);
        });
    }
};
