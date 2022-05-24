<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('settings') &&  Schema::hasTable('categories')) {
            $settings = Setting::checkSettings();
            $categories = Category::all();
            view()->share([
                'settings' => $settings,
                'categories' => $categories
            ]);
        }
    }
}
