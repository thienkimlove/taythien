<?php

namespace App\Providers;


use Cache;
use DB;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{

    protected function getSettings()
    {
        if (env('CACHE_ENABLE')) {
            return Cache::remember('settings', config('constants.FRONTEND_CACHE_TIME'), function()  {
                return DB::table('settings')->lists('value', 'key_value');
            });
        } else {
            return DB::table('settings')->lists('value', 'key_value');
        }
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function ($view) {
            $view->with('settings',  $this->getSettings());
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
