<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getAll()
    {
        return $this->reviewRepository->getAllReviews();
    }

    public function getById($id)
    {
        return $this->reviewRepository->getReviewById($id);
    }

    public function create(array $data)
    {
        
        return $this->reviewRepository->createReview($data);
        
    }
    
    public function update($id, array $data)
    {
        return $this->reviewRepository->updateReview($id, $data);
    }

    public function delete($id)
    {
        return $this->reviewRepository->deleteReview($id);
    }
}
