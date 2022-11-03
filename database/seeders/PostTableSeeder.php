<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Posts;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed the posts table
        $p = new Posts();
        $p -> title = 'First Post';
        $p -> body = 'This is the first post';  
        $p -> user_id = 1;
        $p -> save();

        // make a 10 posts
        Posts::factory()->count(10)->create();

    }
}
