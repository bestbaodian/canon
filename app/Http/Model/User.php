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
        $sql = "SELECT user_name,user_nickname";
        $data = DB::table('users')->where("user_name",$user)->get();
        if($data){
            return $data;
        }else{
            return $data=array('error'=>"1");
        }
    }
}
