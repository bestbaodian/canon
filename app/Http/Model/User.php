<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
use Validator;
class User extends Model
{
    /*
     * 用户个人中心model层
     * sql操作
     */
    public function setprofile($user)
    {
        //$sql ="select user_name,user_job,user_aboutme,user_sex,user_filedir from users where user_name = '$user'";
        $data    =DB::table('users')->select('user_name','user_job','user_aboutme','user_sex','user_filedir')->where("user_name",$user)->get();
        //$data = DB::select($sql);
        if($data){
            return $data;
        }else{
            return $data=array('error'=>"1");
        }
    }


    //职业查询
    public function get_career(){
        $career = DB::table('career')->get();
        return $career;
    }


    //地区查询
    public function get_region(){
        $district = DB::table('region')->where("parent_id",1)->get();
        return $district;
    }


    //省份查询
    public function get_province($region_id){
        $provinces = DB::table('region')->where("parent_id",$region_id)->get();
        return $provinces;
    }


    //修改数据库个人资料
    public function re_profile($arr){
        $username=Session::get("uid");
        //return $username;
        $user_name=$arr['user_name'];
        $user_job=$arr['job'];
        $user_sex=$arr['sex'];
        $user_aboutme=$arr['aboutme'];
        $user_province=$arr['sheng'];
        $user_city=$arr['cheng'];
        $user_area=$arr['qu'];

        //更改昵称验证唯一性
        $validator = Validator::make($arr, [
            'user_name' => 'required|between:4,6',
        ]);
        //判断是否有错误
        if($validator->errors()->all()){

            //获取用户注册错误信息
            $error = $validator->errors()->all();

            //返回用户注册错误信息
            $english = $this->Error($error);

            //调用英文翻译接口
            $url = "http://fanyi.youdao.com/openapi.do?keyfrom=qwe1123&key=710353888&type=data&doctype=json&version=1.1&q=".$english;

            //将内容读取出来
            $file = file_get_contents($url);
            return $file;
        }else{
            $sql = "update users set  user_name  = '$user_name',
                                    user_job      = '$user_job',
                                    user_sex      = '$user_sex',
                                    user_aboutme  = '$user_aboutme',
                                    user_province = '$user_province',
                                    user_city     = '$user_city',
                                    user_area     = '$user_area' where user_id = '$username'";
            $msg = DB::select($sql);
            Session::put('username',$user_name);
            $data['msg']='ok';
            $data['error']='0';
            return json_encode($data);
        }
    }
    /*
     * 返回用户的城市信息
     */
    public function city(){

        //
        $user_id  = Session::get('uid');

        //查询数据内容
        $data    =DB::table('users')->select('user_province','user_city','user_area')->where("user_id",$user_id)->first();

        //查询
        $regin  =DB::table('region')->select('region_id','region_name')->whereIn('region_id',$data)->get();

        return  $regin;
    }

    /*
     * @返回用户昵称修改错误信息
     * 用户名必须唯一
     */
    public function Error($error)
    {
        $error = implode(',',$error);
        Session::put('error',$error);
        $var   = Session::get('error');
        return $var;
    }
}
