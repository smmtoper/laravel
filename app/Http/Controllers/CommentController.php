<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     *
     * @param  int  $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->get();

        return CommentResource::collection($comments); 
    }
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $postId)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $validated['post_id'] = $postId;

        $comment = Comment::create($validated);

        return new CommentResource($comment); 
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return new CommentResource($comment); 
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::findOrFail($id);

        $comment->update($validated);


        return new CommentResource($comment); 
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return response()->json(null, 204); 
    }
}
