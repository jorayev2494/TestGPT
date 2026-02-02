<?php

namespace App\Providers;

use App\Services\APIs\OpenAIApiService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app->singleton(OpenAIApiService::class, static fn (): OpenAIApiService => new OpenAIApiService(\OpenAI::client(config('open_ai.api_key'))));
    }
}
