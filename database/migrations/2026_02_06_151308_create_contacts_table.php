<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['head_office', 'branch', 'person']);
            $table->string('title')->nullable(); // Office title or Person designation
            $table->text('address')->nullable(); // For offices only
            $table->string('name')->nullable(); // For persons only
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('twitter')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
