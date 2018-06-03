<?php
/**
 * Created by PhpStorm.
 * User: fares
 * Date: 03.06.18
 * Time: 23:29
 */

namespace App\Views\Composers;

use App\Category;
use App\Post;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view)
    {
        $this->composeCategories($view);
        $this->composePopularPosts($view);
    }


    private function composeCategories($view){
        /**
         * Filter categories posts
         */
        $categories = Category::with(['posts' => function($query){
            $query->published();
        }])->get();
         $view->with('categories', $categories);
    }

    private function composePopularPosts($view){
        /**
         * Filter popular posts
         */
        $popular_posts = Post::published()->popular()->take(3)->get();

         $view->with('popular_posts', $popular_posts);
    }

}