<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Interfaces\AuthorRepositoryInterface;
use App\Repositories\AuthorRepository;
use App\Interfaces\BookRepositoryInterface;
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

    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
