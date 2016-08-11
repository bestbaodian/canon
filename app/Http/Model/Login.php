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
    public function reg($data)
    {
        $validator = Validator::make($data, [
            'user_name' => 'required|between:6,32|unique:users',
            'user_pwd' => 'required|between:6,16',
            'user_email'=>'required|unique:users',
            'user_phone'=>'required|unique:users'
        ]);
        if($validator->errors()->all())
        {
            //获取用户注册错误信息
            $error = $validator->errors()->all();
            //返回用户注册错误信息
            return $this->Error($error);
        }
        else
        {
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
        $value = Session::put('error',$error);
        $var   = Session::get('error');
        return $var;
    }
}
