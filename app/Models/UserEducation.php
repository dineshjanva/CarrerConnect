<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    //
   
    protected $fillable = [
        'user_id',
        'degree_title',
        'institute_name',
        'location',
        'years',
        'description',
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }
}
