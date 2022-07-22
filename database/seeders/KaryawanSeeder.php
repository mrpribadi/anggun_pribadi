<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->insert([
            'nik'        => '0123456789',
            'nama'       => 'Anggun Pribadi',
            'ttl'        => '1990-03-23',
            'alamat'     => 'Jl. Assyafiiyah',
            'id_jabatan' => 3,
            'id_dept'    => 1
        ], [
            'nik'        => '0123443210',
            'nama'       => 'Arif Rahman Hakim',
            'ttl'        => '1992-06-01',
            'alamat'     => 'Jl. Kenangan',
            'id_jabatan' => 2,
            'id_dept'    => 2
        ], [
            'nik'        => '2345678901',
            'nama'       => 'Cholid Romli',
            'ttl'        => '1986-01-10',
            'alamat'     => 'Jl. Patriot',
            'id_jabatan' => 1,
            'id_dept'    => 3
        ]);
    }
}
