<!DOCTYPE html>
<title> Blog </title>
<link rel="stylesheet" href="/app.css">


<body>

    @foreach ($posts as $post)
        <article>
            <?= $post; ?>
        </article>
    @endforeach
   

</body>