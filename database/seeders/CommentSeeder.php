<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("comments")->insert([
            [
                'comment' => 'Good post!',
                'user_id' => 1
            ],
            [
                'comment' => 'Good post!',
                'user_id' => 1
            ],
            [
                'comment' => 'Good post!',
                'user_id' => 2
            ]
        ]);
    }
}
