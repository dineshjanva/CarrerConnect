<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'skill',
    ];

    /**
     * Relationship: UserSkill belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
