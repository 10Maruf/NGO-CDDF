<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgMembersTable extends Migration
{
    public function up()
    {
        Schema::create('org_members', function (Blueprint $table) {
            $table->id();
            $table->enum('org_type', [
                'general_council',
                'executive_committee',
                'advisory_council',
                'executive_director',
                'senior_management',
                'mid_management',
                'field_staff',
                'support_staff',
            ]);
            $table->string('name');
            $table->string('designation');
            $table->string('department')->nullable();
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('org_members');
    }
}
