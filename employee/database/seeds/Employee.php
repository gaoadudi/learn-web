<?php

use Illuminate\Database\Seeder;

class Employee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Thêm nhân viên
       	DB::table('employee')->insert([
            ['name'=>'Nguyễn Hoàng Duy', 'photo'=>'avatar2.jpg', 'jobtitle'=>'Giám đốc', 'cellphone'=>'012345678', 'email'=>'duy@gmail.com'],
            ['name'=>'Đoàn Trọng Xuân', 'photo'=>'avatar.jpg', 'jobtitle'=>'Nhân viên phân tích dữ liệu', 'cellphone'=>'012345678', 'email'=>'xuan@gmail.com'],
            ['name'=>'Nguyễn Quốc Dũng', 'photo'=>'avatar.jpg', 'jobtitle'=>'Quản trị hệ thống', 'cellphone'=>'012345678', 'email'=>'dung@gmail.com'],
            ['name'=>'Lê Ngọc Hải', 'photo'=>'avatar.jpg', 'jobtitle'=>'Kỹ sư phần mềm', 'cellphone'=>'012345678', 'email'=>'hai@gmail.com'],
            ['name'=>'Đỗ Trung Tuấn', 'photo'=>'avatar.jpg', 'jobtitle'=>'Nhân viên phân tích hệ thống', 'cellphone'=>'012345678', 'email'=>'tuan@gmail.com'],
            ['name'=>'Trần Quang Anh', 'photo'=>'avatar.jpg', 'jobtitle'=>'Chuyên viên hỗ trợ kỹ thuật', 'cellphone'=>'012345678', 'email'=>'qanh@gmail.com'],
            ['name'=>'Nguyễn Quý Bình', 'photo'=>'avatar.jpg', 'jobtitle'=>'Thiết kế web', 'cellphone'=>'012345678', 'email'=>'binh@gmail.com'],
            ['name'=>'Cao Mạnh Thắng', 'photo'=>'avatar.jpg', 'jobtitle'=>'Trưởng ban bảo vệ', 'cellphone'=>'012345678', 'email'=>'thang@gmail.com']
       	]);
    }
}
