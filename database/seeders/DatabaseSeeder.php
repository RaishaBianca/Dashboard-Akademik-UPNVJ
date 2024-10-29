<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\PeranUser;
use App\Models\PeranAdmin;
use App\Models\PinjamRuang;
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
                    'jam_mulai' => '07:00:00', // Start time
                    'jam_selesai' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
                [
                    'id_ruang' => 'A2',
                    'id_gedung' => 'A',
                    'nama_ruang' => 'Ruang A2',
                    'deskripsi' => 'Ruang A2 adalah ruangan yang berada di lantai 2 gedung A',
                    'jam_mulai' => '07:00:00', // Start time
                    'jam_selesai' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
                [
                    'id_ruang' => 'B1',
                    'id_gedung' => 'B',
                    'nama_ruang' => 'Ruang B1',
                    'deskripsi' => 'Ruang B1 adalah ruangan yang berada di lantai 1 gedung B',
                    'jam_mulai' => '07:00:00', // Start time
                    'jam_selesai' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
                [
                    'id_ruang' => 'B2',
                    'id_gedung' => 'B',
                    'nama_ruang' => 'Ruang B2',
                    'deskripsi' => 'Ruang B2 adalah ruangan yang berada di lantai 2 gedung B',
                    'jam_mulai' => '07:00:00', // Start time
                    'jam_selesai' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
                [
                    'id_ruang' => 'C1',
                    'id_gedung' => 'C',
                    'nama_ruang' => 'Ruang C1',
                    'deskripsi' => 'Ruang C1 adalah ruangan yang berada di lantai 1 gedung C',
                    'jam_mulai' => '07:00:00', // Start time
                    'jam_selesai' => '17:00:00', // End time
                    'kapasitas' => 50,
                ],
            ]);

        Admin::factory(3)->create();
        User::factory(100)->create();

        PinjamRuang::factory(100)->create([
            'id_user' => User::factory(),
        ]);
    }
}