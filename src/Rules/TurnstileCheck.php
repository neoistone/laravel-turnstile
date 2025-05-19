<?php

namespace Neoistone\LaravelTurnstile\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Neoistone\LaravelTurnstile\Facades\LaravelTurnstile;

class TurnstileCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = LaravelTurnstile::validate($value);

        if (! $response['success']) {
            $fail(__(config('turnstile.error_messages.turnstile_check_message')));
        }
    }
}
