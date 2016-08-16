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
        return view('index/index',['shi'=>$shi,]);
    }

    public function aaa(){
        echo Session::get("username");
    }
}
