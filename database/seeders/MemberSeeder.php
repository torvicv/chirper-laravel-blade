<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('members')->insert([
            'name' => fake()->name(),
            'position' => 'front end',
            'description' => fake()->text(),
        ]);
        DB::table('members')->insert([
            'name' => fake()->name(),
            'position' => 'back end',
            'description' => fake()->text(),
        ]);
        DB::table('members')->insert([
            'name' => fake()->name(),
            'position' => 'desarrollador',
            'description' => fake()->text(),
        ]);
        DB::table('members')->insert([
            'name' => fake()->name(),
            'position' => 'front end',
            'description' => fake()->text(),
        ]);
    }
}
