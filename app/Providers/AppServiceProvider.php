<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Category;
use App\Models\Post;
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
        if (Schema::hasTable('settings') &&  Schema::hasTable('categories') && Schema::hasTable('posts')) {
            $settings = Setting::checkSettings();
            $categories = Category::all();
            $posts = Post::paginate(5);
            $about = About::checkAboutPage();
            view()->share([
                'settings' => $settings,
                'categories' => $categories,
                'posts' => $posts,
                'about' => $about
            ]);
        }
    }
}
