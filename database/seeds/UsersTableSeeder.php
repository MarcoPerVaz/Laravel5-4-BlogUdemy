<?php

use Illuminate\Database\Seeder;
// Importado
use App\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        // Usuario 1
        $admin = new User;
        $admin->name = 'Marco';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->assignRole($adminRole);

        // Usuario 2
        $writer = new User;
        $writer->name = 'Antonio';
        $writer->email = 'otrousuario@mail.com';
        $writer->password = bcrypt('123456');
        $writer->save();
        $admin->assignRole($writerRole);
    }
}
