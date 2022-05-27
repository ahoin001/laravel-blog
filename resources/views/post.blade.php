<!DOCTYPE html>

<title>My Blog</title>
<link rel="stylesheet" href="/app.css">

<body>

<article>

    {{-- This page is a template, blog post will be provided from wildcard in route --}}
   <h1><?= $post->title; ?></h1> 
   <div><?= $post->body; ?></div>

</article>

<a href="/">Go Home</a>

</body>
        