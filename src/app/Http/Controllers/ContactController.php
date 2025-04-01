<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        $category = Category::find($request->category_id);
        return view('confirm', compact('contact', 'category'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['category_id', 'last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
