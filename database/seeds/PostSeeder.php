<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // adding seeding data to the post table for testing purposes
        DB::table('posts')->insert([
            ['user_id' => 1, 'title' => "Post One", 'sub_title' => "Sub title of post one", 'content' => "This is first post."],
            ['user_id' => 1, 'title' => "Post Two", 'sub_title' => "Sub title of post two",'content' => "This is second post."],
            ['user_id' => 1, 'title' => "Post Third", 'sub_title' => "Sub title of post three",'content' => "This is third post."],
        ]);
    }
}
