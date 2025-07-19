<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Company extends Model
{

    protected $table = 'companies';
    protected $fillable = [
        'user_id',
        'company_id',
        'name',
        'tagline',
        'website',
        'industry',
        'employee_size',
        'location',
        'description',
        'logo',
    ];

    public function jobs()
    {
        return $this->hasMany(JobPost::class, 'company_id');
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

}
