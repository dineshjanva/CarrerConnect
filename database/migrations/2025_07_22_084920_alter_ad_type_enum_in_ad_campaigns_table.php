<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE ad_campaigns MODIFY ad_type ENUM('banner', 'sponsored', 'popup', 'video') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        DB::statement("ALTER TABLE ad_campaigns MODIFY ad_type ENUM('banner', 'sponsored', 'popup', 'video') NOT NULL");

    }
};