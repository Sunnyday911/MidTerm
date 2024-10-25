<?php

namespace App\Http\Controllers;
use App\Models\Item;

use Illuminate\Http\Request;

// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{


    public function editttsss($id)
    {
        // Fetch the item by its ID
        $item = Item::findOrFail($id);

        // Return the edits view with the item data
        return view('items.edits', compact('item'));
    }
    
    // Show the event page with items
    public function showEventPage()
    {
        $items = Item::all();
        return view('event', compact('items'));
    }

    public function edit($id)
{
    // Fetch the item by its ID
    $item = Item::findOrFail($id);

    // Return the edit view with the item data
    return view('items.edit', compact('item'));
}

    // Store a new item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->date = $request->date;
        $item->price = $request->price;
        $item->description = $request->description;

        if ($request->hasFile('image')) {
            $item->image = $request->file('image')->store('images', 'public');
        }

        $item->save();

        return redirect()->route('event')->with('success', 'Item added successfully');
    }
}

