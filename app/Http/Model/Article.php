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
        $article=DB::select("select * from article left join ar_type on article.a_id=ar_type.at_id order by a_id desc");
        return $article;
    }
    //得到userid
    public function get_usersid($username){
        $u_id=DB::table('users')->where("user_phone","$username")->orwhere("user_email","$username")->first();
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
}