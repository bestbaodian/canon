<?php

namespace App\Http\Controllers;
use DB;
use Session;
//use Illuminate\Http\Request;
use Request;
use App\Http\Model\Article;
/*
*方法模块
*/
use App\Http\Model\Index;
class ArticleController extends Controller
{
    public function article(){
       //实例化Article
        $index = new Index();
        $datas = $index ->head_scu();
        $picture = isset($datas['user_filedir'])?$datas['user_filedir']:"";
        //实例化model层
        $articlemodel=new Article();

        //接受用户get请求数据
        $at_id=Request::input('at_id');
        $article_id=Request::input('article_id');

        //print_r($article_id);
        //查询ar_type表
        $at_type=$articlemodel->getar_type();

        if($at_id!="")
        {
           $article=$articlemodel->select_article1($at_id);
        }
        else
        {
           $article=$articlemodel->select_article();
        }
        //die;
       $ses = Session::get('username');
        if(empty($ses)){
            $username=0;
        }else{
            $username=Session::get('username');
        }
        //$u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
        $u_id=$articlemodel->get_usersid($username);

        return view('article/article',['at_type'=>$at_type,'article'=>$article,'picture'=>$picture]);
    }


    public function publish(){
        $at_type=DB::table('ar_type')->get();
        $a_lei=DB::table('a_lei')->get();
       return view('article/publish',['ar_type'=>$at_type,'a_lei'=>$a_lei]);
    }
    
    //写文章
    public function add(){
        $a_title = Request::input('a_title');
        $a_type=Request::input('a_type');
        $a_con = Request::input('a_con');
        $a_addtime=date("Y-m-d H:i:s");
        $file = Request::file('a_logo');
        $array=Request::input('tag');
        $a_lei=implode(',', $array);
        $model=new article();
        $re=$model->add($a_title,$a_type,$a_con,$a_addtime,$file,$a_lei);  
        if($re==1){
              echo "<script>alert('提交成功');location.href='article';</script>";
            }else{
                echo "<script>alert('提交失败');location.href='publish';</script>";
            }
    }
   //用户点赞
    public function zan(){
        $a_id=Request::input('ids');
        if(empty(Session::get('username')))
        {
            echo 1;
        }else{
            $username=Session::get('username');
        }
        $model=new article();
        $brr=$model->zan($username);
        $u_id=$brr['user_id'];
        $arr=$model->article_zan($a_id,$u_id);
       if($arr)
        {
            $arr=$model->article($a_id);
            //提示您已经点赞
            echo 1;
        }
        else
        {
            $zan=$model->article($a_id);
            $nu=$zan['a_num'];
            $a_num=$nu+=1;
            $aa=$model->insert_article($a_num,$a_id);
            $a2=$model->article_zan2($u_id,$a_id);
            $zan=$model->article($a_id);
            echo 2;
        }
    }


    public function type(){
        $type=$_POST['type'];
        if($type=='0'){
            $type=DB::table('article')->get();
        }else{
            $type=DB::table('article')->where("a_type",$type)->get();
        }

        //print_r($type);die;
        return view("article/type",['article'=>$type]);
    }

    //显示用户发表的文章
    public function wxiang(){
        if(empty(Session::get('usernname'))){
            $username=0;
        }else{
            $username=Session::get('usernname');
        }
        $id=Request::input('id');
        $model=new article();
        //根据a_id两表联查article和ar_type表
        $arr=$model->join_artype($id);
        //aping users联查
        $aping=$model->join_users();
        //加载登录成功之后的头像
        $index = new Index();
        $data = $index ->head_scu();
        $dats = isset($data['user_filedir'])?$data['user_filedir']:"";
        //print_r($dats);die;

      return view('article/wxiang',['arr'=>$arr[0],'username'=>$username,'aping'=>$aping,'picture'=>$dats]);
    }
   //用户评论
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
        //添加到用户评论表中aping
        $re=$model->insert_aping($u_id,$a_id,$ap_con);
        //判断是否评论成功
        if($re)
        {
            //两表联查users和article
            $aping=$model->users_article();
            echo "true";
        }
        else
        {
            echo "false";
        }
    }

}
