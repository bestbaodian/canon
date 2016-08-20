<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Model\Index;
use App\Http\Model\Course;
use App\Http\Requests;

class IndexController extends Controller
{
    public function index(){
        header("content-type:text/html;charset=utf8");
        $index = new Index();

        //试题显示内容查询
        $shi = $index ->index();

        //招聘显示内容查询
        $pro = $index ->program();

        //方法文章显示
        $article = $index->article();
        //方法类型显示
        $lei     = $index->lei();
        //print_r($article);die;
        return view('index/index',['shi'=>$shi,'pro'=>$pro,'article'=>$article,'lei'=>$lei]);
    }

    public function layouts(){
        return view('layouts/master');
    }
    public function aaa(){
        echo Session::get("username");
    }
}
