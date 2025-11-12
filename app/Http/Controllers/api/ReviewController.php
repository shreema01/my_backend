<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        return response()->json($this->reviewService->getAllReviews());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string',
            'name' => 'required|string|max:255',
        ]);

        return response()->json($this->reviewService->createReview($validated), 201);
    }

    public function show($id)
    {
        return response()->json($this->reviewService->getReview($id));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'rating' => 'sometimes|integer|min:1|max:5',
            'description' => 'sometimes|string',
            'name' => 'sometimes|string|max:255',
        ]);

        return response()->json($this->reviewService->updateReview($id, $validated));
    }

    public function destroy($id)
    {
        return response()->json($this->reviewService->deleteReview($id));
    }
}
