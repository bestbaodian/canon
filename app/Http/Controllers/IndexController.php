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

        //简历展示
        $proe = $index->proe();

        //主页答疑模块展示

        $questions =$index->questions();
//        print_r($questions);die;
        return view('index/index',['shi'=>$shi,'pro'=>$pro,'article'=>$article,'lei'=>$lei,'gather'=>$proe,'questions'=>$questions]);
    }

    public function layouts(){
        return view('layouts/master');
    }
    public function aaa(){
        echo Session::get("username");
    }
}
