<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('focus_areas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            // Optional FontAwesome class, e.g. "fa-solid fa-bullseye"
            $table->string('icon_class')->nullable();
            // Stored as relative path under storage/app/public, e.g. "focus_areas/abc.jpg"
            $table->string('image_path')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focus_areas');
    }
};
