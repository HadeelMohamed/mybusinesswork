<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        config([
            'laravellocalization.supportedLocales' => [
                
                'en'  => array( 'name' => 'English', 'script' => 'Latn', 'native' => 'English' ),
                'ar'  => array( 'name' => 'Arabic', 'script' => 'Arab', 'native' => 'العربية' ),
                'fr'  => array( 'name' => 'French', 'script' => 'Latn', 'native' => 'Français' ),
                'tr'  => array( 'name' => 'Turky', 'script' => 'Latn', 'native' => 'Türkçe' ),
            ],

            'laravellocalization.useAcceptLanguageHeader' => false,

            'laravellocalization.hideDefaultLocaleInURL' => false
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
