<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="../app.css" />
    </head>
    <body>        
        <article>
            <?= $post; ?>
        </article>
        <a href="/">Go Back</a>
    </body>    
</html>
