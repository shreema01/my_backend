<?php

namespace App\Interfaces;
interface BookRepositoryInterface
{
    public function getAllBooks();
    public function getBookById($id);
    public function createBook(array $data);
    public function updateBook($id, array $data);
    public function deleteBook($id);
}
