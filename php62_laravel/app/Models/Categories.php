<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    // khai bao ten table de su dung
    // laravel quy dinh bat buoc dung tu khoa protected , ko dc su dung tu khoa public hay private= bat buoc su dung
    protected $table = "Categories";
    // neu trong table categories khong co 2 cot create_at va update_at thi phai khai bao dong sau
    public $timestamps = false;// co nghia la se khong tu dong fill thoi gian vao update_at va create_at(co nghia la k can tao 2 cot nay trong table category-, ngc lai =true thi bat buoc phai tao)
}
