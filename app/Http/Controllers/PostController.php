<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::latest()->with(['category', 'tags'])->get();
        $categories = Category::all();

        return view('blogs.index', [
            'posts' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('blogs.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string', 'min:10', ['unique:posts,title']],
            'content' => ['required', 'string', 'min:200', 'max:1000'],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png', 'size:2048'],
            'category' => ['required', 'int', 'exists:categories,id'],
            'tags' => ['nullable'],
        ]);

        $filePath = $request->image->store('images');

        $postData = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $filePath,
            'category' => $request->input('category'),
            'tags' => $request->input('tags'),
        ];

        $post = Auth::user()->posts()->create(Arr::except($postData, 'tags'));

        if ($postData['tags'] ?? false) {
            foreach (explode(',', $postData['tags']) as $tag) {
                $post->tag($tag);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = Post::find($post);

        return view('blogs.single', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
