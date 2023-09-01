<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Posts
{
    public $title;
    public $subject;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $subject, $date, $slug, $body)
    {
        $this->title = $title;
        $this->subject = $subject;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }

    public static function all()
    {
        $posts = File::files(resource_path('post/'));
        $files = (array_map(function ($post) {
            return $post;
        }, $posts));

        $posts = [];

        foreach ($files as $file) {
            $document = YamlFrontMatter::parseFile($file);
            $posts[] = new Posts(
                $document->title,
                $document->subject,
                $document->date,
                $document->slug,
                $document->body(),
            );
        }

        return $posts;
    }

    public static function find($slug)
    {
        $path = resource_path('post/' . $slug . '.html');
        if (! file_exists($path)) {
            return redirect('/');
        }

        $document = YamlFrontMatter::parseFile($path);
        $post = new Posts(
            $document->title,
            $document->subject,
            $document->date,
            $document->slug,
            $document->body(),
        );

        return $post;
    }
}
