<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    //
     protected $table='user_experience';
    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'location',
        'years',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

