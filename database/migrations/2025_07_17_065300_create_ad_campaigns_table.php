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
        Schema::create('ad_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_name');
            $table->enum('ad_type', ['banner', 'sponsored', 'popup']);
            $table->enum('status', ['active', 'paused', 'pending'])->default('pending');
            $table->string('headline');
            $table->text('ad_description');
            $table->string('cta');
            $table->string('destination_url');
            $table->string('creative_image')->nullable(); // image path
            $table->json('target_audience');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_budget', 10, 2);
            $table->enum('bid_strategy', ['cpc', 'cpm', 'cpa']);
            $table->decimal('bid_amount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_campaigns');
    }
};