<?php
//use Illuminate\Pagination\LengthAwarePaginator;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Model\Wenda;
use Session;

/**
 * Class WendaController
 * @package App\Http\Controllers
 */
class WendaController extends Controller
{
    public function wenda(){
        $mwenda=new Wenda();
        $pro=$mwenda->get_t_tw();
        return view('wenda/wenda',['pro'=>$pro]);
     }


    public function save(){
        //实例化问答model层
        $mwenda=new Wenda();
        header('Content-Type: text/html; charset=utf-8');
        $username=Session::get("username");
         //加载登录成功之后的头像
        $index = new Index();
        $data = $index ->head_scu();
        $dats = isset($data['user_filedir'])?$data['user_filedir']:"";
        if(empty($username)){
            echo "<script>alert('请先登录'),location.href='index'</script>";die;
        }else{
            $pro=$mwenda->get_direction();
         //显示各个学院
        return view('wenda/save',['pro'=>$pro,'picture'=>$dats]);
        }
        
    }
//提交提问功能
    public function tiwen(Request $request){
        $request = $request->all();
        $t_title=$request["title"];
        $t_content=$request["content"];
        $pro=$request['pro'];
        if(!isset($_SESSION)){
            session_start();
        }
        //$u_id=$_SESSION['username'];
        //var_dump($t_content);die;
        $u_id=Session::get("uid");
        //echo $u_id;die;
        $arr1=DB::insert("INSERT INTO t_tw(t_title,t_content,user_id,d_id) values('$t_title','$t_content','$u_id','$pro')");
         if($arr1){
            exit('1');
         }else{
            exit('0');
         } 
    }
    public function detail(Request $request){
        echo 123456;die;
        $id=$request->input("id");
        //$id = $_GET['id'];
        $arr=DB::select("select * from t_tw where t_id='$id'");
       // echo $id;die;
       //查询提问人
       $arr_user=DB::table('t_tw')->leftjoin('users','users.user_id','=','t_tw.user_id')->where("t_tw.t_id",$id)->first();
       // 评论问题
       //$arr_com=DB::table("comments")->leftjoin('users','users.user_id','=','comments.user_id')->leftjoin('t_tw','t_tw.t_id','=','t_tw.t_id')->where("comments.t_id",$id)->get();
       $arr_com=DB::select("select * from comments inner join users on users.user_id=comments.user_id inner join t_tw on t_tw.t_id=comments.t_id where comments.t_id=$id");
      // echo $a;die;
       //print_r($arr_com);die;
        return view('wenda/detail',['arr'=>$arr],['arr_com'=>$arr_com,'arr_user'=>$arr_user]);


    }
    public function hui(){
        //$username=$_SESSION['username'];
        $username='111';
        if(empty($username)){
            echo "<script>alert('请先登录');location.href='login/login';</script>";
        }else{
            $sql=DB::table('users')->where("user_name","$username")->first();
            //print_r($sql);die;
            $user_id=$sql['user_id'];
        }
        $con=$_POST['aa'];
        $tid=$_POST['tid'];
        $time=date("Y-m-d H:i:s");
        $sq="insert into comments(com_content,com_addtime,user_id,t_id) values('$con','$time','$user_id','$tid')";
        //echo $sq;
        $re=DB::insert($sq);
        $arr_com=DB::select("select * from comments inner join users on users.user_id=comments.user_id inner join t_tw on t_tw.t_id=comments.t_id where comments.t_id=$tid order by com_id desc");
        //print_r($arr_com);die; 
        return view('wenda/aa',['arr_com'=>$arr_com]);

    }


    // public function zid(){
    //         session_start();
    //         $zid=$_GET['name'];
    //         $id=$_SESSION['user_id'];
    //         $user = DB::table('dianzan')->where('user_id', $id)->first();
    //         //print_r($user); 
    //        if($user['z_id']!=$zid){
    //             $sq="insert into dianzan(z_id,user_id) values('$zid','$id')";
    //             $rr=DB::insert($sq);
    //             if($rr){
    //                 //$id=$_SESSION['user_id'];
    //                 //$sql="select z_id from z_u where user_id='$id'";
    //                 //$re=DB::select($sql);
    //                 //if(empty($re)){
    //                    // $sq="insert into z_u(z_id,user_id) vlues('$zid','$id')";
    //                    // $rr=DB::select($sq);
    //                     if($rr){
    //                         echo '1';
    //                     }
    //             }
    //         }
    //             else{
    //                 $sqp="delete from z_u where z_id='$zid' and user_id='$id'";
    //                 $rq=DB::delete($sqp);
    //                 if($rq){
    //                     echo '3';
    //                 }        
    //             }
               
    //     }

    
}