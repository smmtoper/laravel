<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'tags', 'comments')->get();
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::with('category', 'tags', 'comments')->findOrFail($id);
        return new PostResource($post);
    }
}
