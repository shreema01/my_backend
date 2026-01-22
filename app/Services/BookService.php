<?php

namespace App\Services;
use App\Repositories\BookRepository;

class BookService
{
    protected $bookRepository;
    
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    
    public function getAllBooks()
    {
        return $this->bookRepository->getAllBooks();
    }
    public function getBookDetails($id)
    {
        return $this->bookRepository->getBookById($id);
    }

    public function addBook(array $data)
    {
       
       return $this->bookRepository->createBook($data);
       
    }

    public function updateBook($id, array $data)
    {
        return $this->bookRepository->updateBook($id, $data);
    }

    public function deleteBook($id)
    {
        
        return $this->bookRepository->deleteBook($id);
    }
}
