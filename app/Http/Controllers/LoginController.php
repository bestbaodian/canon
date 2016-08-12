<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Model\Login;
use App\Http\Model\Logines;
use DB;


class LoginController extends Controller
{
    public function login(){
        return view('login/login');
    }
    /*
     * 验证手机号是否可用
     * 用户手机号是否存在
     */
    public function name(Request $request){
        $data = $request->all();
        $login = new Login();
        echo $login ->name($data);
    }
    //验证邮箱是否存在
    public function email(Request $request){
        $data  = $request->all();
        $login = new Login();
        echo $login ->email($data);
    }
    /**
     * @param
     * 验证手机号与密码是否正确
     */
    public function name_pwd(Request $request){
        $data  = $request->all();
        $login = new Login();
        echo $login ->name_pwd($data);
    }
    /**
     * @param
     * 验证邮箱与密码是否正确
     */
    public function email_pwd(Request $request){
        $data  = $request->all();
        $login = new Login();
        echo $login ->email_pwd($data);
    }
    /**
     * @param
     * 验证手机号登录
     */
    public function name_deng(Request $request){
        $data = $request->all();
        $login = new Login();
        echo $login ->name_deng($data);
    }
    /**
     * @param
     * 验证邮箱登录
     */
    public function email_deng(Request $request){
        $data  = $request->all();
        $login = new Login();
        $login ->email_deng($data);
    }
    //注册
    public function register(){
        return view('login/register');
    }
    public function reg(Request $request){
        $data = $request->all();
        $login = new Logines();
        $check = $login ->reg($data);
        if($check=="true"){
            return "true";
        }else{
            return $check;
        }
    }
    /*
     * 用户退出
     */
    public function out(){
        Session::forget("username");
        echo "<script>alert('退出成功');location.href='index'</script>";
    }

    /*
    * 第三方登陆
    */
    public function qq_login(){
        $logins=new Logines();
        $code = $_GET['code'];
        $data=$logins->me($code);
        Session::put('username',$data['name']);
        return redirect('index');
    }




 }
