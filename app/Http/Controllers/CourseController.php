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
      搜索教程
      根据相应的条件产生相应的学习资料
    */
    public function sou(Request $request){
      $request=$request->all();
      $course = new Course();
      $data=$course->sou($request);
      return view('course/zhuan',['zhuan'=>$data['zhuan']]);
    }
    /*
     * 用户选择题目ajax返回
     */
    public function s(Request $request){
      $request=$request->all();
      $course = new Course();
      $data=$course->s($request);
        //$shi=DB::select($shi);
        return view('course/shi',['shi'=>$data['shi']]);
    }
    public function zhuanye(Request $request){
      $request=$request->all();
      $course = new Course();
      $data=$course->zhuanye($request);
        //print_r($arr);die;
      return view('course/shi',['shi'=>$data['arr']]);
    }
    public function xiang(Request $request){
      $request=$request->all();
      $course = new Course();
      $data=$course->xiang($request);
      //加载登录成功之后的头像
      $index = new Index();
      $data1 = $index ->head_scu();
      $dats = isset($data1['user_filedir'])?$data1['user_filedir']:"";
        //print_r($dats);die;

      return view('course/xiang',['arr'=>$data['arr'],'ping'=>$data['ping'],'picture'=>$dats]);
    }
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
