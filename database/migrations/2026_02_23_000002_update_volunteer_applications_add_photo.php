<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVolunteerApplicationsAddPhoto extends Migration
{
    public function up()
    {
        // Drop old volunteers table (no longer needed)
        Schema::dropIfExists('volunteers');

        // Add photo column to volunteer_applications
        Schema::table('volunteer_applications', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('phone');
        });
    }

    public function down()
    {
        Schema::table('volunteer_applications', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
}
