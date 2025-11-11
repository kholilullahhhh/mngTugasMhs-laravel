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

        $users = [
            [
                'name' => 'Hj. Rosdiana, S.Pd.I',
                'username' => 'rosdiana',
                'nip' => '232323',
                'role' => 'user', // penyuluh
            ],
            [
                'name' => 'Kamisari, S.Ag',
                'username' => 'kamisari',
                'nip' => '232323',
                'role' => 'user',
            ],
            [
                'name' => 'Herniati, S.Shi',
                'username' => 'herniati',
                'nip' => '232323',
                'role' => 'user',
            ],
            [
                'name' => 'Ilham, S.Ag',
                'username' => 'ilham',
                'nip' => '232323',
                'role' => 'user',
            ],
            [
                'name' => 'Sukarniati, S.Kom',
                'username' => 'sukarniati',
                'nip' => '232323',
                'role' => 'user',
            ],
            [
                'name' => 'Makmur, S.Ag',
                'username' => 'makmur',
                'nip' => '232323',
                'role' => 'user',
            ],
            [
                'name' => 'Dra. Hj. Rustiani Mahomoto',
                'username' => 'rustiani',
                'nip' => '232323',
                'role' => 'user',
            ],
            [
                'name' => 'Ismiyanti Rahman, S.H.I',
                'username' => 'ismiyanti',
                'nip' => '232323',
                'role' => 'user',
            ],
            [
                'name' => 'Abd. Salam, S.Ag',
                'username' => 'abdsalam',
                'nip' => '232323',
                'role' => 'user',
            ],
            [
                'name' => 'Marlina, S.Pd.I',
                'username' => 'marlina',
                'nip' => '232323',
                'role' => 'user',
            ],
        ];

        // seed data users (penyuluh & penghulu dari tabel)
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'nip' => $user['nip'],
                'password' => bcrypt('123456'), // password default
                'role' => $user['role'],
            ]);
        }
        foreach ($users as $user) {
            Admin::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'nip' => $user['nip'],
                'password' => bcrypt('123456'), // password default
                'role' => $user['role'],
            ]);
        }

        // seed akun default (admin, kepala, dll)
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
