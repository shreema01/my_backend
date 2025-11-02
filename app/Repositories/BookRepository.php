<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    public function getAllBooks()
    {
        return Book::all();
    }

    public function getBookById($id)
    {
        return Book::findOrFail($id);
    }

    public function createBook(array $data)
    {
        return Book::create($data);
    }

    public function updateBook($id, array $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        return $book->delete();
    }
}
