<?php
namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
class Course extends Model{
    public function course($data){
        $arr=array();
        if(($data)){
            if($data['v']){
                $college=DB::table('college')->where('c_id',$data['v'])->first();
                $arr['c_college']=$college['c_name'];
                //专业
                $zhuan=DB::table('direction')->where('college_id',$data['v'])->get();
            }else{
                $zhuan=DB::table('direction')->get();
            }
            if($data['a']){
                $direction=DB::table('direction')->where('d_id',$data['a'])->first();
                $arr['c_direction']=$direction['d_name'];
            }
            if($data['l']){
                $type=DB::table('type')->where('t_id',$data['l'])->first();
                $arr['c_type']=$type['t_name'];
            }
            $pro['vv']=$data['v'];
            $pro['a']=$data['a'];
            $pro['l']=$data['l'];
        }
        else{
            //专业
            $zhuan=DB::table('direction')->get();
            $pro['vv']=0;
            $pro['a']=0;
            $pro['l']=0;
        }
        //查询所有学院
        $xue=DB::table('college')->where('c_del',0)->get();

        //类型
        $lei=DB::table('type')->get();
        //全部试题
        if($arr){
//            $college = DB::table('college')->where($arr)->first();
            $shi=DB::table('college_questions')->where($arr)->simplePaginate(12);
        }else{
            //全部试题
            $shi=DB::table('college_questions')->simplePaginate(12);
        }
        $pro['arr']=$xue;
        $pro['zhuan']=$zhuan;
        $pro['lei']=$lei;
        $pro['shi']=$shi;
        return $pro;

//        $sql="select c_id,c_name from college where c_del=0";
//        $arr=DB::select($sql);
//        //专业
//        $sql="select d_name from direction";
//        $zhuan=DB::select($sql);
//        //类型
//        $lei=DB::table('type')->get();
//        //全部试题
//        $shi=DB::table('college_questions')->simplePaginate(12);
//        $data['arr']=$arr;
//        $data['zhuan']=$zhuan;
//        $data['lei']=$lei;
//        $data['shi']=$shi;
//        return $data;
    }
    public function sou($request){
        if(!empty($request['leixing'])){
            $type=$request['leixing'];
        }else{
            $type='';
        }
        if($type==0){
            $sql="select d_id,d_name from direction";
        }else {
            $sql = "select d_id,d_name from direction where college_id=".$type;
        }
        $zhuan=DB::select($sql);
        //print_r($zhuan);die;
        //根据学院的id查询学院的名称
      $college = DB::table('college')->where('c_id',$type)->first();
      //类型的试题
      // $shi="select * from college_questions where c_college='".$college['c_name']."'";
      // $shi=DB::select($shi);
      $college_name=$college['c_name'];
      $shi=DB::table('college_questions')->where('c_college',"$college_name")->simplePaginate(12);
      $data['zhuan']=$zhuan;
      $data['shi']=$shi;
      return $data;
    }


    public function s($request){
      if(!empty($request['leixing'])){
          $type= $request['leixing'];
      }else{
          $type='';
      }
      if($type==0){
          $shi=DB::table('college_questions')->simplePaginate(12);
      }else{
          $college = DB::table('college')->where('c_id',$type)->first();
          //类型的试题
          $college_name=$college['c_name'];
          $shi=DB::table('college_questions')->where('c_college',"$college_name")->simplePaginate(12);
      }
      $data['shi']=$shi;
      return $data;
    }

    public function zhuanye($request){
      $zhuan=$request['zhuan'];
      $lei=$request['lei'];
      if($zhuan=='0'){
          if($lei=='0'){
             // $zhi='都为空';
              $arr=DB::table('college_questions')->simplePaginate(12);
          }else{
             // $zhi='类型非空专业为空';
              $arr=DB::table('college_questions')->where('c_type',"$lei")->simplePaginate(12);
          }

      }else{
          if($lei=='0'){
             // $zhi='专业非空类型为空';
              $arr=DB::table('college_questions')->where('c_direction',"$zhuan")->simplePaginate(12);
          }else{
              //$zhi="都不为空";
             $arr=DB::table('college_questions')->where('c_direction',"$zhuan")->where('c_type',"$lei")->simplePaginate(12);
          }
      }
      $data['arr']=$arr;
      return $data;
    }

    public function xiang($request){
      $id=$request['id'];
      $num=DB::table('college_questions')->where("c_id",$id)->first();
      $num=$num['c_num']+=1;
      $sq=DB::update("update college_questions set c_num='$num' where c_id=".$id);
      $arr=DB::table('college_questions')->where('c_id',$id)->first();
    //print_r($arr);die;
      $ses = Session::get('username');
      if(!empty($ses)){
        $username=$ses;

      //$username=$_SESSION['username'];
//      $u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
//      $u_id=$u_id['user_id'];
      $u_id = Session::get("uid");
      $ping=DB::select("select * from users inner join e_ping on users.user_id=e_ping.u_id where u_id=$u_id order by p_id desc");
      }else
      {
          $ping=array();
      }
      if($arr['c_college']=='软工学院'){
          $arr['img']='http://123.56.249.121/api/logo/软工.jpg';
      }elseif($arr['c_college']=='移动通信学院'){
          $arr['img']='http://123.56.249.121/api/logo/移动.jpg';
      }elseif($arr['c_college']=='云计算学院'){
          $arr['img']='http://123.56.249.121/api/logo/云计算.jpg';
      }elseif($arr['c_college']=='高翻学院'){
          $arr['img']='http://123.56.249.121/api/logo/高翻.jpg';
      }elseif($arr['c_college']=='国际经贸学院'){
          $arr['img']='http://123.56.249.121/api/logo/经贸.jpg';
      }elseif($arr['c_college']=='建筑学院'){
          $arr['img']='http://123.56.249.121/api/logo/建筑.jpg';
      }elseif($arr['c_college']=='游戏学院'){
          $arr['img']='http://123.56.249.121/api/logo/游戏.jpg';
      }elseif($arr['c_college']=='网工学院'){
          $arr['img']='http://123.56.249.121/api/logo/网工.jpg';
      }elseif($arr['c_college']=='传媒学院'){
          $arr['img']='http://123.56.249.121/api/logo/传媒.jpg';
      }
      $data['arr']=$arr;
      $data['ping']=$ping;
      return $data;
    }
}
