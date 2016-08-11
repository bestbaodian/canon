<?php

namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    /*
     * 验证注册
     */
    public function reg($data)
    {
        //设置自动验证
        $validator = Validator::make($data, [
            'user_name' => 'required|between:6,32|unique:users',
            'user_pwd' => 'required|between:6,16',
            'user_email'=>'required|unique:users',
            'user_phone'=>'required|unique:users'
        ]);
        //错误放回错误信息
        if($validator->errors()->all())
        {
            //获取用户注册错误信息
            $error = $validator->errors()->all();
            //返回用户注册错误信息
            return $this->Error($error);
        }
        else
        {
            //将数据入库
            $name = $data['user_name'];
            $pwd = md5(md5($data['user_pwd']));
            $email = $data['user_email'];
            $phone = $data['user_phone'];
            $arr=DB::insert("insert into users(user_name,user_pwd,user_email,user_phone) values('$name','$pwd','$email','$phone')");
            //设置用户session值
            if($arr){
                Session::put('username',$name);
                return true;
            }
        }
    }
    /*
     * 验证手机号是否可用
     * 用户手机号是否存在
     */
    public function name($data){
        $data=$data['u_name'];
        // echo $u_phone;die;
        $arr=DB::table('users')->where('user_phone',"$data")->first();
        if($arr){
            return 1;
        }else{
            return 2;
        }
    }
    //返回注册自动验证错误信息
    public function Error($error)
    {
        $error = implode(',',$error);
                 Session::put('error',$error);
        $var   = Session::get('error');
        return $var;
    }
    //验证邮箱是否存在
    public function email($data)
    {
        $data=$data['u_name'];
        $arr=DB::table('users')->where('user_email',"$data")->first();
        if($arr){
            return 1;
        }else{
            return 2;
        }
    }
    /**
     * @param
     * 验证手机号与密码是否正确
     */
    public function name_pwd($data){
        $u_name=$data['u_name'];
        $u_pwd=md5(md5($data['u_pwd']));
        //echo $u_name,$u_pwd;die;
        $arr=DB::table('users')->where('user_phone',"$u_name")->where('user_pwd',"$u_pwd")->get();
        //print_r($arr);die;
        if($arr){
            return 3;
        }else{
            return 4;
        }
    }
    /**
     * @param
     * 验证邮箱与密码是否正确
     */
    public function email_pwd($data){
        $u_name=$data['u_name'];
        $u_pwd=md5(md5($data['u_pwd']));
        $arr=DB::table('users')->where('user_email',"$u_name")->where('user_pwd',"$u_pwd")->get();
        if($arr){
            return 3;
        }else{
            return 4;
        }
    }
    /**
     * @param
     * 验证手机号登录
     */
    public function name_deng($data){
        $u_name=$data['u_name'];
        $u_pwd=md5(md5($data['u_pwd']));
        $arr=DB::table('users')->where('user_phone',"$u_name")->where('user_pwd',"$u_pwd")->get();
        if($arr){
            Session::put('username',$arr[0]['user_name']);
            Session::put('uid',$arr[0]['user_id']);
            return 5;
        }else{
            return 6;
        }
    }
    /**
     * @param
     * 验证邮箱登录
     */
    public function email_deng($data){
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
}
