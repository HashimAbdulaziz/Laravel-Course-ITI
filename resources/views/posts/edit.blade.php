<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Edit Post</title>
</head>
<body>
   <form action="/posts/{{ $post['id'] }}" method="POST">
      @csrf
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ $post['title'] }}">

      <label for="body">Body</label>
      <textarea name="body" id="body">{{ $post['body'] }}</textarea>

      <button type="submit">Update Post</button>
   </form>

   
   
</body>
</html>