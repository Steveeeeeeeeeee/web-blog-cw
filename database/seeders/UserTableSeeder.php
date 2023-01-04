<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user that is an admin
        $a = new User();
        $a -> name = 'admin';    
        $a -> email = 'admin@example.com';
        $a -> password = bcrypt('password');
        $a -> save();

        $b = new User();    
        $b -> name = 'user';    
        $b -> email = 'user@example.com';
        $b -> password = bcrypt('password');
        $b -> save();

        User::factory()->count(10)->create();    
    
        // $role = App\Models\Role::where('name', 'admin')->first();
        // $a->roles()->sync($role);


    }
}
