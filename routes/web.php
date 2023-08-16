<?php

$panel = filament()->getCurrentPanel();

Route::middleware($panel->getMiddleware())
    ->name('socialite.')
    ->group(function () {
        Route::get('/oauth/{provider}', [
            \DutchCodingCompany\FilamentSocialite\Http\Controllers\SocialiteLoginController::class,
            'redirectToProvider',
        ])
            ->name('oauth.redirect');

        Route::get('/oauth/callback/{provider}', [
            \DutchCodingCompany\FilamentSocialite\Http\Controllers\SocialiteLoginController::class,
            'processCallback',
        ])
            ->name('oauth.callback');
    });
