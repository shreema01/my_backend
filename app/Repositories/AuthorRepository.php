<?php

namespace App\Repositories;

use App\Models\Author;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function getAllAuthors()
    {
        return Author::paginate(10);
    }

    public function getAuthorById($id)
    {
        return Author::findOrFail($id);
    }

    public function createAuthor(array $data)
    {
        return Author::create($data);
    }

    public function updateAuthor($id, array $data)
    {
        $author = Author::findOrFail($id);
        $author->update($data);

        return $author;
    }

    public function deleteAuthor($id)
    {
        $author = Author::findOrFail($id);

        return $author->delete();
    }
}
