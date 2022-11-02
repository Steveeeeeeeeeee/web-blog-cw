<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        // create a user that is an admin
        $a = new User();
        $a -> name = 'admin';    
        $a -> email = 'admin@example.com';
        $a -> password = bcrypt('password');
        $a -> save();

        User::factory()->count(10)->create();    
    
    }
}
