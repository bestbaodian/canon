<?php

namespace App\Http\Controllers;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    //个人资料
    public function setprofile(){
        $username = Session::get("username");
        $User  =new  User();

        $user  =$User->setprofile($username);
        //查询职业
        $career=$User->get_career();

        //地区
        $district=$User->get_region();

        //查询用户库中的城市
        $city = $User -> city();
        $arr = array(array("region_id"=>0,"region_name"=>"选择省份"),array("region_id"=>0,"region_name"=>"选择城市"),array("region_id"=>0,"region_name"=>"选择区县"));
        //如果用户没有设置地址就默认选择
        if(!in_array("region_id",$city)){
            $city = $arr;
        }
        return view('user/setprofile',['user'=>$user,'career'=>$career,'first'=>$district,'city'=>$city]);
    }


    //获取省信息
    public function getprovince(Request $request){
        $region_id=$request['id'];
        //根据parent_id查对应省份
        $region=new User();
        $provinces=$region->get_province($region_id);
        //print_r($provinces);die
        $data=json_encode($provinces);
        return $data;
    }


    //修改个人资料
    public function updprofile(Request $request){
        $arr=$request->all();
        $pro=new User();
        $msg=$pro->re_profile($arr);
        return $msg;
    }


    //头像设置
    public function setavator(){
        return view('user/setavator');
    }


    //手机设置
    public function setphone(){
        return view('user/setphone');
    }


    //邮箱验证
    public function setverifyemail(){
        return view('user/setverifyemail');
    }


    //修改密码
    public function setresetpwd(){
        return view('user/setresetpwd');
    }


    //绑定账号
    public function setbindsns(){
        return view('user/setbindsns');
    }
}