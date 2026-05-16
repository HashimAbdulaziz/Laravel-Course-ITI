<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest; 
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::with('user')->paginate(5);

        return PostResource::collection($posts);
    }


    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);

        return new PostResource($post);
    }


    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());

        return new PostResource($post);
    }
}