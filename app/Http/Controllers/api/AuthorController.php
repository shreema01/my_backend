<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description',
            'story',
            'writing_philosophy',
            'award_and_recognition',
            'social_links',
            'cover_image',
        ]);

        $author = $this->authorService->addAuthor($data);
        return response()->json(['message' => 'Author created successfully', 'author' => $author], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'description',
            'story',
            'writing_philosophy',
            'award_and_recognition',
            'social_links',
            'cover_image',
        ]);

        $author = $this->authorService->updateAuthor($id, $data);
        return response()->json(['message' => 'Author updated successfully', 'author' => $author]);
    }

    public function destroy($id)
    {
        $this->authorService->deleteAuthor($id);
        return response()->json(['message' => 'Author deleted successfully']);
    }
}
