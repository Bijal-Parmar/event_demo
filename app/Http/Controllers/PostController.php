<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create($request->all());
        event(new PostCreated($post)); // dispatch event from here

        //You can use the below commented code 
        //PostCreated::dispatch($post);
         
        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }
}