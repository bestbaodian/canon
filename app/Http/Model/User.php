<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
class User extends Model
{
    /*
     * 用户个人中心
     */
    public function setprofile($user)
    {
        $sql ="select user_name,user_job,user_aboutme,user_sex from users where user_name = '$user'";
        $data = DB::select($sql);
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
        $username=Session::get("username");
        //return $username;
        $user_name=$arr['nickname'];
        $user_job=$arr['job'];
        $user_sex=$arr['sex'];
        $user_aboutme=$arr['aboutme'];
        $user_province=$arr['sheng'];
        $user_city=$arr['cheng'];
        $user_area=$arr['qu'];
        $sql = "update users set  user_name      = '$user_name',
                                    user_job      = '$user_job',
                                    user_sex      = '$user_sex',
                                    user_aboutme  = '$user_aboutme',
                                    user_province = '$user_province',
                                    user_city     = '$user_city',
                                    user_area     = '$user_area' where user_name = '$username'";
        $msg = DB::select($sql);
        if($msg){
            Session::put('username',$user_name);
        }
        return $msg;
    }
}
