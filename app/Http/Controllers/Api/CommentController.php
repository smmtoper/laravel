<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        return CommentResource::collection($comments);
    }

    public function show($postId, $commentId)
    {
        $comment = Comment::where('post_id', $postId)->findOrFail($commentId);
        return new CommentResource($comment);
    }
}
