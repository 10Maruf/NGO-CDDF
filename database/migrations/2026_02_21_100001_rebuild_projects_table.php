<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop old tables
        Schema::dropIfExists('project_focus_area');
        Schema::dropIfExists('project_partner');
        Schema::dropIfExists('ongoing_project');
        Schema::dropIfExists('projects');

        // New unified projects table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // Core info
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('cover_image')->nullable();

            // Descriptions
            $table->text('short_description');           // 2-3 line summary (card view)
            $table->longText('detail_description')->nullable(); // Quill rich text (detail page)

            // Status
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing');

            // Timeline
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            // Extra details
            $table->string('location')->nullable();             // e.g. "Cox's Bazar, Chittagong"
            $table->decimal('budget', 15, 2)->nullable();       // Total project budget/funding
            $table->unsignedBigInteger('beneficiary_count')->nullable(); // Number of people served
            $table->string('implementing_partner')->nullable(); // Lead implementing org (free text)

            // Display control
            $table->boolean('is_featured')->default(false);     // Show on homepage highlight
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');

        // Restore old tables (basic)
        Schema::create('ongoing_project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('partners')->nullable();
            $table->date('from_date')->nullable();
            $table->string('date')->nullable();
            $table->date('to_date')->nullable();
        });
    }
};
