<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;

Route::get('/ai/assistants/{slug?}', [AIController::class, 'index'])
    ->where('slug', '[a-z]+')
    ->name('assistant');

Route::post('/ai/assistants/{slug}', [AIController::class, 'send'])
    ->where('slug', '[a-z]+')
    ->name('assistant.send');


