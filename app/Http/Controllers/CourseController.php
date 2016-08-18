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
       $all = $request->all();
       $c_id = $all['id'];
        //print_r($c_id);die;
        //接收  试题id  --学院id  -- 专业id  -- 类型id
        // 各项参数
      $course = new Course();
      $data=$course->xiang($request);


     $u_id=Session::get('uid');
       //查询
      $follow=$course->sel_follow($c_id,$u_id);
        //print_r($follow);die;
      return view('course/xiang',['arr'=>$data['arr'],'ping'=>$data['ping'],'max'=>$data['max'],'min'=>$data['min'],'follow'=>$follow]);
    }
    /*
     *试题评论 马天天
     * 调用model层course 方法
     */
    //试题添加评论
	 public function contents(Request $request)
    {
          $post=$request->all();
          $con = $post['con'];
          $c_id = $post['c_id'];
          $e_addtime=date("Y-m-d H:i:s");
          //判断当前用户名是否存在
          //如果不存在，重新登录
        if(empty(Session::get('username')))
        {
          $arr=array(
              "msg"=>"2",
              "error"=>"0"
              );
          return json_encode($arr);
        }
          //用户存在
          else{
            $username=Session::get('username');
            //根据用户名查询
            $model=new course();
            $brr=$model->sel_users($username);
              //取出头像
            $picture=$brr['user_filedir'];
            $u_id=$brr['user_id'];
            //添加评论入库
            $re=$model->insert_eping($con,$u_id,$c_id,$e_addtime);
             //评论成功
            if($re)
            {
               $arr=array(
              "msg"=>"1",
              "error"=>"1"
              );
              return json_encode($arr);
            }
         }
    }
    /*
     * 试题关注 马天天
     */
    //试题关注
    public function state(Request $request)
    {
        $post=$request->all();
        $c_id=$post['c_id'];
        $u_id=$post['u_id'];
        $username=Session::get('username');
        //判断当前用户名是否存在
        //如果不存在，重新登录
        if(empty(Session::get('username')))
        {
            $arr=array(
                "msg"=>"2",
                "error"=>"0"
            );
            return json_encode($arr);
        }
        //用户存在
        else
        {
            //根据用户名查询
            $model=new course();
           //查询
            $date=$model->sel_follow($c_id,$u_id);
           if($date)
           {
              //取消关注
               $re=$model->qx_follow($c_id);
               $arr=array(
                   'msg'=>'3',
                   'error'=>'1'
               );
               return json_encode($arr);
           }
            else
            {
                 //添加关注
                $brr=$model->follow($c_id,$u_id);
                if($brr)
                {
                    $arr=array(
                        'msg'=>'1',
                        'error'=>'0'
                    );
                    return json_encode($arr);
                }
            }

        }
    }

}
