<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();
        return CommentResource::collection($comments); 
    }

    public function store(Request $request, $postId)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $validated['post_id'] = $postId;

        $comment = Comment::create($validated);
        return new CommentResource($comment); 
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return new CommentResource($comment); 
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($validated);
        return new CommentResource($comment); 
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        return response()->json(null, 204); 
    }
}
