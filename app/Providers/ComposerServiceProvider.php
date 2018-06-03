<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
          'partials._sideBar', function ($view){
            /**
             * Filter categories posts
             */
            $categories = Category::with(['posts' => function($query){
                $query->published();
            }])->get();
            return $view->with('categories', $categories);
        });

        view()->composer(
            'partials._sideBar', function ($view){
            /**
             * Filter popular posts
             */
            $popular_posts = Post::published()->popular()->take(3)->get();

            return $view->with('popular_posts', $popular_posts);
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
