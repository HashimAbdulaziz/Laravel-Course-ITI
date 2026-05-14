<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Posts</title>
</head>
   <body>
      <h1>Posts</h1>
      <ul>
         @foreach ($posts as $post)
               <li>
                  <h2>{{ $post['title'] }}</h2>
                  <p>{{ $post['description'] }}</p>
                  <p>{{ $post['created_at'] }}</p>
                  <a href="/posts/{{ $post['id'] }}">View Post</a>
                  <botton><a href="/posts/{{ $post['id'] }}/edit">Edit</a></button>
                     
                  <form action="/posts/{{ $post['id'] }}/delete" method="POST" style="display:inline;">
                     @csrf
                     @method('DELETE')
                     <button button type="submit">Delete</button>
                  </form>
               </li>
         @endforeach
      </ul>

      <botton><a href="/posts/create">Create Post</a></button>
   </body>
</html>