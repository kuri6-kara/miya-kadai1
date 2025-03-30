<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(CategoryRequest $request)
    {
        $contact = $request->only(['category_id', 'content']);
        return view('confirm', compact('categories'));
    }

    public function store()
    {
        $categories = Category::all();
        return view('admin', compact('categories'));
    }
}
