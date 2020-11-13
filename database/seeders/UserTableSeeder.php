<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_company = Role::where('name', 'User')->first();        
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->first_name = 'company';
        $user->last_name = 'company';
        $user->email = 'company@company.com';
        $user->password = bcrypt('company');
        $user->save();
        $user->roles()->attach($role_company);

        $admin = new User();
        $admin->first_name = 'Alex';
        $admin->last_name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
