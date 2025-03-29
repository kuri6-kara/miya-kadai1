<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

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
}
