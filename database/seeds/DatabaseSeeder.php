<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProfessionalCategoryTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        // factory(App\BlogCategory::class, 2)->create();
        // factory(App\User::class, 10)->create();
        // factory(App\BlogPost::class, 10)->create();
    }
}
