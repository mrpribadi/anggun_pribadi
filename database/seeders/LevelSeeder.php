<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert([
            'nama_level' => 'Junior'
        ], [
            'nama_level' => 'Officer'
        ], [
            'nama_level' => 'Senior'
        ]);
    }
}
