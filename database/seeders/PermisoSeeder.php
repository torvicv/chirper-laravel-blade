<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('permisos')->insert([
            'pizarra' => 'users',
            'ver' => 1,
            'editar' => 1,
            'borrar' => 1,
            'user_id' => 1
        ]);
        DB::table('permisos')->insert([
            'pizarra' => 'posts',
            'ver' => 1,
            'editar' => 1,
            'borrar' => 1,
            'user_id' => 1
        ]);
        DB::table('permisos')->insert([
            'pizarra' => 'members',
            'ver' => 1,
            'editar' => 1,
            'borrar' => 1,
            'user_id' => 1
        ]);
        DB::table('permisos')->insert([
            'pizarra' => 'users',
            'ver' => 0,
            'editar' => 0,
            'borrar' => 0,
            'user_id' => 2
        ]);
        DB::table('permisos')->insert([
            'pizarra' => 'posts',
            'ver' => 0,
            'editar' => 0,
            'borrar' => 0,
            'user_id' => 2
        ]);
        DB::table('permisos')->insert([
            'pizarra' => 'members',
            'ver' => 0,
            'editar' => 0,
            'borrar' => 0,
            'user_id' => 2
        ]);

    }
}
