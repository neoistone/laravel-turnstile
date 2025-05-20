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
        Validator::extend('cf-valid', function ($attribute, $value, $parameters, $validator) {
            return (new TurnstileCheck)->passes($attribute, $value);
        }, __(config('turnstile.error_messages.turnstile_check_message', 'Turnstile validation failed.')));
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-turnstile')
            ->hasConfigFile()
            ->hasViews('turnstile')
            ->hasViewComponent('', TurnstileWidget::class);
    }
}
