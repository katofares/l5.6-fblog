<?php

use App\Role;
use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        /**
         * All permissions types
         */

        // crud posts
        $crud_post = new Permission();
        $crud_post->name = 'crud-post';
        $crud_post->save();

        // crud category
        $crud_category = new Permission();
        $crud_category->name = 'crud-category';
        $crud_category->save();

        // crud user
        $crud_user = new Permission();
        $crud_user->name = 'crud-user';
        $crud_user->save();

        // update others post
        $update_others_post = new Permission();
        $update_others_post->name = 'update-others-post';
        $update_others_post->save();

        // delete others post
        $delete_others_post = new Permission();
        $delete_others_post->name = 'delete-others-post';
        $delete_others_post->save();

        // update others post
        $update_others_category = new Permission();
        $update_others_category->name = 'update-others-category';
        $update_others_category->save();

        // delete others post
        $delete_others_category = new Permission();
        $delete_others_category->name = 'delete-others-category';
        $delete_others_category->save();

        /**
         * get roles
         */
        $admin = Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        /**
         * attach permissions to role
         */
        // Admin role permissions
        $admin->detachPermissions([
           $crud_post,
           $crud_category,
           $crud_user,
           $update_others_post,
           $delete_others_post,
           $update_others_category,
           $delete_others_category
        ]);
        $admin->attachPermissions([
            $crud_post,
            $crud_category,
            $crud_user,
            $update_others_post,
            $delete_others_post,
            $update_others_category,
            $delete_others_category
        ]);

        // Editor role permissions
        $editor->detachPermissions([
            $crud_post,
            $crud_category,
            $update_others_post,
            $delete_others_post,
        ]);
        $editor->attachPermissions([
            $crud_post,
            $crud_category,
            $update_others_post,
            $delete_others_post,
        ]);

        // Author role permissions
        $author->detachPermissions([
            $crud_post,
        ]);
        $author->attachPermissions([
            $crud_post,
        ]);
    }
}
