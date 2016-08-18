<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Model\Index;
use App\Http\Requests;

class IndexController extends Controller
{
    public function index(){
        $index = new Index();
        $shi = $index ->index();
        $pro = $index ->program();
        return view('index/index',['shi'=>$shi,'pro'=>$pro]);
    }

    public function layouts(){
        return view('layouts/master');
    }
    public function aaa(){
        echo Session::get("username");
    }
}
