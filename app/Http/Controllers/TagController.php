<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Resources\TagResource;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tags = Tag::all(); 
        return TagResource::collection($tags);  
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = Tag::create($validated);

        return new TagResource($tag);  
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        return new TagResource($tag);  
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
            'name' => 'required|max:255',
        ]);


        $tag = Tag::findOrFail($id);

        $tag->update($validated);

        return new TagResource($tag);  
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Удаляем тег по ID
        Tag::destroy($id);

        return response()->json(null, 204);
    }
}
