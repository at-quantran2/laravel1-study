<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('cap', function ($str) {
            return Response::make(strtoupper($str));
        });
        Response::macro('max', function ($arr) {
            return Response::make(max($arr));
        });
        Response::macro('contact', function ($action) {
            $contact =
                '<form action="'. $action . '" method="post">
                    Name <input type="text"/><br>
                    Phone <input type="text"/><br>
                </form>';
            return $contact;
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
