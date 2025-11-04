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
        $data = $request->only([
            'title',
            'description',
            'price',
            'rating',
            'genre',
            'readers_love',
            'sample_chapter',
            'cover_image',
        ]);

        $book = $this->bookService->addBook($data);
        return response()->json(['message' => 'Book created successfully', 'book' => $book], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'description',
            'price',
            'rating',
            'genre',
            'readers_love',
            'sample_chapter',
            'cover_image',
        ]);

        $book = $this->bookService->updateBook($id, $data);
        return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
    }

    public function destroy($id)
    {
        $this->bookService->deleteBook($id);
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
