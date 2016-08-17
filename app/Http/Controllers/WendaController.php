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
        $username=Session::get("username");
         //加载登录成功之后的头像
        if(empty($username)){
            header("content-type:text/html;charset=utf8");
            echo '<script>alert("请先登录"),location.href="wenda"</script>';die;
        }else{
            $pro=$mwenda->get_direction();
         //显示各个学院
        return view('wenda/save',['pro'=>$pro]);
        }
        
    }
//提交提问功能
    public function tiwen(Request $request){
        $request = $request->all();
        $t_title=$request["title"];
        $t_content=$request["content"];
        $pro=$request['pro'];
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
    /*
     * 陈学卫 答疑详情页展示功能 / 点赞+评论+回复
     */
    public function detail(Request $request){
        //接受用户选择的数据
        $id = $request->get("id");
        $wenda = new Wenda();
        $data = $wenda->detail($id);
        return view('wenda/detail',['arr'=>$data['arr'],'arr_com'=>$data['arr1'],'arr_user'=>$data['arr_user']]);

    }
    public function hui(Request $request){
        $request = $request->all();
        $username=$request['user_name'];
        if(empty($username)){
            echo "<script>alert('请先登录');location.href='wenda';</script>";
        }else{
            $sql=DB::table('users')->select('user_id')->where("user_name","$username")->first();
//            print_r($sql);die;
            $user_id=$sql['user_id'];
        }
        $con=$request['account'];
        $tid=$request['tid'];
        $time=date("Y-m-d H:i:s");
        $sq="insert into comments(com_content,com_addtime,user_id,t_id) values('$con','$time','$user_id','$tid')";
        //执行添加
        $res=DB::insert($sq);
        //添加成功返回原路径
        if($res){
            $url=substr($request['url'],(strripos($request['url'],'/')+1));
            echo "<script>alert('成功');location.href='".$url."'</script>";
        }else{
            echo "评论失败";
        }
    }

    /*
     * 陈学卫 点赞功能  2016 -08 -17 10:13
     */
    public function agree(Request $request)
    {
        $agree = $request->get('status');
        $com_id = $request->get('com_id');
        $user_id = Session::get('uid');

        //实例化wendamodel
        $wenda = new Wenda();
        $data  = $wenda ->agree($agree,$com_id,$user_id);
        echo $data;

    }





    public function guanzhu(){
        return view('wenda/guanzhu');
    }
    /*
    显示有什么关注的类
    */
    public function follow(){
        $content = DB::table('direction')->get();
        //return view('wenda/wenda',['content'=>$content]);
    }
   
}