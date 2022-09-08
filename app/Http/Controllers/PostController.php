<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        if ($request->query('search')) {
            $data['posts'] = Post::search(5, $request);
            $data['tags'] = Tag::search($request);
            $data['categories'] = Category::search($request);
        } else {
            $data['posts'] = Post::show(5, $request);
        }
        $data['popular_tags'] = Tag::getPopular();
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show', [
            'post' => Post::findOrFail($id),
            // 'comments' => Comment::getForPost($id),
        ]);
    }
}