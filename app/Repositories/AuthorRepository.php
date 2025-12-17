<?php

namespace App\Repositories;

use App\Models\Author;
use App\Interfaces\AuthorRepositoryInterface;

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
        if (isset($data['cover_image']) ) {
            $fileName = time() . '.' . $data['cover_image']->getClientOriginalExtension();
            $path = $data['cover_image']->storeAs('authors', $fileName, 'public');
            $data['cover_image'] = $path;
        }

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
