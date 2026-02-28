<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type');           // donation, volunteer, message, subscriber, project, career, publication, contact
            $table->string('title');
            $table->text('message')->nullable();
            $table->string('icon')->default('feather-bell');   // feather icon class
            $table->string('icon_color')->default('primary');  // bootstrap color: primary, success, danger, warning, info
            $table->string('link')->nullable();                // clickable URL
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_notifications');
    }
}
