<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Company;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPost extends Model
{
    use HasFactory;
    protected $table = 'job_posts';
    protected $fillable = [
        'company_id',
        'job_title',
        'company_name',
        'job_type',
        'experience_level',
        'location',
        'salary_range',
        'application_url',
        'job_description',
        'responsibilities',
        'requirements',
        'benefits',
        'required_skills',
        'bachelor_degree',
        'portfolio_required',
        'about_company',
        'company_website',
        'company_logo',
    ];
    // Use with caution
    // protected $guarded = [];

    // JobPost.php 
    // company belongsto job posts 
    protected $casts = [
        'required_skills' => 'array',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'id');
    }

    public function JobApplication()
    {
        return $this->HasMany(JobApplication::class, 'job_id');
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }


}