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

        $viewUsersPermission = Permission::create(['name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users']);

        // Usuario 1
        $admin = new User;
        $admin->name = 'Marco Perdomo';
        $admin->email = 'admin@mail.com';
        $admin->password = '123456';
        $admin->save();
        $admin->assignRole($adminRole);

        // Usuario 2
        $writer = new User;
        $writer->name = 'Otro Usuario';
        $writer->email = 'otrousuario@mail.com';
        $writer->password = '123456';
        $writer->save();
        $writer->assignRole($writerRole);
    }
}
