<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct ($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    // retrieve ALL post files and return contents
    public static function all() {

        // Use File class to load post html files from resources/post directory
        $files =  File::files(resource_path("post/"));

        // read each post file into a collection and map over them to parse meta data (Yaml)
        // and body and create array of posts to display on screen
        $posts = collect($files)
            ->map(function($file){
                $document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug);
            })
            ->sortByDesc('date');
        return $posts;
    }

    // retrieve individual post given the slug, cache the results, and return results
    public static function find($slug)
    {

        $posts = static::all();
        return $posts->firstWhere('slug', $slug);

        //cache get content of file for 5 hours
        // $post = cache()->remember("posts.{$slug}", now()->addHours(5), function () use ($path) {
        //     return file_get_contents($path);
        // });

    }
}
