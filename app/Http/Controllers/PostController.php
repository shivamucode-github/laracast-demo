<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(8)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'categories' => Category::all(),
            'users' => User::all(),
            'comments' => Comment::where('post_id', $post->id)->latest()->get(),
            'currentCategory' => null,
            'currentUser' => null
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(PostRequest $request)
    {
        $v = Auth::id();
        $post = Post::create(array_merge($request->toArray(),[
            'user_id' =>  Auth::id(),
            'category_id' => $request->category
        ]));

        if ($post) {
            return redirect('/')->with('success', 'Post Uploaded successfully');
        } else {
            return back()->with('Something went wrong');
        }
    }
}
