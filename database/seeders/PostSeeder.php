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
        //
        DB::table('posts')->insert([
            'title' => 'blog 1',
            'body' => fake()->text(),
        ]);
        DB::table('posts')->insert([
            'title' => 'blog 2',
            'body' => fake()->text(),
        ]);
        DB::table('posts')->insert([
            'title' => 'blog 3',
            'body' => fake()->text(),
        ]);
        DB::table('posts')->insert([
            'title' => 'blog 4',
            'body' => fake()->text(),
        ]);

    }
}
