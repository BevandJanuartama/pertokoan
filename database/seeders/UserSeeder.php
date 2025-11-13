<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel users.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'user',
                'password' => Hash::make('uer'), 
                'level' => 'user',
                'nama_lengkap' => 'user user',
                'telepon' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'username' => 'admin',
                'password' => Hash::make('admin'), 
                'level' => 'admin',
                'nama_lengkap' => 'Admin admin',
                'telepon' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);
    }
}
