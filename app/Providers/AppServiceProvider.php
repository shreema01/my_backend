<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Interfaces\AuthorRepositoryInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\ReviewRepository;
use App\Interfaces\BookRepositoryInterface;
use App\Interfaces\ReviewRepositoryInterface;
use App\Repositories\BookRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Author
         
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
         
        // Book
         $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        
        // Review
         $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
