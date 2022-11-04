<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;


class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // seed the comments table
        $c = new Comment();
        $c -> body = 'This is the first comment';
        $c -> user_id = 1;
        $c -> posts_id = 1;
        $c -> parent_id = null;
        $c -> save();

        // make a 10 comments
        Comment::factory()->count(10)->create();    


    }
}
