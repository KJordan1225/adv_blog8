<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/post/" . $slug . ".html";

    //dd($path);

    if (!file_exists($path)) {
        abort(404);
    }

    //cache get content of file for 5 seconds
    $post = cache()->remember("posts.{$slug}", 5, function () use ($path) {
        return file_get_contents($path);
    });  
    
    //cache get content of file for 5 hours
    // $post = cache()->remember("posts.{$slug}", now()->addHours(5), function () use ($path) {
    //     return file_get_contents($path);
    // });    


    return view('post', [
        'post' => $post,
    ]);
});
