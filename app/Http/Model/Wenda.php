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
    //分页
    public function get_t_tw(){
        $pro=DB::table('t_tw')
            ->join('direction', function ($join) {
                $join->on('direction.d_id', '=', 't_tw.d_id');
            })
            ->join('users', function ($join) {
                $join->on('users.user_id', '=', 't_tw.user_id');
            })
            ->simplePaginate(5);
//        $users = DB::table('t_tw')->distinct()->get();
//        $data['pro']=$pro;
//        $data['users']=$users;
        return $pro;
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
        $data['arr']=$arr;
        $data['arr1']=$arr1;
        $data['arr_user']=$arr_user;

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

}

