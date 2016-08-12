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
        return view('user/setprofile',['user'=>$user]);
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