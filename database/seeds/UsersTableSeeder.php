<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable  foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // truncate users table and start fresh
        DB::table('users')->truncate();
        // Insert three users
        DB::table('users')->insert([
            [
                'name' => 'Jhon Doe',
                'email' => 'jhondoe@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Fares Kato',
                'email' => 'fareskato@gmail.com',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}
