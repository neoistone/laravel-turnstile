<?php

use Neoistone\LaravelTurnstile\Tests\Fixtures\Http\Controllers\TurnstileController;
use Neoistone\LaravelTurnstile\Tests\TestCase;
use Illuminate\Support\Facades\Route;

uses(TestCase::class)->in(__DIR__);

function setTurnstileRoutes(bool $get = false)
{
    if ($get) {
        Route::get('/turnstile', [TurnstileController::class, 'index']);
    }
}
