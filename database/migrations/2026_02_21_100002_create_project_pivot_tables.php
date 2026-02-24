<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Project ↔ Partners (Donors) pivot
        Schema::create('project_partner', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedInteger('partner_id');

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            // partners table uses int(11), not bigint — no FK constraint, just index
            $table->index('partner_id');

            $table->unique(['project_id', 'partner_id']);
        });

        // Project ↔ Focus Areas pivot
        Schema::create('project_focus_area', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('focus_area_id');

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('focus_area_id')->references('id')->on('focus_areas')->onDelete('cascade');

            $table->unique(['project_id', 'focus_area_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_focus_area');
        Schema::dropIfExists('project_partner');
    }
};
