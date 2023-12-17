<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Si inietta all interno di tutta l'applicazione un oggetto Gateway(classe di braintree contenente le chiavi per la creazione di un token) attraverso un pattern singleton

        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'mtzf6rx8gksx2k3v',
                    'publicKey' =>  "gbkd3mbpwhp65tp9",
                    'privateKey' => "1f572d2f9210c941ba7d9875e960b627"
                ]
            );
        });
    }
}
