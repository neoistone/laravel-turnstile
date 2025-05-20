<?php

namespace Neoistone\LaravelTurnstile\Rules;

use Illuminate\Contracts\Validation\Rule;
use Neoistone\LaravelTurnstile\Facades\LaravelTurnstile;

class TurnstileCheck implements Rule
{
    public function passes($attribute, $value): bool
    {
        $response = LaravelTurnstile::validate($value);

        return $response['success'] ?? false;
    }

    public function message(): string
    {
        return __(config('turnstile.error_messages.turnstile_check_message'));
    }
}
