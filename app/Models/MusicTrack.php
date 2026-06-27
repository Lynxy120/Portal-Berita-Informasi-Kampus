<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicTrack extends Model
{
    protected $fillable = ['spotify_track_id', 'title', 'artist', 'preview_url'];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
