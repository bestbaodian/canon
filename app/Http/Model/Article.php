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
            ->join('users', 'article.a_adduser', '=', 'users.user_id')
            ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
            ->select('users.user_name','a_id', 'a_title', 'at_type','a_con','a_addtime','a_num','brows','a_pingnum')
            ->where("article.a_type",$at_id)
            ->where("a_state",1)
            ->orderBy('a_id', 'desc')
            ->paginate(3);
        return $article;
    }
    public function select_article()
    {
       //$article=DB::select("select a_id,a_title,at_type,a_con,a_addtime,a_num from article left join ar_type on article.a_type=ar_type.at_id order by a_id desc");
        $article = DB::table('article')
            ->join('users', 'article.a_adduser', '=', 'users.user_id')
            ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
            ->select('users.user_name','a_id', 'a_title', 'at_type','a_con','a_addtime','a_num','brows','a_pingnum')
            ->where("a_state",1)
            ->orderBy('a_id', 'desc')
            ->paginate(3);
        return $article;
    }
    //点击文章详情  浏览量+1
    public function add_articlenum($id){
        DB::select("update article set brows=brows+1 where a_id='$id'");
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
    public function add($a_title,$a_type,$a_con,$a_addtime,$file,$a_lei,$a_adduser)
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
        if($file->move($destinationPath, $fileName)){
           $a_logo = $destinationPath.$fileName;
           $res=DB::insert("insert into article(a_title,a_type,a_con,a_addtime,a_logo,a_lei,a_adduser) values('$a_title','$a_type','$a_con','$a_addtime','$a_logo','$a_lei','$a_adduser')");
            return $res;
        }
    }
    //用户评论内容查询
    public function users_article(){
        $aping=DB::table('aping')->join("users","aping.u_id","=","users.user_id")->join("article","aping.a_id","=","article.a_id")->orderBy("aping.ap_id","desc")->limit(3)->get();
        return $aping;
    }
    //点赞功能的实现
    public function zan($username){
        $brr=DB::table('users')->where("user_name","$username")->first();
        return $brr;
    }
    public function article_zan($a_id,$u_id){
        $arr=DB::table('article_zan')->where("u_id",$u_id)->where("article_id",$a_id)->get();
        return $arr;
    }
    public function article($a_id){
        $zan=DB::table('article')->where('a_id',$a_id)->first();
        return $zan;
    }
    public function insert_article($a_num,$a_id){
        $aa=DB::insert("update article set a_num=$a_num where a_id=$a_id");
        return $aa;
    }
    public function article_zan2($u_id,$a_id){
        $a=DB::insert("insert into article_zan(u_id,article_id) values('$u_id','$a_id')");
        $arr=array(
            'msg'=>'2',//点赞成功
            'error'=>'0'
        );
        return $arr;
    }

    /*
     *用户评论 制作人::李慧敏
     */
    //根据a_id两表联查article和ar_type表
    public function join_artype($id)
    {
        $arr=DB::table("article")->join("ar_type","article.a_type","=","ar_type.at_id")->where("article.a_id",$id)->get();
        return $arr;
    }

    /*
     * 查出这篇文章的相关评论
     * 制作人::李慧敏
     */
    public function get_ping($id){
        $data=DB::table('aping')
            ->leftjoin('article', 'aping.a_id', '=', 'article.a_id')
            ->leftjoin('ping_zan','aping.ap_id','=','ping_zan.ap_id')
            ->select('aping.ap_id','ap_con','aping.a_id','ap_zannum','ap_iszan','ap_addtime',DB::raw('count(ping_zan.u_id) as count'),DB::raw('group_concat(ping_zan.u_id) as allid'))
            ->where('aping.a_id',$id)
            ->groupBy('aping.ap_id')
            ->paginate(3);
        return $data;
    }

    /*
     * aping users联查 制作人::李慧敏
     */
    public function join_users()
    {
        $aping=DB::table('aping')->join("users","aping.u_id","=","users.user_id")->join("article","aping.a_id","=","article.a_id")->orderBy("aping.ap_id","desc")->limit(3)->get();
        return $aping;
    }

    //添加到用户评论表中aping
    public function insert_aping($u_id,$a_id,$ap_con,$ap_addtime)
    {
        $sql="insert into aping(u_id,ap_con,a_id,ap_addtime) values('$u_id','$ap_con','$a_id','$ap_addtime')";
        $re=DB::insert($sql);
        if($re){
            DB::select("update article set a_pingnum=a_pingnum+1 where a_id='$a_id'");
            $arr=array(
                "msg"=>'ok',
                "error"=>'0'
            );
            return $arr;
        }else{
            $arr=array(
                "msg"=>'no',
                "error"=>'1'
            );
            return $arr;
        }
    }
    //
    //查询用户是否对这条评论赞过
    public function get_uzp($id,$u_id){
        $data = DB::table('ping_zan')
            ->where('ap_id',$id)
            ->where("u_id",$u_id)
            ->first();
        return $data;
    }
    //点赞  添加数据表
    public function add_z($ap_id,$u_id){
        $addz=DB::table('ping_zan')->insert(
            [
                'ap_id' => $ap_id,
                'u_id' => $u_id
            ]);
        //return $addz;
        if($addz){
            $arr=array(
                "msg"=>'0',
                "error"=>'0'
            );
            return $arr;
        }else{
            $arr=array(
                "msg"=>'0',
                "error"=>'1'
            );
            return $arr;
        }
    }

    //点击取消赞  删除数据表
    public function del_z($ap_id,$u_id){
        $delz=DB::table('ping_zan')
            ->where('ap_id', $ap_id)
            ->where("u_id",$u_id)
            ->delete();
        //return $delz;
        if($delz){
            $arr=array(
                "msg"=>'1',
                "error"=>'0'
            );
            return $arr;
        }else{
            $arr=array(
                "msg"=>'1',
                "error"=>'1'
            );
            return $arr;
        }
    }
    //查看该篇文章有多少评论
    public function get_pingnum($id){
        $ping_num = DB::table('aping')
            ->select('*')
            ->where('a_id', $id)
            ->count();
        return $ping_num;
    }

    /*
     * 方法推荐文章
     *制作人：王鹏飞
     */
    public function get_tiu(){
        $arr=DB::table("article")
            ->join("ar_type","a_type","=","at_id")
            ->join("users","article.a_adduser","=","users.user_id")
            ->orderby("article.brows","DESC")
            ->where("a_state",1)
            ->limit(3)
            ->get();
        return $arr;
    }

    /*
         * 方法详情热门文章
         *制作人：王鹏飞
         */
    public function get_re($id){
        $uid=DB::table("article")->where("a_id","$id")->get();
        $u_id=$uid[0]["a_adduser"];
        $arr=DB::table("article")
            ->join("ar_type","a_type","=","at_id")
            ->where("a_adduser","$u_id")
            ->where("a_id","!=","$id")
            ->where("a_state",1)
            ->orderby("brows","DESC")
            ->limit(3)
            ->get();
        return $arr;
    }

}
    
