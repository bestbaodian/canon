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
        $data    =DB::table('users')
            ->select(
                'user_name',
                'user_job',
                'user_aboutme',
                'user_sex',
                'user_filedir',
                'user_phone_status',
                'user_phone',
                'user_email',
                'user_email_status'
            )->where("user_name",$user)->get();
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
            'user_name' => 'required|between:2,6',
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
    /*
     * @得到用户原来密码
     * 查询数据库
     */
    public function get_old($pwd)
    {
        $mima=md5(md5($pwd));
        $user_id=Session::get("uid");
        $data = DB::table('users')->select("user_pwd")->where('user_id',$user_id)->first();
        //return $data;
        if($mima==$data['user_pwd']){
            $arr=array(
                'msg' => 'ok',
                'error' => '0'
            );
            return $arr;
        }else{
            $arr=array(
                'msg' => 'ok',
                'error' => '密码错误'
            );
            return $arr;
         }
    }
    //修改数据库密码
    public function gai_pwd($pwd){
        $user_id=Session::get("uid");
        $new_pwd=md5(md5($pwd));
        $arr=DB::table('users')
            ->where('user_id', $user_id)
            ->update(['user_pwd' => $new_pwd]);
        if($arr){
            $data=array(
                "message"=>'ok',
                "error"=>'0'
            );
            Session::forget("uid");
            Session::forget("username");
            return $data;
        }else{
            $data=array(
                "message"=>'密码输入错误',
                "error"=>'1'
            );
            return $data;
        }
    }
    //提交email信息
    public function sub_code($email)
    {
        $user_id = Session::get('uid');
        $arr=DB::table('users')
            ->where('user_id', $user_id)
            ->update(['user_email' => $email,'user_email_status'=>1]);
        return $arr;
    }

    //我的收藏展示->试题收藏
    public function question_house($username)
    {
        $users = DB::table('users')->where("user_name",$username)->get();
        $user_id = $users[0]['user_id'];
        $college_questions = DB::table('college_questions')
            ->join('follow', 'college_questions.c_id', '=', 'follow.c_id')
            ->join('users', 'users.user_id', '=', 'follow.u_id')
            ->select('c_name','c_answer','college_questions.c_id as c_id')
            ->where('users.user_id',$user_id)
            ->get();
        return $college_questions;
    }

    //我的收藏展示->文章收藏
    public function article_house($username)
    {
        $users = DB::table('users')->where("user_name",$username)->get();
        $user_id = $users[0]['user_id'];
        $article = DB::table('article')
            ->join('house_article', 'article.a_id', '=', 'house_article.article_id')
            ->join('users', 'users.user_id', '=', 'house_article.user_id')
            ->select('a_title','a_con','article.a_id as a_id')
            ->where('users.user_id',$user_id)
            ->get();
        return $article;
    }
    //面试资料添加
    public function add_inter($data){
        $u_id=Session::get('uid');
        $company=$data['company'];
        $time=$data['time'];
        $ic_id=isset($data['ic_id'])?$data['ic_id']:'';
        if($ic_id==''){
            $arr=DB::insert("insert into ic(u_id,company,`time`) values('$u_id','$company','$time')");
            if($arr){
                echo 1;die;
            }else{
                echo 2;die;
            }
        }
        else{
            $arr=DB::table('ic')
                ->where('ic_id', $ic_id)
                ->update(['company' => $company,'time'=>$time]);
            if($arr){
                echo 3;die;
            }else{
                echo 2;die;
            }
        }
    }
    //查询个人面试信息
    public function sel_one(){
        $u_id=Session::get('uid');
        $arr  =DB::table('ic')->select('*')->where('u_id',$u_id)->orderBy('time','desc')->get();
        return $arr;
    }
    //编辑个人面试信息
    public function upd_one($id){
        $arr  =DB::table('ic')->select('*')->where('ic_id',$id)->first();
        return $arr;
    }
    //删除面试资料
    public function del_one($ic_id){
        $arr  =DB::table('ic')->where('ic_id',$ic_id)->delete();
        if($arr){
            return 1;
        }else{
            return 2;
        }
    }
    /*
     * 实名认证
     */
    public function attestation($user)
    {
        //$sql ="select user_name,user_job,user_aboutme,user_sex,user_filedir from users where user_name = '$user'";
        $data=DB::table('users')
            ->leftjoin('userinfo','users.user_id','=','userinfo.u_id')
            ->leftjoin('class','class.c_id','=','userinfo.u_class')
            ->select('user_phone_status','userinfo.us_id','userinfo.u_name','userinfo.u_class','class.cid','class.c_class',"user_email_status")
            ->where("user_name",$user)
            ->get();
        if($data){
            return $data;
        }else{
            return $data=[];
        }
    }
    /*
     *学院班级
     */
    public function sel_college(){
        $regin  =DB::table('college')->select('*')->get();
        return $regin;
    }
    public function sel_class($id){
        $regin  =DB::table('class')->select('*')->where('cid',$id)->get();
        return $regin;
    }
    public function sel_msg($data){
        $u_id=Session::get('uid');
        $u_name=$data['u_name'];
        $c_id=$data['c_id'];
        $us_id=isset($data['us_id'])?$data['us_id']:'';
        if($us_id==''){
            $arr=DB::insert("insert into userinfo(u_id,u_name,u_class) values('$u_id','$u_name','$c_id')");
            if($arr){
                echo 1;die;
            }else{
                echo 2;die;
            }
        }
        else{
            $arr=DB::table('userinfo')
                ->where('us_id', $us_id)
                ->update(['u_name' => $u_name,'u_class'=>$c_id]);
            if($arr){
                echo 1;die;
            }else{
                echo 2;die;
            }
        }
    }
}
