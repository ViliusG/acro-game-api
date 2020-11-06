<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'difficulty', 'type', 'image_url', 'people_count', 'description',
    ];
}
