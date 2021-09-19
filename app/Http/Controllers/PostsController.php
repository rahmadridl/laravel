<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'price' => 'required'
        ]);

        Post::create([
            'name' => request('name'),
            'description' => request('description'),
            'image' => request('image'),
            'price' => request('price')
        ]);

        return redirect('/posts');
    }

    public function edit(Post $posts)
    {
        return view('posts.edit', ['post' => $posts]);
    }

    public function update(Post $posts)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
            'price' => 'required'
        ]);

        $post->update([
            'name' => request('name'),
            'description' => request('description'),
            'image' => request('image'),
            'price' => request('price')
        ]);

        return redirect('/posts');
    }

    public function destroy(Post $posts)
    {
        $post->delete();

        return redirect('/posts');
    }
    
}
