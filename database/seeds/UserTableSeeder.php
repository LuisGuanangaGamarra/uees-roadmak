<?php

use Illuminate\Database\Seeder;
use App\User;
//use App\Role;
use Caffeinated\Shinobi\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        // $role_user = Role::where('name', 'user')->first();
        // $role_admin = Role::where('name', 'admin')->first();

        // $user = new User();
        // $user->name = 'User';
        // $user->email = 'user@example.com';
        // $user->password = bcrypt('secret');
        // $user->save();
        // $user->roles()->attach($role_user);
        // //
        // $user = new User();
        // $user->name = 'Admin';
        // $user->email = 'admin@example.com';
        // $user->password = bcrypt('secret');
        // $user->save();
        // $user->roles()->attach($role_admin);

        factory(App\User::class, 5)->create();
/*
        $user = User::create([
            'name' => 'Pierre',
            'lastname' => 'Chavez', 
            'email' => 'pchavezp@uees.edu.ec', 
            'password' => bcrypt('AdminPierre'), 
            'file' => '/images/users/miavatar.png',
        ]);

        $role = Role::create([
            'name'      => 'SuperAdmin',
            'slug'      => 'superadmin',
            'special'   => 'all-access',
        ]);

       


        $user->roles()->attach($role);*/
    }
}
