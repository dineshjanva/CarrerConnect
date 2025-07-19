<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'job_post_id',
        'company_name',
        'job_title',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Belongs to a job post (optional, may be null)
    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
