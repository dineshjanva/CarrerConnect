<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_name',
        'ad_type',
        'status',
        'headline',
        'ad_description',
        'cta',
        'destination_url',
        'creative_image',
        'target_audience',
        'start_date',
        'end_date',
        'total_budget',
        'bid_strategy',
        'bid_amount',
    ];

    protected $casts = [
        'target_audience' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'total_budget' => 'float',
        'bid_amount' => 'float',
    ];
}