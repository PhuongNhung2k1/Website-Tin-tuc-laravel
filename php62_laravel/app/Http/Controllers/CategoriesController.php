<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// trongc ontrooler mouon su dung doituong nao phai khai bao doi tuong do
// muon su dung a
use View;// hient hi view
use DB;// doituong thao tac csdl

//su dung Eloquent de truy van csdl-> su ding model thay cho DB nhu O UserController 
//muon su dung model categories thi phai kbao o day-> su dung Eloquent
use App\Models\Categories;

class CategoriesController extends Controller
{
    //url:public/admin/categories
    public function read(){
        // vi trong controller da k=dung bang category nen dun luon k cafn DB::table
        $data = Categories::orderBy("id","desc")->paginate(4);
        // View viet hoa chu dau
        return View::make("backend.CategoriesRead",["data"=>$data]);
        //co the su dung return view("backend.CategoriesRead",["data"=_$data])
    }
    //update- GET
    public function update($id){
        $record = Categories::where("id","=",$id)->first();
        return view("backend.CategoriesCreateUpdate",["record"=>$record]);
    }
    //update - POST
    public function updatePost($id){
        $name = request("name");//= reuqtes; get
        //update name
        Categories::where("id","=",$id)->update(["name"=>$name]);
        // di chuyen den 1 url khac
        return redirect(url('admin/categories'));
    }

      
  // create GET
    public function create(){
        return view("backend.CategoriesCreateUpdate");
    }
    //create - POST
    public function createPost(){
        $name = request("name");
        //update name
        Categories::insert(["name"=>$name]);
        //di chuyen den mot url khac
        return redirect(url('admin/categories'));
    }
    //delete
    public function delete($id){
        //lay mot ban ghi
        Categories::where("id","=",$id)->delete();
        //di chuyen den mo url khac
        return redirect(url("admin/categories"));
    }
}
