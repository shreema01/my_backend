<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Services\AuthorService;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $authors = $this->authorService->getAllAuthors();
        return response()->json($authors);
    }

    public function show($id)
    {
        $author = $this->authorService->getAuthorDetails($id);
        return response()->json($author);
    }

// ..................................
  public function store(Request $request)
  {
  
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'story' => 'required|string',
        'writing_philosophy' => 'nullable|array', 
        'award_and_recognition' => 'nullable|array', 
        'social_links' => 'nullable|array',
        'cover_image' => 'nullable|image', 
    ]);


    $author = $this->authorService->addAuthor($validatedData);

    return response()->json([
        'message' => 'Author created successfully',
        'author' => $author
    ], 201);
}



    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        'title'                 => 'required|string|max:255',
        'description'           => 'required|string|max:255',
        'story'                 => 'required|string',
        'writing_philosophy'    => 'nullable|array',
        'award_and_recognition' => 'nullable|array',
        'social_links'          => 'nullable|array',
        'cover_image'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $author = $this->authorService->updateAuthor($id, $validatedData);
        return response()->json(['message' => 'Author updated successfully', 'author' => $author]);
    }

    public function destroy($id)
    {
        $this->authorService->deleteAuthor($id);
        return response()->json(['message' => 'Author deleted successfully']);
    }
}
