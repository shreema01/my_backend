<?php

namespace App\Services;

use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getAllAuthors()
    {
        return $this->authorRepository->getAllAuthors();
    }

    public function getAuthorDetails($id)
    {
        return $this->authorRepository->getAuthorById($id);
    }

    public function addAuthor(array $data)
    {
        return $this->authorRepository->createAuthor($data);
    }

    public function updateAuthor($id, array $data)
    {
        return $this->authorRepository->updateAuthor($id, $data);
    }

    public function deleteAuthor($id)
    {
        return $this->authorRepository->deleteAuthor($id);
    }
}
