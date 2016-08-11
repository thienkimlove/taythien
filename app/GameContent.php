<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameContent extends Model
{
    protected $fillable = [
        'type',
        'title',
        'desc',
        'content',
        'image',
        'external_link',
        'order',
        'video_url',
    ];
}
