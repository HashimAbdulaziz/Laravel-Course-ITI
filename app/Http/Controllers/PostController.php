<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts;

    public function __construct()
    {
        $this->posts = [
            ['id' => 1, 'title' => 'Post 1', 'description' => 'This is the description of post 1', 'post_creator_name' => 'John Doe', 'post_creator_email' => 'john@example.com', 'created_at' => '2023-10-01 10:00:00'],
            ['id' => 2, 'title' => 'Post 2', 'description' => 'This is the description of post 2', 'post_creator_name' => 'Jane Doe', 'post_creator_email' => 'jane@example.com', 'created_at' => '2023-10-02 11:30:00'],
            ['id' => 3, 'title' => 'Post 3', 'description' => 'This is the description of post 3', 'post_creator_name' => 'Sam Smith', 'post_creator_email' => 'sam@example.com', 'created_at' => '2023-10-03 14:15:00'],
        ];
    }

    public function index()
    {
        return view('posts.index', ['posts' => $this->posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $newPost = [
            'id' => count($this->posts) + 1,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'post_creator_name' => $request->input('post_creator_name'),
            'post_creator_email' => $request->input('post_creator_email'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->posts[] = $newPost;

        dd($this->posts);
    }

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

    public function update(Request $request, string $id)
    {
        foreach ($this->posts as $index => $post) {
            if ($post['id'] == $id) {
                $this->posts[$index]['title'] = $request->input('title');
                $this->posts[$index]['description'] = $request->input('description');
                $this->posts[$index]['post_creator_name'] = $request->input('post_creator_name');
                $this->posts[$index]['post_creator_email'] = $request->input('post_creator_email');
                break;
            }
        }

        dd($this->posts);
    }

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