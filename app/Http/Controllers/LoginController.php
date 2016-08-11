<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Model\Login;
use DB;

class LoginController extends Controller
{
    public function login(){
        return view('login/login');
    }
    public function name(Request $request){
        $data = $request->all();
        $login = new Login();
        echo $login ->name($data);
    }
    public function email(Request $request){
        $data = $request->all();
        $data=$data['u_name'];
        $arr=DB::table('users')->where('user_email',"$data")->first();
        if($arr){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function name_pwd(Request $request){
        $data = $request->all();
        $u_name=$data['u_name'];
        $u_pwd=md5(md5($data['u_pwd']));
        //echo $u_name,$u_pwd;die;
        $arr=DB::table('users')->where('user_phone',"$u_name")->where('user_pwd',"$u_pwd")->get();
       //print_r($arr);die;
        if($arr){
            echo 3;
        }else{
            echo 4;
        }
    }
    public function email_pwd(Request $request){
        $data = $request->all();
        $u_name=$data['u_name'];
        $u_pwd=md5(md5($data['u_pwd']));
        //echo $u_name,$u_pwd;die;
        $arr=DB::table('users')->where('user_email',"$u_name")->where('user_pwd',"$u_pwd")->get();
        //print_r($arr);die;
        if($arr){
            echo 3;
        }else{
            echo 4;
        }
    }
    public function name_deng(Request $request){
        $data = $request->all();
        $u_name=$data['u_name'];
        $u_pwd=md5(md5($data['u_pwd']));
//	echo $_SESSION['username'];die;
        $arr=DB::table('users')->where('user_phone',"$u_name")->where('user_pwd',"$u_pwd")->get();
        if($arr){
        Session::put('username',$arr[0]['user_name']);
        Session::put('uid',$arr[0]['user_id']);
            echo 5;
        }else{
            echo 6;
        }
    }
    public function email_deng(Request $request){
        $data = $request->all();
        $u_name=$data['u_name'];
        $u_pwd=md5(md5($data['u_pwd']));
        $arr=DB::table('users')->where('user_email',"$u_name")->where('user_pwd',"$u_pwd")->get();
        //print_r($arr);die;
        if($arr){
        Session::put('username',$arr[0]['user_name']);
        Session::put('uid',$arr[0]['user_id']);
            echo 5;
        }else{
            echo 6;
        }
    }
    //注册
    public function register(){
        return view('login/register');
    }
    public function reg(Request $request){
        $data = $request->all();
        $login = new Login();
        $check = $login ->reg($data);
        if($check=="true"){
            return redirect('index');
        }
    }

    public function out(){
        Session::forget("username");
        echo "<script>alert('退出成功');location.href='index'</script>";
    }




 }
