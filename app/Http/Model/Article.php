<?php
namespace App\Http\Model;

use DB;
use Illuminate\Database\Eloquent\Model;
class Article extends Model{
    public function getar_type(){
        $at_type=DB::table('ar_type')->get();
        return $at_type;
    }
    //查询article内容
    public function select_article(){
        $article=DB::select("select a_id,a_title,at_type,a_con,a_addtime,a_num from article left join ar_type on article.a_type=ar_type.at_id order by a_id desc");
        return $article;
    }
    //得到userid
    public function get_usersid($username){
        $u_id=DB::table('users')->where("user_name","$username")->orwhere("user_email","$username")->first();
        return $u_id;
    }
    //article_zan
    public function get_article_zan($val){
        $arr=DB::table('article_zan')->where(["u_id"=>0,"article_id"=>$val['a_id']])->first();
        return $arr;
    }
    //a_lei
    public function get_a_lei(){
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
}