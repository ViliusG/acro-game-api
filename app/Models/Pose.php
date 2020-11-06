<?php

namespace App\Models;

use App\Constants\PoseStatus;
use Illuminate\Database\Eloquent\Model;

class Pose extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'description', 'difficulty', 'type', 'image_url', 'people_count', 'status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', PoseStatus::ACTIVE);
    }

    public function scopePending($query)
    {
        return $query->where('status', PoseStatus::PENDING);
    }
}
