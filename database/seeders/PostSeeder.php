<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("posts")->insert([
            [
                'title' => 'Post Title 1',
                'description' => 'Description Post 1 is empty for now..',
            ],
            [
                'title' => 'Post Title 2',
                'description' => 'Description Post 2 is empty for now..',
            ]
        ]);
    }
}
