<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'Nim'=>'2141720256',
            'Nama'=> 'Fina Orivia Nurfadillah',
            'Kelas'=> 'TI-2G',
            'Jurusan'=> 'Teknologi Informasi',
            'No_Handphone'=> '081217275757'

        ]);
    }
}
