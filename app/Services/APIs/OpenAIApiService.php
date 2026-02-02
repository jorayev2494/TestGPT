<?php

declare(strict_types=1);

namespace App\Services\APIs;

use OpenAI\Client;

readonly class OpenAIApiService
{
    public function __construct(
        private Client $apiManager
    ) {}

    public function send(string $input, string $instructions, string $model = 'gpt-5.2'): array
    {
        $response = $this->apiManager->responses()->create(
            compact('model', 'instructions', 'input')
        );

        return ['answer' => $response->outputText];
    }
}
