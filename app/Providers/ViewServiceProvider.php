<?php

namespace App\Providers;

use App\Repositories\AIRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.partials.sidebar', static function (\Illuminate\View\View $view): void {
            $view->with('sidebarItems', AIRepository::make()->getSidebarItems());
        });
    }
}
