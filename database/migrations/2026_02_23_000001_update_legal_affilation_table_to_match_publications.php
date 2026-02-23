<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('legal_affilation', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->text('description')->nullable()->after('title');
            $table->string('thumbnail')->nullable()->after('description');
            $table->string('pdf_file')->nullable()->after('thumbnail');
        });

        // Copy existing data
        DB::statement('UPDATE legal_affilation SET title = name, pdf_file = file');

        Schema::table('legal_affilation', function (Blueprint $table) {
            $table->dropColumn(['name', 'file']);
        });

        Schema::table('legal_affilation', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('legal_affilation', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
            $table->string('file')->nullable()->after('name');
        });

        DB::statement('UPDATE legal_affilation SET name = title, file = pdf_file');

        Schema::table('legal_affilation', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'thumbnail', 'pdf_file']);
        });
    }
};
