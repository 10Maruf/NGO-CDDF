<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('org_members', function (Blueprint $table) {
            $table->date('joining_date')->nullable()->after('message');
        });
    }

    public function down(): void
    {
        Schema::table('org_members', function (Blueprint $table) {
            $table->dropColumn('joining_date');
        });
    }
};
