<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AfterConsultoriaSubConsultoria_providers extends ServiceProvider
{
   
    protected $listen = [
        \App\Events\AfterConsultoriaSubConsultoria::class => [
            \App\Listeners\AfterConsultoriaSubConsultoria::class,
        ],
    ];

    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
