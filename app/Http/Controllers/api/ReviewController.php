<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //  Display all reviews.
     
    public function index()
    {
        $reviews = Review::with('book')->get();

        return response()->json([
            'message' => 'All reviews fetched successfully.',
            'data' => $reviews,
        ], 200);
    }

    //  Store a newly created review in the database.
    
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'book_id' => 'required|string',
            'rating' => 'required|string',
            'description' => 'required|string',
            'name' => 'required|string|max:255',
        ]);

        $review = Review::create($request->all());

        return response()->json([
            'message' => 'Review created successfully!',
            'data' => $review,
        ], 201);
    }

    
      // Display a specific review.
   
    public function show($id)
    {
        $review = Review::with('book')->find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found.'], 404);
        }

        return response()->json([
            'message' => 'Review details fetched successfully.',
            'data' => $review,
        ], 200);
    }
    
    //  Update a specific review.
     
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found.'], 404);
        }

        $request->validate([
            'rating' => 'sometimes|string|max:5',
            'description' => 'sometimes|string',
            'name' => 'sometimes|string|max:255',
        ]);

        $review->update($request->all());

        return response()->json([
            'message' => 'Review updated successfully!',
            'data' => $review,
        ], 200);
    }

    //  Delete a specific review.
    
    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found.'], 404);
        }

        $review->delete();

        return response()->json(['message' => 'Review deleted successfully.'], 200);
    }
}
