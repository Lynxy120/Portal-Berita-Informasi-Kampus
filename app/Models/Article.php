<?php

namespace App\Models;

use App\Models\ArticleComment;
use App\Models\Category;
use App\Models\MusicTrack;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'category_id', 'music_track_id', 'title', 'slug', 'content', 'excerpt', 'thumbnail', 'views', 'is_featured', 'status', 'published_at'];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function musicTrack()
    {
        return $this->belongsTo(MusicTrack::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function approvedComments()
    {
        return $this->hasMany(ArticleComment::class)->where('is_approved', true);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
