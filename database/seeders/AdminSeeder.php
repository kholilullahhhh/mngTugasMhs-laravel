<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $akun = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'Dosen',
                'username' => 'dosen',
                'password' => bcrypt('dosen'),
                'role' => 'dosen',
            ],
            [
                'name' => 'Mahasiswa',
                'username' => 'mahasiswa',
                'password' => bcrypt('mahasiswa'),
                'role' => 'user',
            ],
        ];

        // ============================
        //  DAFTAR MAHASISWA (DIUBAH)
        // ============================
        $users = [
            [
                'name' => 'Muhammad Rizki Pratama',
                'username' => 'rizki',
                'nip' => '240001',
                'role' => 'user',
            ],
            [
                'name' => 'Aulia Ramadhani',
                'username' => 'aulia',
                'nip' => '240002',
                'role' => 'user',
            ],
            [
                'name' => 'Fajar Saputra',
                'username' => 'fajar',
                'nip' => '240003',
                'role' => 'user',
            ],
            [
                'name' => 'Siti Nurbaya',
                'username' => 'sitinurbaya',
                'nip' => '240004',
                'role' => 'user',
            ],
            [
                'name' => 'Ahmad Fauzan',
                'username' => 'fauzan',
                'nip' => '240005',
                'role' => 'user',
            ],
            [
                'name' => 'Rina Amelia',
                'username' => 'rina',
                'nip' => '240006',
                'role' => 'user',
            ],
            [
                'name' => 'Dwi Kurniawan',
                'username' => 'dwi',
                'nip' => '240007',
                'role' => 'user',
            ],
            [
                'name' => 'Lilis Handayani',
                'username' => 'lilis',
                'nip' => '240008',
                'role' => 'user',
            ],
            [
                'name' => 'Bagas Putra Wijaya',
                'username' => 'bagas',
                'nip' => '240009',
                'role' => 'user',
            ],
            [
                'name' => 'Nadia Khairunnisa',
                'username' => 'nadia',
                'nip' => '240010',
                'role' => 'user',
            ],
        ];

        // Insert ke tabel users
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'nip' => $user['nip'],
                'password' => bcrypt('123456'),
                'role' => $user['role'],
            ]);
        }

        // Insert ke tabel admin
        foreach ($users as $user) {
            Admin::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'nip' => $user['nip'],
                'password' => bcrypt('123456'),
                'role' => $user['role'],
            ]);
        }

        // Akun default
        foreach ($akun as $v) {
            Admin::create([
                'name' => $v['name'],
                'username' => $v['username'],
                'password' => $v['password'],
                'role' => $v['role'],
            ]);

            User::create([
                'name' => $v['name'],
                'username' => $v['username'],
                'password' => $v['password'],
                'role' => $v['role'],
            ]);
        }
    }
}
