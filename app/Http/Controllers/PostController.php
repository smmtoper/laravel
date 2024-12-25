<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::with('category', 'tags')->findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
