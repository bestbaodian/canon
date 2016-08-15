<?php
namespace App\Http\Model;

use DB;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    public function getar_type()
    {
        $at_type=DB::table('ar_type')->get();
        return $at_type;
    }
    //查询article内容
    public function select_article1($at_id)
    {
        //$article=DB::select("select a_id,a_title,at_type,a_con,a_addtime,a_num from article left join ar_type on article.a_type=ar_type.at_id where article.a_type='$at_id' order by a_id desc");
        /*
         * 针对文章类型 进行显示数据
         */
        $article = DB::table('article')
            ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
            ->select('a_id', 'a_title', 'at_type','a_con','a_addtime','a_num')
            ->where("article.a_type",$at_id)
            ->orderBy('a_id', 'desc')
            ->paginate(3);
        return $article;
    }
    public function select_article()
    {
       //$article=DB::select("select a_id,a_title,at_type,a_con,a_addtime,a_num from article left join ar_type on article.a_type=ar_type.at_id order by a_id desc");
        $article = DB::table('article')
            ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
            ->select('a_id', 'a_title', 'at_type','a_con','a_addtime','a_num')
            ->orderBy('a_id', 'desc')
            ->paginate(3);
        return $article;
    }

    //得到userid
    public function get_usersid($username)
    {
        $u_id=DB::table('users')->where("user_name","$username")->orwhere("user_email","$username")->first();
        return $u_id;
    }
    //article_zan
    public function get_article_zan($val)
    {
        $arr=DB::table('article_zan')->where(["u_id"=>0,"article_id"=>$val['a_id']])->first();
        return $arr;
    }
    //a_lei
    public function get_a_lei()
    {
        $a_lei=DB::table('a_lei')->get();
        return $a_lei;
    }
    //写文章
    public function add($a_title,$a_type,$a_con,$a_addtime,$file,$a_lei)
    {
        $allowed_extensions = ["png", "jpg", "gif","JPG"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) 
        {
            return ['error' => 'You may only storage png, jpg or gif.'];
        }
        $destinationPath = 'storage/uploads/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        //print_r($fileName);die;
        if($file->move($destinationPath, $fileName))
        {
           $a_logo = $destinationPath.$fileName;
           $res=DB::insert("insert into article(a_title,a_type,a_con,a_addtime,a_logo,a_lei) values('$a_title','$a_type','$a_con','$a_addtime','$a_logo','$a_lei')");
            return $res;
        }

    }
    
     //点赞功能的实现
    public function zan($username)
    {
        $brr=DB::table('users')->where("user_name","$username")->first();
        return $brr;
    }
    public function article_zan($a_id,$u_id)
    {
        $arr=DB::table('article_zan')->where("u_id",$u_id)->where("article_id",$a_id)->get();
        return $arr;
    }
    public function article($a_id)
    {
        $zan=DB::table('article')->where('a_id',$a_id)->first();
        return $zan;
    }
    public function insert_article($a_num,$a_id)
    {
        $aa=DB::insert("update article set a_num=$a_num where a_id=$a_id");
        return $aa;
    }
    public function article_zan2($u_id,$a_id)
    {
        $a=DB::insert("insert into article_zan(u_id,article_id) values('$u_id','$a_id')");
        return $a;
    }

    /*
    *用户评论
    */
    //根据a_id两表联查article和ar_type表
    public function join_artype($id)
    {
        $arr=DB::table("article")->join("ar_type","article.a_type","=","ar_type.at_id")->where("article.a_id",$id)->get();
        return $arr;
    }
   //aping users联查
    public function join_users()
    {
        $aping=DB::table('aping')->join("users","aping.u_id","=","users.user_id")->join("article","aping.a_id","=","article.a_id")->orderBy("aping.ap_id","desc")->limit(3)->get();
        return $aping;
    }
    //添加到用户评论表中aping
       public function insert_aping($u_id,$a_id,$ap_con)
       {
         $sql="insert into aping(u_id,ap_con,a_id) values('$u_id','$ap_con','$a_id')";
         $re=DB::insert($sql);
         return $re;
       }
    //
       public function users_article()
       {
         $aping=DB::table('aping')->join("users","aping.u_id","=","users.user_id")->join("article","aping.a_id","=","article.a_id")->orderBy("aping.ap_id","desc")->limit(3)->get();
         return $aping;
     }
       


}
    
