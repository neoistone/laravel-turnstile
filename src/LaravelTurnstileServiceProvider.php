<?php

namespace Neoistone\LaravelTurnstile;

use Neoistone\LaravelTurnstile\Components\TurnstileWidget;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelTurnstileServiceProvider extends PackageServiceProvider
{
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
