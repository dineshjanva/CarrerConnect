<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;

class JobApplication extends Model
{
    // app/Models/JobApplication.php

    protected $table='job_applications';
    protected $fillable = [
        'job_id',
        'user_id',
        'company_id',
        'full_name',
        'email',
        'mobile',
        'current_location',
        'resume',
        'cover_letter',
        'linkedin',
        'portfolio',
        'source'
    ];

    public function jobspost(){
       return $this->belongsTo(JobPost::class ,'id');
    } 
    
    public function user(){
        return $this->belongsTo(User::class,'id');
    }

}
