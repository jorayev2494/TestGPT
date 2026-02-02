<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\AIService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AIController extends Controller
{
    public function __construct(
        private readonly AIService $service
    ) {}

    public function index(): Response
    {
        return response()->view('modules.ai.pages.index');
    }

    public function send(Request $request, string $slug): Response
    {
        return response()->view('modules.ai.pages.index', $this->service->send($request->get('text'), $slug));
    }
}
