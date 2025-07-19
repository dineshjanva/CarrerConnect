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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('company_id');          // User who gets notified
            $table->unsignedBigInteger('job_post_id')->nullable();  // Optional: related job
            $table->string('company_name');                        // Title of the notification
            $table->text('job_title')->nullable();            // Notification body/message
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
