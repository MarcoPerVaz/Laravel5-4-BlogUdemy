<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Importado
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Fue pasado del controlador hacía acá, para cambiar los nombres de los meses a español
            DB::statement("SET lc_time_names = 'es_ES'");
        // 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
