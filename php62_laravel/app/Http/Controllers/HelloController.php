
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //tao mot action(phuong thuc) trong controller <=> tao 1 ham trong class nay
    public function index(){
        echo "<h1>Hàm index trong controller có tên : HelloController</h1";
    }
    /* Truyền biến từ url vào controller
    // VD:public/goicontroller/Hello/2022 ->goi ham truyen ben, truyen vao 2 gia tri la hello va 2022
    */

    //truyen bien tu url vao ham trong class
    public function truyenbien($bien1,$bien2){
        echo "<h1>$bien1 $bien2</h1>";
    }
}
