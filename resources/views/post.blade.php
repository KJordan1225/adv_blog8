<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="../app.css" />
</head>

<body>
    <article>
        <h1><?= $post->title ?></h1>

        <div><?= $post->body ?></div>
    </article>
    <a href="/">Go Back</a>
</body>

</html>
