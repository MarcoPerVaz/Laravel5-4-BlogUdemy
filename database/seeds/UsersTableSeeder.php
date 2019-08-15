<?php

use Illuminate\Database\Seeder;
// Importado
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        $viewPostsPermission = Permission::create(['name' => 'View posts']);
        $createPostsPermission = Permission::create(['name' => 'Create posts']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts']);

        // Usuario 1
        $admin = new User;
        $admin->name = 'Marco-admin';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->assignRole($adminRole);

        // Usuario 2
        $writer = new User;
        $writer->name = 'Antonio-writer';
        $writer->email = 'otrousuario@mail.com';
        $writer->password = bcrypt('123456');
        $writer->save();
        $writer->assignRole($writerRole);
    }
}
