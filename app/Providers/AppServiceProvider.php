<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Property_app;
use Illuminate\Support\Facades\View;

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

    //Profile Settings
    public function boot(): void
    {
        $property_app = Property_app::first();
        View::share('property_app', $property_app);
    }
}
