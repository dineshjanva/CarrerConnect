<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobPost;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPost>
 */
class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => 1,
            'job_title' => $this->faker->jobTitle,
            'company_name' => $this->faker->company,
            'job_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'remote']),
            'experience_level' => $this->faker->randomElement(['entry', 'mid', 'senior']),
            'location' => $this->faker->city,
            'salary_range' => '30000-50000',
            'application_url' => $this->faker->url,
            'job_description' => $this->faker->paragraph(),
            'responsibilities' => $this->faker->paragraph(),
            'requirements' => $this->faker->paragraph(),
            'benefits' => $this->faker->sentence(),
            'required_skills' => $this->faker->words(5),
            'bachelor_degree' => $this->faker->boolean(),
            'portfolio_required' => $this->faker->boolean(),
            'about_company' => $this->faker->paragraph(),
            'company_website' => $this->faker->url,
            'company_logo' => $this->faker->imageUrl(200, 200, 'business', true),
        ];
        
    }
}
