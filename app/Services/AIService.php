<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AIRepository;
use App\Services\APIs\OpenAIApiService;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

readonly class AIService
{
    public function __construct(
        private AIRepository $repository,
        private OpenAIApiService $openAIApiService
    ) {}

    public function send(string $text, string $slug): array
    {
        $foundAssistant = $this->repository->findAssistant($slug);

        $foundAssistant ?? throw new BadRequestException('Assistant not found');

        $result = $this->openAIApiService->send($text, $foundAssistant['instructions']);

        return [
            'messages' => [
                [
                    'from' => 'user',
                    'text' => $text,
                ],
                [
                    'from' => 'ai',
                    'text' => $result['answer'],
                ],
            ],
        ];
    }
}
