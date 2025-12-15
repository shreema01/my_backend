<?php

namespace App\Repositories;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
class BookRepository implements BookRepositoryInterface
{
    public function getAllBooks()
    
    {
        return Book::paginate(10);
    }

    public function getBookById($id)
    
    {
        return Book::findOrFail($id);
    }

    public function createBook(array $data)
    {
        
        if (isset($data['cover_image']) ) {
            $fileName = time() . '.' . $data['cover_image']->getClientOriginalExtension();
            $path = $data['cover_image']->storeAs('books', $fileName, 'public');
            $data['cover_image'] = $path;
        }

        return Book::create($data);
    }

    public function updateBook($id, array $data)
    {
        $book = Book::findOrFail($id);

        if (isset($data['cover_image']) && $data['cover_image'] instanceof \Illuminate\Http\UploadedFile) {

            $imageName = time().'.'.$data['cover_image']->getClientOriginalExtension();
            $data['cover_image']->move(public_path('public/uploads/books'), $imageName);

            $data['cover_image'] = 'uploads/books/'.$imageName;
        }

        $book->update($data);

        return $book;
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);

        return $book->delete();
    }
}
