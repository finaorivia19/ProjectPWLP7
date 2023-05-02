<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mahasiswa_MataKuliah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nilai = [
            [
                'mahasiswa_id' => 2141720212,
                'matakuliah_id' => 2,
                'nilai' => 88,
            ],
            [
                'mahasiswa_id' => 2141720212,
                'matakuliah_id' => 3,
                'nilai' => 90,
            ],
            [
                'mahasiswa_id' => 2141720212,
                'matakuliah_id' => 4,
                'nilai' => 70,
            ],
        ];

        DB::table('mahasiswa_matakuliah')->insert($nilai);
    }
}
