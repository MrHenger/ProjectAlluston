<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['miniature_id', 'video_id', 'title', 'slug', 'content',];

    public function miniature()
    {
        return $this->belongsTo('App\Models\Miniature');
    }

    public function video()
    {
        return $this->belongsTo('App\Models\Video');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
