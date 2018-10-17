<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        /*if ($this->app->environnent() === 'local') {
            DB::listen(function (QueryExecuted $query){
                file_put_contents('php://stdout',"\e[34m{$query->sql}\t\e[37m",json_encode($query->bindings) . "\t\e[32m{$query->time}ms\e[0m\n");
            });
        }*/
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
