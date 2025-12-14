<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Services\AuthorService;

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

    public function store(StoreAuthorRequest $request)
    {
        $validatedData = $request->validated();
        $author = $this->authorService->addAuthor($validatedData);

        return response()->json([
            'message' => 'Author created successfully',
            'author' => $author,
        ], 201);
    }

    public function update(StoreAuthorRequest $request, $id)
    {
        $validatedData = $request->validated();
        $author = $this->authorService->updateAuthor($id, $validatedData);

        return response()->json([
           
            'message' => 'Author updated successfully',
            'author' => $author,
        ]);
    }

    public function destroy($id)
    {
        $this->authorService->deleteAuthor($id);

        return response()->json(['message' => 'Author deleted successfully']);
    }
}
