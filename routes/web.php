<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {

    $posts = Post::all();

    // ddd($posts);

    return view('posts', [
        'posts' => $posts,
    ]);
});

Route::get('/posts/{post}', function ($slug) {

    // Find a post by its slug and supply it to a view named post

    $post = Post::find($slug);

    return view('post', [
        'post' => $post,
    ]);

});
