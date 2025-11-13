<?php

namespace App\Interfaces;

interface AuthorRepositoryInterface
{
    public function getAllAuthors();
    public function getAuthorById($id);
    public function createAuthor(array $data);
    public function updateAuthor($id, array $data);
    public function deleteAuthor($id);
}
