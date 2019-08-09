<?php

use Illuminate\Database\Seeder;
// Importado
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = 'Marco';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('123456');
        $user->save();
    }
}
