<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getCommentsAttribute()
    {
        $comments = 0;
        foreach ($this->posts as $post) {
            $comments += $post->comments()->count();
        }
        return $comments;
    }

    static function getPopular()
    {
        return Tag::all()->where('comments')->sortByDesc('comments');
    }

    public function scopeSearch($query, $request)
    {
        return $query->whereFullText('title', $request->search)->paginate(5);
    }
}