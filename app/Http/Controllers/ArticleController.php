<?php

namespace App\Http\Controllers;
use DB;
use Session;
//use Illuminate\Http\Request;
use Request;
use App\Http\Model\Article;
use App\Http\Model\Index;
class ArticleController extends Controller
{
    //方法页面
    public function article(){
       //实例化Article
        $index = new Index();
        $datas = $index ->head_scu();
        $picture = isset($datas['user_filedir'])?$datas['user_filedir']:"";
        $articlemodel=new Article;
        $at_id=Request::input('at_id');
        $article_id=Request::input('article_id');
        print_r($article_id);
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
       $ses = Session::get('username');
        if(empty($ses)){
            $username=0;
        }else{
            $username=Session::get('username');
        }
        //$u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
        $u_id=$articlemodel->get_usersid($username);

       $u_id=$articlemodel->get_usersid($username);

        $u_id=$u_id['user_id'];
        foreach($article as $key=>$val){
            $arr=$articlemodel->get_article_zan($val);
            if($arr){
                $article[$key]['zan']="1";
            }else{
                $article[$key]['zan']="0";
            }
        }
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


    public function wxiang(){
        if(empty(Session::get('usernname'))){
            $username=0;
        }else{
            $username=Session::get('usernname');
        }
        $id=Request::input('id');
        $arr=DB::table("article")
            ->join("ar_type","article.a_type","=","ar_type.at_id")
            ->where("article.a_id",$id)->get();
       $aping=DB::table('aping')->join("users","aping.u_id","=","users.user_id")->join("article","aping.a_id","=","article.a_id")->orderBy("aping.ap_id","desc")->limit(3)->get();
       return view('article/wxiang',['arr'=>$arr[0],'username'=>$username,'aping'=>$aping]);
    }

    public function wping(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(empty($_SESSION['username'])){
            $username=0;
            $u_id=0;
        }else{
            $username=$_SESSION['username'];
            $u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
            $u_id=$u_id['user_id'];
        }
        echo $u_id;die;
        $a_id=$_POST['a_id'];
        $ping=$_POST['ping'];
        $sql="insert into aping(u_id,ap_con,a_id) values('$u_id','$ping','$a_id')";
        $re=DB::insert($sql);

        $aping=DB::table('aping')->join("users","aping.u_id","=","users.user_id")->join("article","aping.a_id","=","article.a_id")->orderBy("aping.ap_id","desc")->limit(3)->get();
        //print_r($aping);die;
        return json_encode($aping);
        //return view('article/aping',['aping'=>$aping]);
    }

}
