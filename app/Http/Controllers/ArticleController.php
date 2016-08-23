<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
//use Illuminate\Http\Request;
use Request;
use App\Http\Model\Article;
/*
*方法模块
*/
use App\Http\Model\Index;
/*
 * 方法模块
 * 展示文章
 *      对应文章评论
 *      点赞
 *          lhm
 */
class ArticleController extends Controller
{
    public function article(){

        //实例化Article model层

        $articlemodel=new Article();

        //接受用户get请求数据
        $data=Request::input();
        //查询ar_type表
        $at_type=$articlemodel->getar_type();
        //类型 最新 最热
        if($data){
            //有类型 最新
            $article=$articlemodel->select_article1($data);

        }else{
            //无类型  最新
            $article=$articlemodel->select_article();
            //print_r($article);
        }

        //print_r($article);die;
        /*
         * 推荐文章显示
         */
        $Recommend=$articlemodel->get_tiu();
        //达人排行版
        $daren=$articlemodel->get_daren();
        //print_r($daren);die;
        return view('article/article',['at_type'=>$at_type,'article'=>$article,'arr'=>$Recommend,'daren'=>$daren]);
    }

    /*
     * 发布文章功能
     */
    public function publish(){
        //查看是否登录
        $username=Session::get("username");
        if($username==""){
            echo "<script>alert('请先登录');location.href='/'</script>";
        }else{
            $at_type=DB::table('ar_type')->get();
            $a_lei=DB::table('a_lei')->get();
            return view('article/publish',['ar_type'=>$at_type,'a_lei'=>$a_lei]);
        }
    }
    
    /*
     * 发布文章
     * 添加数据库
     */
    public function add(){
        $a_title = Request::input('a_title');
        $a_type=Request::input('a_type');
        $a_con = Request::input('a_con');
        $a_addtime=date("Y-m-d H:i:s");
        $file = Request::file('a_logo');
        $array=Request::input('tag');
        $a_lei=implode(',', $array);
        //获取添加文章的用户id
        $a_adduser=Session::get("uid");
        $model=new article();
        $re=$model->add($a_title,$a_type,$a_con,$a_addtime,$file,$a_lei,$a_adduser);
        if($re==1){
            echo "<script>alert('正在审核,请稍后...');location.href='article';</script>";
        }else{
            echo "<script>alert('提交失败');location.href='publish';</script>";
        }
    }

    /*
     * 收藏文章功能
     */
    public function collect_article(){
        $article_id = Request::input('a_id');
        $user_id=Session::get("uid");
        //实例化model层
        $articlemodel=new Article();
        //查询是否有收藏
        $is_collect=$articlemodel->sel_collect($article_id,$user_id);
        if($is_collect){
            $arr=array(
                'msg'=>"has",
                'error'=>'0'
            );
            return json_encode($arr);
        }else{
            $add_collect=$articlemodel->add_collects($user_id,$article_id);
            if($add_collect){
                $arr=array(
                    'msg'=>"yes",
                    'error'=>'0'
                );
                return json_encode($arr);
            }else{
                $arr=array(
                    'msg'=>"no",
                    'error'=>'0'
                );
                return json_encode($arr);
            }
        }


    }



   /*
    * 对应文章点赞功能
    * */
    public function zan(){
        $article_id=Request::input('a_id');
        $u_id=Session::get("uid");
        //查询数据库是否点过赞
        $articlemodel=new Article();
        $zan_data=$articlemodel->get_zandata($u_id,$article_id);
        //若存在数据  提示已点赞
        if($zan_data){
            $arr=array(
                'msg'=>'has',
                'error'=>'1'
            );
            return json_encode($arr);
        }else{
            //点赞 添加数据库
            $add=$articlemodel->add_zandata($u_id,$article_id);
            return json_encode($add);
        }
    }

    /*
     * 查看文章相关类型
     */
    public function type(){
        $type=$_POST['type'];
        if($type=='0'){
            $type=DB::table('article')->get();
        }else{
            $type=DB::table('article')->where("a_type",$type)->get();
        }
        return view("article/type",['article'=>$type]);
    }

    /*
     * 显示用户发表的文章
     * 评论是先判断是否登录
     */

    public function wxiang(){
        header("content-type:text/html;charset=utf8");
        if(empty(Session::get('username'))){
            //$username=0;
            //article
            echo "<script>alert('请先登录');location.href='article'</script>";
        }else{
            $username=Session::get('usernname');
        }
        $id=Request::input('id');


        $model=new article();
        $u_id=Session::get('uid');
        $is_zan=$model->get_zandata($u_id,$id);
        //触发点击详情这个事件  浏览量就+1
        $model->add_articlenum($id);
        //查询这篇文章的所有评论
        $ping_data=$model->get_ping($id);
        //根据a_id两表联查article和ar_type表
        $arr=$model->join_artype($id);
        //查出该篇文章类型
        /*
         * 查询文章和评论内容
         */
        $aping=$model->join_users();
        //查ping_zan表里有没有用户点赞的信息
        $u_id=Session::get("uid");
        //判断用户有没有收藏该篇文章
        $is_collect=$model->sel_collect($id,$u_id);

        //查看该条文章有多少评论
        //$ping_num=$model->get_pingnum($id);,'ping_num'=>$ping_num
        /*
         * 作者热门文章
         */
        $hot=$model->get_re($id);

        //print_r($arr);die;

        //查出该篇文章的作者一共有多少文章和总浏览量
        return view('article/wxiang',['arr'=>$arr[0],'sum_yulan'=>$arr['yulan'],'typer'=>$arr['lei'],'username'=>$username,'aping'=>$aping,'ping_data'=>$ping_data,'pinghui','hot'=>$hot,'a_id'=>$id,'is_collect'=>$is_collect,'is_zan'=>$is_zan]);
    }
    /*
     * 显示对应文章相关内容
     * 实现评论功能
     */
    public function wping(){
        if(empty(Session::get('username'))){
            $username=0;
            $u_id=0;
        }else{
            $username=Session::get('username');
            //根据用户名查询用户表
            $model=new article();
            $arr=$model->zan($username);
            $u_id=$arr['user_id'];
        }
        //接收评论值和a_id
        $a_id=Request::input('a_id');
        $ap_con=Request::input('ap_con');
        $ap_addtime=date("Y-m-d H:i:s");
        //添加到用户评论表中aping
        $re=$model->insert_aping($u_id,$a_id,$ap_con,$ap_addtime);
        //判断是否评论成功
        return json_encode($re);
    }
    /*
     * 登录的用户赞文章的评论
     */
    public function zp(Request $request){
        $ap_id=Request::input('ap_id');
        //获取 本篇文章的id,登陆人的用户id, 若点赞ping_zan添加一条数据  若取消赞 则删除
        $u_id=Session::get("uid");
        $model=new Article();
        $u_z_p=$model->get_uzp($ap_id,$u_id);
        if($u_z_p==""){
            //该用户没有赞过这条评论,则添加
            $add_zan=$model->add_z($ap_id,$u_id);
            return json_encode($add_zan);
            //var_dump($add_zan);
        }else{
            //删除数据库
            $del_zan=$model->del_z($ap_id,$u_id);
            return json_encode($del_zan);
            //var_dump($del_zan);
        }
    }

    public function addhouse_article(){
        if(!isset($_SESSION)){
            session_start();
        }
        $c_id = $_POST['id'];
        //$user_name = Session::get('username');
        $user_name=$_SESSION['username'];
        $u_id=DB::table('users')->where("user_name","$user_name")->get();
        $u_id=$u_id[0]['user_id'];
        $arr = DB::insert("insert into house_article(user_id,article_id) values('$u_id','$c_id')");
        if($arr){
            return 1;
        }else{
            return 0;
        }
    }


    //取消收藏
    public function delhouse_article(){
        if(!isset($_SESSION)){
            session_start();
        }
        $c_id = $_POST['id'];
        //$user_name = Session::get('username');
        $user_name=$_SESSION['username'];
        $u_id=DB::table('users')->where("user_name","$user_name")->get();
        $u_id=$u_id[0]['user_id'];
        $arr = DB::delete("delete from house_article where user_id = '$u_id' and article_id = '$c_id'");
        if($arr){
            return 1;
        }else{
            return 0;
        }
    }
    //回复评论人的回复
    public function a_ping(){
        if(Session::get('username')==""){
            $username=0;
            $u_id=0;
        }else{
            $u_id = Session::get('uid');
        }
        $ap_id2 = Request::input('ap_id');
        $ping = Request::input('ping');
        $articleid = Request::input('articleid');
        $ap_id = substr($ap_id2,3);
        //echo $ap_id;die;
        $a_addtime = date("Y-m-d H:i:s",time());
        $sql="insert into a_ping(u_id,ap_cont,ap_id,article_addtime) values('$u_id','$ping','$ap_id','$a_addtime')";
        $re=DB::insert($sql);

        //实例化model
        $ph = new Article();
        $aping = $ph->get_ping($articleid);
        return view('article/a_ping', ['ping_data' => $aping]);
    }

}
