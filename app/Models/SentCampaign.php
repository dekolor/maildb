<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentCampaign extends Model
{
    use HasFactory;

    public function campaign() {
        return $this->hasOne(Campaign::class, 'id', 'campaign_id');
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }
}
