<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            'nama_dept' => 'IT'
        ], [
            'nama_dept' => 'Finance'
        ], [
            'nama_dept' => 'HRD'
        ]);
    }
}
