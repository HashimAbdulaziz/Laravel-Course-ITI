<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts;

    public function __construct()
    {
        $this->posts = [
            ['id' => 1, 'title' => 'Post 1', 'body' => 'This is the body of post 1'],
            ['id' => 2, 'title' => 'Post 2', 'body' => 'This is the body of post 2'],
            ['id' => 3, 'title' => 'Post 3', 'body' => 'This is the body of post 3'],
        ];
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', ['posts' => $this->posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPost = [
            'id' => count($this->posts) + 1,
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ];

        $this->posts[] = $newPost;

        dd($this->posts);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $post = array_filter($this->posts, function($post) use ($id){
            return $post['id'] == $id;
        });

        if (empty($post)) {
            abort(404);
        }

        return view('posts.show', ['post' => reset($post)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = array_filter($this->posts, function($post) use ($id){
            return $post['id'] == $id;
        });

        if (empty($post)) {
            abort(404);
        }

        return view('posts.edit', ['post' => reset($post)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        foreach ($this->posts as $index => $post) {
            if ($post['id'] == $id) {
                $this->posts[$index]['title'] = $request->input('title');
                $this->posts[$index]['body'] = $request->input('body');
                break;
            }
        }

        dd($this->posts);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        foreach ($this->posts as $index => $post) {
            if ($post['id'] == $id) {
                unset($this->posts[$index]);
                break;
            }
        }

        dd($this->posts);
    }
}
