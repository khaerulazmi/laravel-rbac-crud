<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleLevelsTableSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel role_levels.
     */
    public function run(): void
    {
        DB::table('role_levels')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
