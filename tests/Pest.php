<?php

use Illuminate\Support\Facades\Route;
use Neoistone\LaravelTurnstile\Tests\Fixtures\Http\Controllers\TurnstileController;
use Neoistone\LaravelTurnstile\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

function setTurnstileRoutes(bool $get = false)
{
    if ($get) {
        Route::get('/turnstile', [TurnstileController::class, 'index']);
    }
}
