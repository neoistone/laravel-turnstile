<?php

namespace Neoistone\LaravelTurnstile\Exceptions;

use Exception;

class SecretKeyNotFoundException extends Exception
{
    protected int $status = 500;
}
