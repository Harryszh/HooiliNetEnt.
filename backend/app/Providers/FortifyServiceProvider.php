<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Actions\CreateNewUser;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Hier kannst du später Bindings oder Services registrieren
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Registrierung via Fortify an eigene Action-Klasse delegieren
        Fortify::createUsersUsing(CreateNewUser::class);

        // Optional: eigene Blade-View für /register anzeigen (nur wenn du Laravel-UI nutzt)
        Fortify::registerView(function () {
            return view('auth.register');
        });
    }
}
