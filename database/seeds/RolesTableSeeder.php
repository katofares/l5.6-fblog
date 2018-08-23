<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        // Admin user role
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin';
        $admin->save();

        // Editor user role
        $editor = new Role();
        $editor->name = 'editor';
        $editor->display_name = 'Editor';
        $editor->save();

        // Author user role
        $author = new Role();
        $author->name = 'author';
        $author->display_name = 'Author';
        $author->save();

        // Attach roles to users
        // First user admin
        $user1 = User::findOrFail(1);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        // Second user editor
        $user2 = User::findOrFail(2);
        $user2->detachRole($editor);
        $user2->attachRole($editor);

        // Third user author
        $user3 = User::findOrFail(3);
        $user3->detachRole($author);
        $user3->attachRole($author);

    }
}
