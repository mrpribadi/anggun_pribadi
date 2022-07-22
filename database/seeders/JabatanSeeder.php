<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatan')->insert([
            'nama_jabatan' => 'Staff',
            'id_level'     => 1
        ], [
            'nama_jabatan' => 'Supervisor',
            'id_level'     => 2
        ], [
            'nama_jabatan' => 'Manager',
            'id_level'     => 3
        ]);
    }
}
