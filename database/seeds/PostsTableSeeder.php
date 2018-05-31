<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Get faker lib
        $faker = Factory::create();

        // Truncate posts table and start fresh
        DB::table('posts')->truncate();

        // Generate 10 dummy posts
        $posts = [];

        for($i = 1; $i <=10; $i++){
            // dummy images for posts
            $image = 'Post_Image_'. rand(1, 5). ".jpg";

            $posts[] = [
              'user_id' => rand(1, 3),
              'title' =>  $faker->sentence(rand(8, 12)),
              'slug' => $faker->slug(),
              'excerpt' =>$faker->text(rand(200, 300)) ,
              'body' => $faker->paragraphs(rand(7,12), true),
              'image' => rand(0, 1) == 1 ? $image : null,
              'created_at' =>$faker->dateTimeBetween('-6 days', '+1 days') ,
              'updated_at' =>$faker->dateTimeBetween('-4 days', '-2 day') ,
            ];
        }

        DB::table('posts')->insert($posts);


    }
}
