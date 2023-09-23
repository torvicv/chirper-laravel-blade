<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('members')->insert([
            'name' => fake()->name(),
            'position' => 'back end',
            'description' => fake()->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('members')->insert([
            'name' => fake()->name(),
            'position' => 'desarrollador',
            'description' => fake()->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('members')->insert([
            'name' => fake()->name(),
            'position' => 'front end',
            'description' => fake()->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
