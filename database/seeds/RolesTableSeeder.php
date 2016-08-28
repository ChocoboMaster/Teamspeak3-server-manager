<?php

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
        $admin = new App\Role();
        $admin->name = "admin";
        $admin->display_name = "Administrator";
        $admin->description = "Administrator";
        $admin->save();

        $user = new App\Role();
        $user->name = "user";
        $user->display_name = "Standard User";
        $user->description = "Standard User";
        $user->save();
    }
}
