<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'A regular user';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Admin';
        $role_user->description = 'A user with extra privilages';
        $role_user->save();
    }
}
