<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="stylesheet" href="app.css" />
</head>

<body>
    <?php foreach($posts as $post) : ?>
    <article>
        <a href="posts/<?= $post->slug ?>">
            <h1><?= $post->title ?></h1>
        </a>

        <div><?= $post->excerpt ?></div>
    </article>
    <?php endforeach ?>
</body>

</html>
