<?php

namespace App\Http\Model;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    public function index()
    {
        return DB::table('shiti')->orderBy("click","desc")->limit(8)->get();
    }
    /*
     * 用户头像信息
     */
    public function head_scu()
    {
        $user = Session::get("username");
        $data    =DB::table('users')->select('user_filedir')->where("user_name",$user)->first();
        //$data = DB::select($sql);
        if($data){
            return $data;
        }else{
            return $data=array('error'=>"1");
        }
    }
}
