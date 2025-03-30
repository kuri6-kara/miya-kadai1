<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function search(Request $request)
    {
        $category = $request->input('category');
    }
}
