<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getPreviousAttribute()
    {
        return Post::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

    public function getNextAttribute()
    {
        return Post::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function scopeSearch($query, $count, $request)
    {
        return $query->whereFullText(['title', 'text'], $request->search)->byCategory($request)->byTag($request)->paginate($count);
    }

    public function scopeShow($query, $count, $request = null)
    {
        return $query->byCategory($request)->byTag($request)->paginate($count);
    }

    public function scopeByCategory($query, $request)
    {
        if ($request->category) {
            $query = $query->whereHas('category', function (Builder $category) use ($request) {
                $category->whereTitle($request->category);
            });
        }
        return $query;
    }

    public function scopeByTag($query, $request)
    {
        if ($request->tag) {
            $query = $query->whereHas('tags', function (Builder $tags) use ($request) {
                $tags->whereTitle($request->tag);
            });
        }
        return $query;
    }
}