<?php

namespace Neoistone\LaravelTurnstile;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Neoistone\LaravelTurnstile\Exceptions\SecretKeyNotFoundException;
use Neoistone\LaravelTurnstile\Exceptions\UnkownErrorOccuredException;

class LaravelTurnstile
{
    protected ?string $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    public function validate(?string $cfResponse = null): array
    {
        $turnstileResponse = $cfResponse ?? request()->get('cf-turnstile-response');

        if (! $secret = config('turnstile.turnstile_secret_key')) {
            throw new SecretKeyNotFoundException('Turnstile secret key is not defined.');
        }

        try {
            $request = Http::asJson()
                ->timeout(30);

            // Add connectTimeout only if method exists (Laravel 9+)
            if (method_exists($request, 'connectTimeout')) {
                $request = $request->connectTimeout(10);
            }

            $response = $request->post($this->getUrl(), [
                'secret' => $secret,
                'response' => $turnstileResponse,
            ]);

            return $response->json() ?: [
                'success' => false,
                'message' => 'Unknown error occurred, please try again.',
            ];
        } catch (RequestException $e) {
            throw new UnkownErrorOccuredException(
                'A network or validation error occurred while contacting Turnstile.'
            );
        }
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
