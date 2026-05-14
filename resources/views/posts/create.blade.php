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

      <label for="description">Description</label>
      <textarea name="description" id="description"></textarea>

      <label for="post_creator_name">Post Creator Name</label>
      <input type="text" name="post_creator_name" id="post_creator_name">

      <label for="post_creator_email">Post Creator Email</label>
      <input type="email" name="post_creator_email" id="post_creator_email">

      <button type="submit">Create Post</button>
   </form>
   
</body>
</html>