<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('posts.category');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->toArray());

        return redirect('/')->with('success', 'Category Added Successfully');
    }
}
