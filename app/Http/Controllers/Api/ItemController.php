<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::orderBy('name', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'data found',
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        // Create a new item record
        $item = Item::create([
            'name' => $validatedData['name'],
            'desc' => $validatedData['desc'],
        ]);

        // Perform any additional logic or actions if needed

        // Return a response or redirect as desired
        return response()->json(['message' => 'Item created successfully']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Item::findOrFail($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data found',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'data not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Item::findOrFail($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data found',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'data not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([

            'name' => 'required',
            'desc' => 'required',
        ]);

        try {
            // Find the item by ID
            $item = Item::findOrFail($id);

            $item->name = $validatedData['name'];
            $item->desc = $validatedData['desc'];

            // Save the changes
            $item->save();

            // Return a JSON response
            return response()->json(['message' => 'Item updated successfully', 'item' => $item], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that occur
            return response()->json(['message' => 'Failed to update item', 'error' => $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::where('id', $id)->delete();

        return response()->json(['message' => 'Item deleted successfully'], 200);
    }
}
