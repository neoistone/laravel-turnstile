<?php

namespace Neoistone\LaravelTurnstile\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Neoistone\LaravelTurnstile\LaravelTurnstile
 */
class LaravelTurnstile extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Neoistone\LaravelTurnstile\LaravelTurnstile::class;
    }
}
