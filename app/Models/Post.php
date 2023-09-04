<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Array_;

class Post extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'title',
        'body',
        'subject',
        'slug',
        'category_id',
        'user_id'
    ];

    protected $with = ['category', 'user'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // filter the search and clear the messy code
    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($query) =>
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orwhere('body', 'LIKE', '%' . $search . '%')
                    ->orwhere('subject', 'LIKE', '%' . $search . '%')
            )
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'user',
                fn ($query) =>
                $query->where('slug', $author)
            )
        );
        // $query
        // ->whereExists(fn($query) =>
        // $query->from('categories')
        //             ->wherecolumn('categories.id', 'posts.category_id')
        //             ->where('categories.slug', $category)
        // )
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
