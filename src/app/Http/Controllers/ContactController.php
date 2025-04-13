<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Contact;
use App\Models\Channel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        $channels = Channel::all();
        return view('index', compact('categories', 'items', 'channels'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']);
        $category = Category::find($request->category_id);
        $item = Item::find($request->item_id);
        $channel = Channel::find($request->$channel_ids);
        return view('confirm', compact('contacts', 'category', 'items', 'channels'));
    }

    public function store(Request $request)
    {
        $contact = Contact::created(
        $request->only(['category_id', 'item_id', 'last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'detail']));

        Contact::create($contact);
        return view('thanks');
    }
}
