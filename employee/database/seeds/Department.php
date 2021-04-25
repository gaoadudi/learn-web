<?php

use Illuminate\Database\Seeder;

class Department extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Thêm phòng ban
       	DB::table('department')->insert([
            ['name'=>'Phòng hành chính', 'officephone'=>'012345678', 'manager'=>'Manager 1'],
            ['name'=>'Phòng kinh doanh', 'officephone'=>'012345678', 'manager'=>'Manager 2'],
            ['name'=>'Phòng kế toán', 'officephone'=>'012345678', 'manager'=>'Manager 3'],
            ['name'=>'Phòng tài vụ', 'officephone'=>'012345678', 'manager'=>'Manager 4'],
            ['name'=>'Phòng KT-VT', 'officephone'=>'012345678', 'manager'=>'Manager 5']
       	]);
    }
}
