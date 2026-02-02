<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;

// Route::view('/{any?}', 'index')->where('any', '[\/\w\.-]*');
Route::get('/ai/assistants/{slug?}', [AIController::class, 'index'])
    // ->where('slug', '[0-9]+')
    ->name('assistant');

Route::post('/ai/assistants/{slug}', [AIController::class, 'send'])
    // ->where('slug', '[0-9]+')
    ->name('assistant.send');


