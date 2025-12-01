<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Services\BookService;
class BookController extends Controller
{
    // protected $bookService;
    // public function __construct(BookService $bookService)
    // {
    //     $this->bookService = $bookService;
    // }
    public function __construct(private readonly BookService $bookService) {}
    public function index()
    {
        // $books = $this->bookService->getAllBooks();

        // return response()->json($books);
        return response()->json($this->bookService->getAllBooks());
    }

    public function show($id)
    {
        $book = $this->bookService->getBookDetails($id);

        return response()->json($book);
    }

    public function store(StoreBookRequest $request)
    {
        $book = $this->bookService->addBook($request->validated());

        // $validatedData = $request->validated();

        // $book = $this->bookService->addBook($validatedData);

        return response()->json([
            'message' => 'Book created successfully',
            'book' => $book,
        ], 201);
    }

    public function update(StoreBookRequest $request, $id)
    {
        $validatedData = $request->validated();

        $book = $this->bookService->UpdateBook($id, $validatedData);

        return response()->json([
            'message' => 'Book updated successfully',
            'book' => $book,
        ]);
    }

    public function destroy($id)
    {
        $this->bookService->deleteBook($id);

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
