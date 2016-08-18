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
        //定义空数组
        $arr=array();
        if($data){
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

        if(isset($data['top'])){
            if($arr){
//            $college = DB::table('college')->where($arr)->first();
                $shi=DB::table('college_questions')->where($arr)->orderBy('c_num','desc')->Paginate(12);
            }else{
                //全部试题
                $shi=DB::table('college_questions')->orderBy('c_num','desc')->Paginate(12);
            }
        }else{
            if($arr){
//            $college = DB::table('college')->where($arr)->first();
                $shi=DB::table('college_questions')->where($arr)->orderBy('c_id','desc')->Paginate(12);
            }else{
                //全部试题
                $shi=DB::table('college_questions')->orderBy('c_id','desc')->Paginate(12);
            }
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
    /*
     * 试题详情页面   制作人::张峻玮
     */

    public function xiang($request){
        //接收  试题id  --学院id  -- 专业id  -- 类型id
        // 各项参数
        $id=$request->get('id');
        $v=$request->get('v',0);
        $a=$request->get('a',0);
        $l=$request->get('l',0);
        //定义空数据 查询创建分页条件
        $arr=array();

        if($v){
            $college=DB::table('college')->where('c_id',$v)->first();
            $arr['c_college']=$college['c_name'];
        }
        if($a){
            $direction=DB::table('direction')->where('d_id',$a)->first();
            $arr['c_direction']=$direction['d_name'];
        }
        if($l){
            $type=DB::table('type')->where('t_id',$l)->first();
            $arr['c_type']=$type['t_name'];
        }
        if($arr){
            $arr_max=DB::table('college_questions')->select('c_id')->where('c_id','>',$id)->where($arr)->first();
            $arr_min=DB::table('college_questions')->select('c_id')->where('c_id','<',$id)->where($arr)->orderby('c_id','desc')->first();
        }else{
            $arr_max=DB::table('college_questions')->select('c_id')->where('c_id','>',$id)->first();
            $arr_min=DB::table('college_questions')->select('c_id')->where('c_id','<',$id)->orderby('c_id','desc')->first();
        }

        $sq=DB::update("update college_questions set c_num=c_num + 1 where c_id=".$id);

        $arr=DB::table('college_questions')->where('c_id',$id)->first();

        $username = Session::get('username');

        $ping=DB::table('e_ping')
            ->join('users','e_ping.u_id','=','users.user_id')
            ->where('e_id',$id)->orderby('p_id','desc')->take(5)->get();
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
        $data['max']=$arr_max['c_id'];
        $data['min']=$arr_min['c_id'];
        return $data;
    }
    /*
     *试题评论 马天天
     */
    //查询用户表
    public function sel_users($username)
    {
        $brr=DB::table('users')->where("user_name","$username")->first();
        return $brr;
    }
    //试题评论入库
    public function insert_eping($con,$u_id,$c_id,$e_addtime)
    {
        $re=DB::table('e_ping')->insert([
            'p_con'=>$con,
            'u_id'=>$u_id,
            'e_id'=>$c_id,
            'e_addtime'=>$e_addtime
        ]);
        return $re;
    }
    //首先查询关注表
    public function sel_follow($c_id,$u_id)
    {
        $arr=DB::table('follow')->where('u_id',$u_id)->where('c_id',$c_id)->first();
        return $arr;
    }
    //试题关注
    public function follow($c_id,$u_id)
    {
        $brr=DB::table('follow')->insert([
          'c_id'=>$c_id,
          'u_id'=>$u_id
        ]);
        return $brr;
    }
    //取消关注
    public function qx_follow($c_id)
    {
        $re=DB::table('follow')->where('c_id',$c_id)->delete();
        return $re;
    }
//    //修改状态
//    //修改为关注
//    public function up_state1($u_id)
//    {
//      $state1=DB::table('follow')->where('u_id',$u_id)->update(['f_state' => 1]);
//        return $state1;
//    }
//    //修改为取消关注
//    public function up_state0($u_id)
//    {
//        $state0=DB::table('follow')->where('u_id',$u_id)->update(['f_state' => 0]);
//        return $state0;
//    }
}
