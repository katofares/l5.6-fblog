<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('categories')->truncate();

        Db::table('categories')->insert([
            [
                'name' => 'Uncategorized',
                'slug' => 'uncategorized',
            ],
            [
                'name' => 'Web programming',
                'slug' => 'web-programming',
            ],
            [
                'name' => 'Web design',
                'slug' => 'web-design',
            ],
            [
                'name' => 'Desktop design',
                'slug' => 'desktop-design',
            ],
            [
                'name' => 'Desktop programming',
                'slug' => 'desktop-programming',
            ],
            [
                'name' => 'SEO',
                'slug' => 'seo',
            ],
        ]);

    }
}
