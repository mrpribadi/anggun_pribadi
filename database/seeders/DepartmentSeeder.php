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
        $data = [
            [
                'nama_dept' => 'IT'
            ], [
                'nama_dept' => 'Finance'
            ], [
                'nama_dept' => 'HRD'
            ]
        ];
        DB::table('department')->insert($data);
    }
}
