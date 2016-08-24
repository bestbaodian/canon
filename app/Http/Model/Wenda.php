<?php
namespace App\Http\Model;

use DB;
use Session;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wenda
 * @package App\Http\Model
 */

class Wenda extends Model{
    //答疑主页  推荐 最新 待会答
    public function recommend($is_look){
        if(!empty($is_look)){
            //关注的话查看试题
            if(Session::get('uid')) {
                $uid = Session::get('uid');
                $guan = DB::table('house_direction')
                    ->where('user_id',$uid)
                    ->get();
                if($guan==array('')){
                    $arr=array();
//                 echo "<script>alert('没有关注分类，即将展示所有的'),window.history.go(-1)</script>";die;
                }else{
                    $arr=array();
                    foreach($guan as $v){
                        $arr[]=$v['d_id'];
                    }
                }
            }else{
                $arr=array();
                echo "<script>alert('请先登录'),location.href='wenda'</script>";die;
            }
        }
        if(isset($arr) && $arr!=array('')){
            $pro=DB::table('t_tw')
                ->select(DB::raw('*,count(comments.com_id) as num ,t_tw.t_id'))
                ->join('direction', function ($join) {
                    $join->on('direction.d_id', '=', 't_tw.d_id');
                })
                ->leftjoin('users', function ($join) {
                    $join->on('users.user_id', '=', 't_tw.user_id');
                })
                ->leftjoin('comments',function($join){
                    $join->on('comments.t_id', '=', 't_tw.t_id');
                })
                ->groupby('t_tw.t_id')
                ->orderBy('num','desc')
                ->whereIn('t_tw.d_id',$arr)
                ->Paginate(5);
            return $pro;
        }else{
            $pro=DB::table('t_tw')
                ->select(DB::raw('*,count(comments.com_id) as num ,t_tw.t_id'))
                ->join('direction', function ($join) {
                    $join->on('direction.d_id', '=', 't_tw.d_id');
                })
                ->leftjoin('users', function ($join) {
                    $join->on('users.user_id', '=', 't_tw.user_id');
                })
                ->leftjoin('comments',function($join){
                    $join->on('comments.t_id', '=', 't_tw.t_id');
                })
                ->groupby('t_tw.t_id')
                ->orderBy('num','desc')
                ->Paginate(5);
            return $pro;
        }
    }

    public function newest($is_look){
            //关注的话查看试题
        if(!empty($is_look)){
                //关注的话查看试题
            if(Session::get('uid')) {
                $uid = Session::get('uid');
                $guan = DB::table('house_direction')
                    ->where('user_id',$uid)
                    ->get();
                if($guan==array('')){
                    $arr=array();
                }else{
                    $arr=array();
                        foreach($guan as $v){
                            $arr[]=$v['d_id'];
                        }
                    }}else{
                $arr=array();
                echo "<script>alert('请先登录'),location.href='wenda'</script>";die;
            }
        }
        /*查看显示关注与否*/
        if(isset($arr) && $arr!=array()) {
            $pro = DB::table('t_tw')
                ->join('direction', function ($join) {
                    $join->on('direction.d_id', '=', 't_tw.d_id');
                })
                ->join('users', function ($join) {
                    $join->on('users.user_id', '=', 't_tw.user_id');
                })
                ->whereIn('t_tw.d_id',$arr)
                ->orderBy('t_tw.add_time', 'desc')
                ->Paginate(5);
            return $pro;
        }else{
            $pro = DB::table('t_tw')
                ->join('direction', function ($join) {
                    $join->on('direction.d_id', '=', 't_tw.d_id');
                })
                ->join('users', function ($join) {
                    $join->on('users.user_id', '=', 't_tw.user_id');
                })
                ->orderBy('t_tw.add_time', 'desc')
                ->Paginate(5);
            return $pro;
        }
    }

    //等待回答
    public function wait_reply($is_look){
        //关注的话查看试题
        if(!empty($is_look)){
            //关注的话查看试题
            if(Session::get('uid')) {
                $uid = Session::get('uid');
                $guan = DB::table('house_direction')
                    ->where('user_id',$uid)
                    ->get();
                if($guan==array('')){
                    $arr=array();
                }else{
                    $arr=array();
                    foreach($guan as $v){
                        $arr[]=$v['d_id'];
                    }
                }}else{
                $arr=array();
                echo "<script>alert('请先登录'),location.href='wenda'</script>";die;
            }
        }
        if(isset($arr) && $arr!=array()){
            $pro = DB::table('t_tw')
                ->select('*', DB::raw("count(comments.com_id) as num"), 't_tw.t_id')
                ->leftjoin('direction', function ($join) {
                    $join->on('direction.d_id', '=', 't_tw.d_id');
                })
                ->leftjoin('users', function ($join) {
                    $join->on('users.user_id', '=', 't_tw.user_id');
                })
                ->leftjoin('comments', function ($join) {
                    $join->on('comments.t_id', '=', 't_tw.t_id');
                })
                ->whereIn('t_tw.d_id',$arr)
                ->groupby('t_tw.t_id')
                ->havingRaw('count(comments.com_id)=0')
                ->Paginate(5);
            return $pro;
        }else{
            $pro = DB::table('t_tw')
                ->select('*', DB::raw("count(comments.com_id) as num"),'t_tw.t_id')
                ->leftjoin('direction', function ($join) {
                    $join->on('direction.d_id', '=', 't_tw.d_id');
                })
                ->leftjoin('users', function ($join) {
                    $join->on('users.user_id', '=', 't_tw.user_id');
                })
                ->leftjoin('comments', function ($join) {
                    $join->on('comments.t_id', '=', 't_tw.t_id');
                })
                ->groupby('t_tw.t_id')
                ->havingRaw('count(comments.com_id)=0')
                ->Paginate(5);
            return $pro;
        }
    }

    //推荐分类展示
    public function Sort(){
        $pro = DB::table("direction")
            ->select("*",DB::raw("count(house_direction.user_id) as G"))
            ->join("house_direction",'direction.d_id','=','house_direction.d_id')
            ->groupBy("direction.d_name")
            ->orderBy("G","desc")
            ->limit(5)
            ->get();
        return $pro;
    }

    public function Focus($data){
        $uid = Session::get('uid');
        //$arr = DB::insert("insert into house_wenda(user_id,tid) values('$uid','$data')");
        $datas = DB::table('house_wenda')
            ->where("user_id",$uid)
            ->where("tid",$data)
            ->get();
        if($datas){
            $arr = array(
                "msg"=>"no",
                "error"=>1
            );
            return $arr;
        }else{
            $arr = DB::table("house_wenda")
                ->insert([
                    'user_id'=>$uid,
                    'tid'=>$data
                ]);
            if($arr){
                $arr = array(
                    "msg"=>"ok",
                    "error"=>0
                );
                return $arr;
            }else{
                $arr = array(
                    "msg"=>"no",
                    "error"=>1
                );
                return $arr;
            }
        }
    }

    //一周雷锋榜
    public function weekday()
    {
        $honor = DB::select("
            select user_name,user_filedir,count(comments_replay.user_id) as C,users.user_id,num  from
            comments_replay join users on comments_replay.user_id = users.user_id
            LEFT JOIN (SELECT *,COUNT(*) num from house_direction GROUP BY user_id ) b on b.user_id=users.user_id
            group by comments_replay.user_id order by count(comments_replay.user_id) desc limit 10
            ");
        return $honor;
    }
    public function sels(){
        //$users = DB::table('t_tw')->distinct()->get();
        $users = DB::table('t_tw')
            ->join('direction', 't_tw.d_id', '=', 'dirction.d_id')
            ->join('users', 'users.user_id', '=', 't_tw.user_id')
            ->get();
        return $users;
    }
    //direction
    public function get_direction(){
        $pro=DB::table('direction')->get();
        return $pro;
    }

    /*
     * 答疑详情页展示功能 / 点赞+评论+回复
     */
    public function detail($id){

        //查询题目
        $arr=DB::select("select * from t_tw where t_id='$id'");

        //查询提问人
        $arr_user=DB::table('t_tw')->leftjoin('users','users.user_id','=','t_tw.user_id')->where("t_tw.t_id",$id)->first();

        //查询回答的人数及点赞的人数
        $arr1 = DB::table('comments')
            ->join('users', 'users.user_id', '=', 'comments.user_id')
            ->select('*')
            ->where('comments.t_id',$id)
            ->get();
        $arr2 = DB::table('comments')
            ->leftjoin('comments_replay','comments.com_id', '=','comments_replay.com_id')
            ->select('comments_replay.status','comments_replay.com_id','comments_replay.user_id')
            ->where('comments.t_id',$id)
            ->where('status','!=','0')
            ->get();
        //处理数据
        foreach($arr1 as $k=>$v){
            foreach($arr2 as $ke=>$val){
                if($val['com_id']==$v['com_id']){
                    $arr1[$k]['agree'][]=$val;
                }
            }
            $arr1[$k]['is_agree']='';
        }
        //return $arr1;
        //判断用户session是否有值
        if(Session::get('uid')){
            $u_id=Session::get('uid');
            //查询登录人头像
            foreach($arr1 as $key=>$v){
                if(isset($v['agree'])){
                    foreach($v['agree'] as $k=>$va){
                        if($va['user_id']==$u_id){
                            $arr1[$key]['is_agree']=$va['status'];
                        }
                    }
                }
            }
            $arr['user']=DB::table('users')->select('user_name')->where("user_id",$u_id)->first();
        }

        $d_id = $arr[0]['d_id'];
        $t_id = $arr[0]['t_id'];
        //查询相关问题 回答数
        $xiangguan = DB::select(
            "select t_tw.t_id,t_tw.t_title,count(comments.user_id) as S from t_tw
            join comments on comments.t_id = t_tw.t_id
            where t_tw.d_id = $d_id and t_tw.t_id!=$t_id
            GROUP BY comments.user_id
            order by count(comments.user_id) desc limit 10"
        );
        //查询相关分类
        $type = DB::table('direction')->get();
        $ti = DB::table('t_tw')
            ->select("*",DB::raw("count(comments.user_id) as C"),DB::raw("count(house_direction.user_id) as G"))
            ->join("direction",'t_tw.d_id','=','direction.d_id')
            ->join("comments","t_tw.t_id","=","comments.t_id")
            ->join("house_direction","house_direction.d_id","=","t_tw.d_id")
            ->where("t_tw.t_id","!=",$t_id)
            ->groupBy('t_tw.d_id')
            ->orderBy('t_tw.add_time')
            ->limit(5)
            ->get();
        if(Session::get("username")){
            $fei_num = count($type);
            $fenlei = DB::table("house_direction")->where(['user_id' => $u_id,])->get();
            foreach($fenlei as $v){
                $fen[]=$v['d_id'];
            }
            if(isset($fen)){
                foreach($ti as $k=>$v){
                    if(in_array($v['d_id'],$fen)){
                        $ti[$k]['is_guan']='1';
                    }else{
                        $ti[$k]['is_guan']='0';
                    }
                }
            }else{
                foreach($ti as $k=>$v){
                    $ti[$k]['is_guan']='0';
                }
            }
        }
        $data['arr']=$arr;
        $data['arr1']=$arr1;
        $data['arr_user']=$arr_user;
        $data['xingguan']=$xiangguan;
        $data['ti']=$ti;
        return $data;

    }

    /*
     * 点赞功能  2016 -08 -17 10:13
     */
    public function agree($agree,$com_id,$user_id){
        $result = DB::table('comments_replay')->where(['com_id' => $com_id, 'user_id' => $user_id])->first();
        if ($result != array()) {
            $up = DB::table('comments_replay')->where(['com_id' => $com_id, 'user_id' => $user_id])->update(['status' => $agree]);
            if ($up) {
                if($result['status']==0){
                    return 4;die;//原状态为0修改后总数加1
                }else{
                    if($agree==0){
                        return 5;die;//原状态不为0 要修改为0 修改后总数减1
                    }else{
                        return 2;die;//原状态为不为0 切不是修改为0 总数不变
                    }
                }
            } else {
                return 3;die;/*修改失败没变化*/
            }
        } else {
            $arr = array('status' => $agree, 'com_id' => $com_id,'user_id' => $user_id);
            $insert = DB::table('comments_replay')->insert($arr);
            if ($insert) {
                //回复加总数1
                return 4;die;
            } else {
                return 3;die;/*修改失败没变化*/
            }
        }

    }

    //查询是否有收藏
    public function is_house($id)
    {
        $u_id=Session::get('uid');
        $data = DB::table("house_wenda")->where(['user_id' => $u_id, 'tid' => $id])->get();
        return $data;
    }

}

