<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\JadwalMK;
use App\Models\PeranUser;
use App\Models\MataKuliah;
use App\Models\PeranAdmin;
use App\Models\PinjamRuang;
use App\Models\JenisKendala;
use App\Models\LaporKendala;
use App\Models\BentukKendala;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (env('APP_ENV') === 'production') {
            exit('I just stopped you getting fired. Love, Laravel');
        }

        PeranUser::insert([
            [
                'id_peran' => 1,
                'nama_peran' => 'Dosen',
                'deskripsi_peran' => 'Dosen Mata Kuliah Prioritas 1',
            ],
            [
                'id_peran' => 2,
                'nama_peran' => 'Mahasiswa',
                'deskripsi_peran' => 'Mahasiswa Mata Kuliah Prioritas 2',
            ],
            [
                'id_peran' => 3,
                'nama_peran' => 'Tendik',
                'deskripsi_peran' => 'Tendik Mata Kuliah Prioritas 3',
            ],
        ]);

        PeranAdmin::insert([
            [
                'id_peran' => 1,
                'nama_peran' => 'Admin',
                'deskripsi_peran' => 'Admin Mata Kuliah Prioritas 1',
            ],
            [
                'id_peran' => 2,
                'nama_peran' => 'Super Admin',
                'deskripsi_peran' => 'Super Admin Mata Kuliah Prioritas 2',
            ],
        ]); 

        Gedung::insert([
            [
                'id_gedung' => 'A',
                'nama_gedung' => 'Gedung A',
                'deskripsi' => 'Gedung A adalah gedung yang berada di sisi kiri kampus',
            ],
            [
                'id_gedung' => 'B',
                'nama_gedung' => 'Gedung B',
                'deskripsi' => 'Gedung B adalah gedung yang berada di sisi kanan kampus',
            ],
            [
                'id_gedung' => 'C',
                'nama_gedung' => 'Gedung C',
                'deskripsi' => 'Gedung C adalah gedung yang berada di sisi belakang kampus',
            ],
            ]);

            Ruangan::insert([
                [
                    'id_ruang' => 'A1',
                    'id_gedung' => 'A',
                    'nama_ruang' => 'Ruang A1',
                    'deskripsi' => 'Ruang A1 adalah ruangan yang berada di lantai 1 gedung A',
                    'jam_buka' => '07:00:00', // Start time
                    'jam_tutup' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
                [
                    'id_ruang' => 'A2',
                    'id_gedung' => 'A',
                    'nama_ruang' => 'Ruang A2',
                    'deskripsi' => 'Ruang A2 adalah ruangan yang berada di lantai 2 gedung A',
                    'jam_buka' => '07:00:00', // Start time
                    'jam_tutup' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
                [
                    'id_ruang' => 'B1',
                    'id_gedung' => 'B',
                    'nama_ruang' => 'Ruang B1',
                    'deskripsi' => 'Ruang B1 adalah ruangan yang berada di lantai 1 gedung B',
                    'jam_buka' => '07:00:00', // Start time
                    'jam_tutup' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
                [
                    'id_ruang' => 'B2',
                    'id_gedung' => 'B',
                    'nama_ruang' => 'Ruang B2',
                    'deskripsi' => 'Ruang B2 adalah ruangan yang berada di lantai 2 gedung B',
                    'jam_buka' => '07:00:00', // Start time
                    'jam_tutup' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
                [
                    'id_ruang' => 'C1',
                    'id_gedung' => 'C',
                    'nama_ruang' => 'Ruang C1',
                    'deskripsi' => 'Ruang C1 adalah ruangan yang berada di lantai 1 gedung C',
                    'jam_buka' => '07:00:00', // Start time
                    'jam_tutup' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
            ]);

        Admin::factory(3)->create();
        User::factory(100)->create();

        PinjamRuang::factory(100)->create([
            'id_user' => User::factory(),
        ]);

        BentukKendala::insert([
            [
                'id_bentuk_kendala' => 'BK1',
                'nama_bentuk_kendala' => 'PC',
            ],
            [
                'id_bentuk_kendala' => 'BK2',
                'nama_bentuk_kendala' => 'Laptop',
            ],
            [
                'id_bentuk_kendala' => 'BK3',
                'nama_bentuk_kendala' => 'Printer',
            ],
            [
                'id_bentuk_kendala' => 'BK4',
                'nama_bentuk_kendala' => 'Proyektor',
            ],
            [
                'id_bentuk_kendala' => 'BK5',
                'nama_bentuk_kendala' => 'Lainnya',
            ],
        ]);

        JenisKendala::insert([
            [
                'id_jenis_kendala' => 'JK1',
                'nama_jenis_kendala' => 'Perangkat Keras',
            ],
            [
                'id_jenis_kendala' => 'JK2',
                'nama_jenis_kendala' => 'Perangkat Lunak',
            ],
            [
                'id_jenis_kendala' => 'JK3',
                'nama_jenis_kendala' => 'Jaringan',
            ],
            [
                'id_jenis_kendala' => 'JK4',
                'nama_jenis_kendala' => 'Lainnya',
            ],
        ]);

        LaporKendala::factory(100)->create([
            'id_user' => User::factory(),
        ]);

        MataKuliah::insert([
            [
                'id_mk' => 'MK1',
                'nama_mk' => 'Pemrograman Web',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK2',
                'nama_mk' => 'Pemrograman Mobile',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK3',
                'nama_mk' => 'Pemrograman Desktop',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK4',
                'nama_mk' => 'Pemrograman Game',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK5',
                'nama_mk' => 'Pemrograman Embedded',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK6',
                'nama_mk' => 'Pemrograman AI',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK7',
                'nama_mk' => 'Pemrograman IoT',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK8',
                'nama_mk' => 'Pemrograman Cloud',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK9',
                'nama_mk' => 'Pemrograman Big Data',
                'sks' => 3,
            ],
            [
                'id_mk' => 'MK10',
                'nama_mk' => 'Pemrograman Cyber Security',
                'sks' => 3,
            ]
        ]);

        JadwalMK::factory(100)->create([
            'id_dosen' => User::factory(),
        ]);
    }
}