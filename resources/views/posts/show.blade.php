<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Post</title>
</head>
<body>
   <h2>postinfo:</h2>
   <p>Title: {{ $post['title'] }}</p>
   <p>Description: {{ $post['description'] }}</p>

   <h2>Post creator inf:</h2>
   <p>Name: {{ $post['post_creator_name'] }}</p>
   <p>Email: {{ $post['post_creator_email'] }}</p>
   <p>Created at: {{ $post['created_at'] }}</p>

   <hr>
   
   <a href="/posts">Back to all posts</a>
   
</body>
</html>