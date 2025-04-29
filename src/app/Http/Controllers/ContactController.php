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
        // $contact['image_file'] = $request->image_file->store('image', 'public');
        return view('index', compact('categories', 'items', 'channels'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender1', 'gender2', 'gender3', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'detail', 'category_id', 'item_id', 'channel_ids']);
        // $contact = $request->all();
        $contact['image_file'] = $request->image_file->store('image', 'public');
        $category = Category::find($request->category_id);
        $item = Item::find($request->item_id);
        $channels = Channel::find($request->channel_ids);
        return view('confirm', compact('contact', 'category', 'item', 'channels'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $contact = Contact::create(
            $request->only(['image_file', 'category_id', 'item_id', 'last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'detail'])
        );
        $contact->channels()->sync($request->channel_ids);
        return view('thanks');
    }
}
