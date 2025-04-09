<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BukuRepository;
use App\Repositories\BukuRepositoryImplement;
use App\Repositories\CategoryRepositoryImplement;
use App\Repositories\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BukuRepository::class, BukuRepositoryImplement::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryImplement::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
