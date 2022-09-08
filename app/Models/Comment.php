<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'comment_id', 'level', 'user_id', 'text'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    static function new($request)
    {
        return Comment::create([
            'post_id' => $request['post'],
            'comment_id' => $request['reply'] ?: null,
            'user_id' => Auth::user()->id,
            'level' => $request['reply'] ? Comment::find($request['reply'])->level + 1 : 0,
            'text' => $request['comment'],
        ]);
    }

    // static function remove($comment)
    // {
    //     dd($comment);
    // }

    static function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}