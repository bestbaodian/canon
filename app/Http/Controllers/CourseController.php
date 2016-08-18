<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Model\Course;
use App\Http\Requests;
use Session;
use Validator;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /*
    查看有什么学院专业类型
    $arr,$zhuan,$shi,$data
    调用model  course.php
    */
    public function course(Request $request){
        $data = $request->all();
        unset($data['page']);
        $login = new Course();
        $pro=$login ->course($data);
        return view('course/course',['arr'=>$pro['arr'],'zhuan'=>$pro['zhuan'],'shi'=>$pro['shi'],'lei'=>$pro['lei'],'vv',$pro['vv'],'a'=>$pro['a'],'l'=>$pro['l']]);
    }
    /*
     * 用户详情页面  制作人:: 张峻玮
     * 2016-8-17 14:34
     */
    public function xiang(Request $request){
        //接收  试题id  --学院id  -- 专业id  -- 类型id
        // 各项参数
      $course = new Course();
      $data=$course->xiang($request);
      return view('course/xiang',['arr'=>$data['arr'],'ping'=>$data['ping'],'max'=>$data['max'],'min'=>$data['min']]);
    }
    /*
     * 页面评论选星功能
     * 制作人 :: 时庆庆
     * 时间 :: 2016-08-18
     */




	 public function con()
    {
          $con = $_POST['con'];
          $c_id = $_POST['c_id'];
          $e_addtime=date("Y-m-d H:i:s");
        if(!empty(Session::get('username'))){
            echo "1";
        }else{
            $username=Session::get('username');
            $u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
  	        $u_id=$u_id['user_id'];
            $sql="insert into e_ping(p_con,u_id,e_id,e_addtime) values('$con',$u_id,'$c_id','$e_addtime')";
            $re=DB::insert($sql);
            $ping=DB::select("select * from users inner join e_ping on users.user_id=e_ping.u_id where u_id=$u_id order by p_id desc");
            return view('course/ping',['ping'=>$ping]);
        }
    }

}
