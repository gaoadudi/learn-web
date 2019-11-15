<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    // Khai báo bảng ko sử dụnng 2 trường Created_at và Update_at 
    public $timestamps = false;
}
