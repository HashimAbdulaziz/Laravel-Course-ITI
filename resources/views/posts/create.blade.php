<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Create Post</title>
</head>
<body>
   <h1>Create Post</h1>

   <form action="/posts" method="POST">
      @csrf
      <label for="title">Title</label>
      <input type="text" name="title" id="title">

      <label for="body">Body</label>
      <textarea name="body" id="body"></textarea>

      <button type="submit">Create Post</button>
   </form>
   
</body>
</html>