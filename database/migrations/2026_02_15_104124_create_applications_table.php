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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('main_logo')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });

        // Insert default data with UMUS logo
        DB::table('applications')->insert([
            'id' => 1,
            'main_logo' => 'umus-logo.jpg',
            'fav_icon' => 'umus-logo.jpg',
            'facebook' => 'https://www.facebook.com/Uddipto.2003',
            'twitter' => '',
            'instagram' => '',
            'youtube' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
