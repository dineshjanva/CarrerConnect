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
    Schema::create('job_posts', function (Blueprint $table) {
        $table->id();
        $table->string('job_title');
        $table->string('company_name');
        $table->string('job_type');
        $table->string('experience_level');
        $table->string('location');
        $table->string('salary_range')->nullable();
        $table->string('application_url');
        $table->text('job_description');
        $table->text('responsibilities');
        $table->text('requirements');
        $table->text('benefits')->nullable();
        $table->json('required_skills')->nullable();
        $table->boolean('bachelor_degree')->default(false);
        $table->boolean('portfolio_required')->default(false);
        $table->text('about_company');
        $table->string('company_website')->nullable();
        $table->string('company_logo')->nullable();
        $table->timestamps();     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
