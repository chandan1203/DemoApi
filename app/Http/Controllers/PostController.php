<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function create()
    {
        //
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response(null,204);
    }
}
