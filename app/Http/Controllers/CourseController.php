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
        if($u_id){
            $ping=DB::select("select * from users inner join e_ping on users.user_id=e_ping.u_id where e_ping.e_id=$c_id order by e_ping.e_addtime desc");
        }else{
            $ping = "";
        }
        //试题综合评价
        $synthesize = $course->synthesize($c_id);
        //查询
//        print_r($synthesize);die;
        $follow=$course->sel_follow($c_id,$u_id);
        //print_r($follow);die;
        return view('course/xiang',['arr'=>$data['arr'],'ping'=>$data['ping'],'max'=>$data['max'],'min'=>$data['min'],'follow'=>$follow,'ping'=>$ping,'synthesize'=>$synthesize]);
    }
    /*
     * 页面评论选星功能
     * 时间 :: 2016-08-18
     */
    public function pinglun_shiti(Request $request){
        //echo $u_id;die;
        $Cou = new Course();
        $arr = $Cou ->pinglun_shiti($request);
        return view('course.pinglun')->with('ping',$arr);
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
