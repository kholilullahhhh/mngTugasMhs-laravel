<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $agendas = [
            // User 1
            [
                'user_id' => 1,
                'judul' => 'Project Landing Page HTML & CSS',
                'tempat_kegiatan' => 'Lab Web 1',
                'tgl_kegiatan' => '2025-08-20',
                'jam_mulai' => '08:00:00',
                'deskripsi_kegiatan' => 'Membuat landing page responsif menggunakan HTML, CSS, dan sedikit JavaScript.',
                'status' => 'publish',
            ],
            [
                'user_id' => 1,
                'judul' => 'Presentasi Desain UI/UX Aplikasi Mobile',
                'tempat_kegiatan' => 'Ruang Presentasi 204',
                'tgl_kegiatan' => '2025-08-21',
                'jam_mulai' => '09:00:00',
                'deskripsi_kegiatan' => 'Presentasi hasil perancangan UI/UX menggunakan Figma untuk aplikasi mobile.',
                'status' => 'publish',
            ],
            [
                'user_id' => 1,
                'judul' => 'Tugas Mini Project Basis Data',
                'tempat_kegiatan' => 'Lab Database',
                'tgl_kegiatan' => '2025-08-22',
                'jam_mulai' => '10:00:00',
                'deskripsi_kegiatan' => 'Membuat ERD dan implementasi database MySQL untuk sistem toko online.',
                'status' => 'publish',
            ],

            // User 2
            [
                'user_id' => 2,
                'judul' => 'Belajar Routing Laravel & Controller',
                'tempat_kegiatan' => 'Lab Framework',
                'tgl_kegiatan' => '2025-08-23',
                'jam_mulai' => '08:30:00',
                'deskripsi_kegiatan' => 'Mengerjakan modul dasar Laravel berupa routing, controller, dan blade template.',
                'status' => 'publish',
            ],
            [
                'user_id' => 2,
                'judul' => 'Tugas Analisis Sistem Informasi',
                'tempat_kegiatan' => 'Ruang 305',
                'tgl_kegiatan' => '2025-08-24',
                'jam_mulai' => '15:00:00',
                'deskripsi_kegiatan' => 'Menganalisis kebutuhan sistem untuk aplikasi absensi kampus.',
                'status' => 'publish',
            ],

            // User 3
            [
                'user_id' => 3,
                'judul' => 'Laporan Praktikum Jaringan Komputer',
                'tempat_kegiatan' => 'Lab Jaringan',
                'tgl_kegiatan' => '2025-08-25',
                'jam_mulai' => '09:00:00',
                'deskripsi_kegiatan' => 'Konfigurasi dasar router dan switch menggunakan Cisco Packet Tracer.',
                'status' => 'publish',
            ],

            // User 4
            [
                'user_id' => 4,
                'judul' => 'Analisis Keamanan Web (Cyber Security)',
                'tempat_kegiatan' => 'Lab Keamanan',
                'tgl_kegiatan' => '2025-08-26',
                'jam_mulai' => '09:00:00',
                'deskripsi_kegiatan' => 'Menganalisis celah keamanan dasar seperti XSS dan SQL Injection.',
                'status' => 'publish',
            ],
            [
                'user_id' => 4,
                'judul' => 'Praktikum Pemrograman Berorientasi Objek',
                'tempat_kegiatan' => 'Lab PBO',
                'tgl_kegiatan' => '2025-08-27',
                'jam_mulai' => '14:00:00',
                'deskripsi_kegiatan' => 'Membuat class, inheritance, dan interface menggunakan Java.',
                'status' => 'publish',
            ],

            // User 5
            [
                'user_id' => 5,
                'judul' => 'Tugas CRUD Laravel Dasar',
                'tempat_kegiatan' => 'Ruang 108',
                'tgl_kegiatan' => '2025-08-28',
                'jam_mulai' => '08:30:00',
                'deskripsi_kegiatan' => 'Membuat fitur CRUD sederhana untuk data mahasiswa menggunakan Laravel.',
                'status' => 'publish',
            ],
            [
                'user_id' => 5,
                'judul' => 'Tugas Struktur Data Linked List',
                'tempat_kegiatan' => 'Lab Struktur Data',
                'tgl_kegiatan' => '2025-08-29',
                'jam_mulai' => '14:30:00',
                'deskripsi_kegiatan' => 'Implementasi single linked list dan double linked list menggunakan C++.',
                'status' => 'publish',
            ],

            // User 6
            [
                'user_id' => 6,
                'judul' => 'Makalah Sistem Operasi',
                'tempat_kegiatan' => 'Ruang 301',
                'tgl_kegiatan' => '2025-08-30',
                'jam_mulai' => '09:00:00',
                'deskripsi_kegiatan' => 'Membahas perbandingan arsitektur Linux, Windows, dan MacOS.',
                'status' => 'publish',
            ],
            [
                'user_id' => 6,
                'judul' => 'Praktikum Mobile Programming',
                'tempat_kegiatan' => 'Lab Android',
                'tgl_kegiatan' => '2025-08-31',
                'jam_mulai' => '13:30:00',
                'deskripsi_kegiatan' => 'Membuat aplikasi catatan sederhana menggunakan Android Studio.',
                'status' => 'publish',
            ],
            [
                'user_id' => 6,
                'judul' => 'Tugas Mini Project Machine Learning',
                'tempat_kegiatan' => 'Lab AI',
                'tgl_kegiatan' => '2025-09-01',
                'jam_mulai' => '15:30:00',
                'deskripsi_kegiatan' => 'Implementasi algoritma K-Means untuk klasterisasi data sederhana.',
                'status' => 'publish',
            ],

            // User 7
            [
                'user_id' => 7,
                'judul' => 'Review Buku Pemrograman Python',
                'tempat_kegiatan' => 'Perpustakaan Daerah',
                'tgl_kegiatan' => '2025-09-02',
                'jam_mulai' => '09:00:00',
                'deskripsi_kegiatan' => 'Review dan rangkuman materi dasar Python dari buku referensi.',
                'status' => 'publish',
            ],

            // User 8
            [
                'user_id' => 8,
                'judul' => 'Tugas Rangkuman Materi AI Dasar',
                'tempat_kegiatan' => 'Lab AI',
                'tgl_kegiatan' => '2025-09-03',
                'jam_mulai' => '09:00:00',
                'deskripsi_kegiatan' => 'Meringkas konsep dasar AI dan machine learning.',
                'status' => 'publish',
            ],

            // User 9
            [
                'user_id' => 9,
                'judul' => 'Observasi Proyek Internet of Things',
                'tempat_kegiatan' => 'Workshop IoT',
                'tgl_kegiatan' => '2025-09-04',
                'jam_mulai' => '10:00:00',
                'deskripsi_kegiatan' => 'Mengamati cara kerja sensor dan aktuator dalam proyek IoT.',
                'status' => 'publish',
            ],

            // User 10
            [
                'user_id' => 10,
                'judul' => 'Presentasi Cloud Computing',
                'tempat_kegiatan' => 'Aula Kampus',
                'tgl_kegiatan' => '2025-09-05',
                'jam_mulai' => '09:00:00',
                'deskripsi_kegiatan' => 'Presentasi materi tentang arsitektur dan manfaat cloud computing.',
                'status' => 'publish',
            ],
            [
                'user_id' => 10,
                'judul' => 'Praktikum DevOps Dasar',
                'tempat_kegiatan' => 'Lab DevOps',
                'tgl_kegiatan' => '2025-09-06',
                'jam_mulai' => '14:00:00',
                'deskripsi_kegiatan' => 'Mempelajari dasar Git, CI/CD, dan Docker untuk pemula.',
                'status' => 'publish',
            ],
        ];

        Agenda::insert($agendas);
    }
}
