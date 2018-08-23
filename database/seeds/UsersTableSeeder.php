<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker init
        $faker = Factory::create();

        // Disable  foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // truncate users table and start fresh
        DB::table('users')->truncate();
        // Insert three users
        DB::table('users')->insert([
            [
                'name' => 'Fares Kato',
                'email' => 'fareskato@gmail.com',
                'password' => bcrypt('password'),
                'bio' => $faker->text(rand(200, 300)),
            ],
            [
                'name' => 'Jhon Doe',
                'email' => 'jhondoe@gmail.com',
                'password' => bcrypt('password'),
                'bio' => $faker->text(rand(200, 300)),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@gmail.com',
                'password' => bcrypt('password'),
                'bio' => $faker->text(rand(200, 300)),
            ],

        ]);
    }
}
