<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;    

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed the roles table
        $roles = [        ['name' => 'admin'],
        ['name' => 'user'],
    ];

    Role::insert($roles);

      
    
    }
}
