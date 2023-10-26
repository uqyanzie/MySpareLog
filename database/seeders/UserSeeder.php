<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder data untuk 5 pengguna
        $users = [
            [
                'role' => 'admin',
                'name' => 'Admin',
                'username' => 'mysparelogadmin',
                'email' => 'admin@mail.com',
                'phone' => '621234567890',
                'divisi' => null,
                'cabang' => null,
                'password' => Hash::make('admin123'),
                'status' => 'aktif',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'name' => 'John Doe',
                'username' => 'johndoe',
                'email' => 'johndoe@example.com',
                'phone' => '621234567891',
                'password' => Hash::make('password1'),
                'divisi' => 'Divisi 1',
                'cabang' => 'Cabang A',
                'status' => 'aktif',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'name' => 'Jane Smith',
                'username' => 'janesmith',
                'email' => 'janesmith@example.com',
                'phone' => '621234567892',
                'password' => Hash::make('password2'),
                'divisi' => 'Divisi 2',
                'cabang' => 'Cabang B',
                'status' => 'aktif',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'name' => 'Bob Johnson',
                'username' => 'bobjohnson',
                'email' => 'bobjohnson@example.com',
                'phone' => '621234567893',
                'password' => Hash::make('password3'),
                'divisi' => 'Divisi 1',
                'cabang' => 'Cabang A',
                'status' => 'aktif',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'name' => 'Emily Wilson',
                'username' => 'emilywilson',
                'email' => 'emilywilson@example.com',
                'phone' => '621234567894',
                'password' => Hash::make('password4'),
                'divisi' => 'Divisi 2',
                'cabang' => 'Cabang B',
                'status' => 'aktif',
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'role' => 'user',
                'name' => 'David Lee',
                'username' => 'davidlee',
                'email' => 'davidlee@example.com',
                'phone' => '621234567895',
                'password' => Hash::make('password5'),
                'divisi' => 'Divisi 1',
                'cabang' => 'Cabang A',
                'status' => 'aktif',
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ];

        // Insert data ke dalam tabel users
        DB::table('users')->insert($users);
    }
}
    