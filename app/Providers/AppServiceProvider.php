<?php

namespace App\Providers;

use App\Models\Topik;
use Illuminate\Support\Facades\View;
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
         $specificViews = ['layouts.aside-siswa','layouts.aside.guru'];
        View::composer($specificViews, function ($view) {
            $topics = Topik::all();
            $view->with('topics', $topics);
        });
    }
}
