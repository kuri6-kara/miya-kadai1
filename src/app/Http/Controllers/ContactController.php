<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        return view('index', compact('categories', 'items'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        $category = Category::find($request->category_id);
        $item = Item::find($request->item_id);
        return view('confirm', compact('contact', 'category', 'item'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['category_id', 'item_id', 'last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
