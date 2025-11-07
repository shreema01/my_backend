<?php

namespace App\Http\Controllers;
use App\Services\BookService;
use Illuminate\Http\Request;
class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks();
        return response()->json($books);
    }

    public function show($id)
    {
        $book = $this->bookService->getBookDetails($id);
        return response()->json($book);
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|string|max:255',
        'rating' => 'required|string|max:255',
        'genre' => 'nullable|array', 
        'readers_love' => 'nullable|array', 
        'sample_chapter' => 'required|string', 
        'cover_image' => 'nullable|string|max:255', 
    ]);

 
    $book = $this->bookService->addBook($validatedData);

    return response()->json([
        'message' => 'Book created successfully',
        'book' => $book
    ], 201);
}

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|string|max:255',
        'rating' => 'required|string|max:255',
        'genre' => 'nullable|array', 
        'readers_love' => 'nullable|array', 
        'sample_chapter' => 'required|string', 
        'cover_image' => 'nullable|string|max:255',
        ]);

        $book = $this->bookService->updateBook($id, $validatedData);
        return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
    }

    public function destroy($id)
    {
        $this->bookService->deleteBook($id);
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
