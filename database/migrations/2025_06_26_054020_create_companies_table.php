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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');                       // TechCorp Inc.
            $table->string('tagline')->nullable();        // Tagline
            $table->string('technology');
            $table->string('website')->nullable();        // techcorp.com
            $table->string('industry')->nullable();       // Software & Technology
            $table->string('employee_size')->nullable();  // 1,000+ employees
            $table->string('location')->nullable();       // San Francisco, CA
            $table->text('description')->nullable();      // Company about
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
