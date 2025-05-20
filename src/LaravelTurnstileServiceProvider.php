<?php

namespace Neoistone\LaravelTurnstile;

use Illuminate\Support\Facades\Validator;
use Neoistone\LaravelTurnstile\Components\TurnstileWidget;
use Neoistone\LaravelTurnstile\Rules\TurnstileCheck;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelTurnstileServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot(); // 👈 This is essential for Spatie's loader to register views/config/etc

        Validator::extend('cf-valid', function ($attribute, $value, $parameters, $validator) {
            return (new TurnstileCheck)->passes($attribute, $value);
        }, __(config('turnstile.error_messages.turnstile_check_message', 'Turnstile validation failed.')));
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-turnstile')
            ->hasConfigFile()
            ->hasViews('turnstile') // 👈 This registers view namespace: turnstile::
            ->hasViewComponent('', TurnstileWidget::class);
    }
}
