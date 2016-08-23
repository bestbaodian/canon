<?php
namespace App\Http\Model;

use DB,Session;
use Illuminate\Database\Eloquent\Model;
/*
 *方法模块
 * model层  数据库操作
 * lhm
 * */
class Article extends Model
{
    /*
     * 查看所有文章类型
     * 添加文章时选择类型
     */
    public function getar_type()
    {
        $at_type = DB::table('ar_type')->get();
        return $at_type;
    }

    /*
     * 查询article内容
     * 针对文章类型 进行显示数据
     * 有文章类型 默认最新  显示文章
     */
    public function select_article1($data)
    {
        //$article=DB::select("select a_id,a_title,at_type,a_con,a_addtime,a_num from article left join ar_type on article.a_type=ar_type.at_id where article.a_type='$at_id' order by a_id desc");
        if($data['at_id']){
            if(isset($data['top'])){
                $article = DB::table('article')
                    ->join('users', 'article.a_adduser', '=', 'users.user_id')
                    ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
                    ->select('users.user_name', 'a_id', 'a_title', 'at_type', 'a_con', 'a_addtime', 'a_num', 'brows', 'a_pingnum')
                    ->where("article.a_type", $data['at_id'])
                    ->where("a_state", 1)
                    ->orderBy('brows', 'desc')
                    ->paginate(3);
                return $article;
            }
                $article = DB::table('article')
                    ->join('users', 'article.a_adduser', '=', 'users.user_id')
                    ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
                    ->select('users.user_name', 'a_id', 'a_title', 'at_type', 'a_con', 'a_addtime', 'a_num', 'brows', 'a_pingnum')
                    ->where("article.a_type", $data['at_id'])
                    ->where("a_state", 1)
                    ->orderBy('a_id', 'desc')
                    ->paginate(3);
                return $article;


        }else{
            if(isset($data['top'])){
                $article = DB::table('article')
                    ->join('users', 'article.a_adduser', '=', 'users.user_id')
                    ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
                    ->select('users.user_name', 'a_id', 'a_title', 'at_type', 'a_con', 'a_addtime', 'a_num', 'brows', 'a_pingnum')
                    ->where("a_state", 1)
                    ->orderBy('brows', 'desc')
                    ->paginate(3);
                return $article;
            }
            $article = DB::table('article')
                ->join('users', 'article.a_adduser', '=', 'users.user_id')
                ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
                ->select('users.user_name', 'a_id', 'a_title', 'at_type', 'a_con', 'a_addtime', 'a_num', 'brows', 'a_pingnum')
                ->where("a_state", 1)
                ->orderBy('a_id', 'desc')
                ->paginate(3);
            return $article;
        }

    }



    /*
     * 无类型  默认显示所有  最新文章
     */
    public function select_article()
    {
        //$article=DB::select("select a_id,a_title,at_type,a_con,a_addtime,a_num from article left join ar_type on article.a_type=ar_type.at_id order by a_id desc");
        $article = DB::table('article')
            ->join('users', 'article.a_adduser', '=', 'users.user_id')
            ->leftJoin('ar_type', 'article.a_type', '=', 'ar_type.at_id')
            ->select('users.user_name', 'a_id', 'a_title', 'at_type', 'a_con', 'a_addtime', 'a_num', 'brows', 'a_pingnum')
            ->where("a_state", 1)
            ->orderBy('a_id', 'desc')
            ->paginate(3);
        return $article;
    }


     /*
      * 查询文章浏览量最多的用户
      */
    public function get_daren(){
        $sql="select user_filedir,users.user_name,sum(brows) from article inner join users on article.a_adduser=users.user_id where article.a_state=1 GROUP BY article.a_adduser ORDER BY sum(brows) desc limit 10";
        $users=DB::select($sql);
        return $users;
    }
    /*
     * 点击文章详情  浏览量+1
     */
    public function add_articlenum($id)
    {
        DB::select("update article set brows=brows+1 where a_id='$id'");
    }

    /*
     * 得到userid
     */
    public function get_usersid($username)
    {
        $u_id = DB::table('users')->where("user_name", "$username")->orwhere("user_email", "$username")->first();
        return $u_id;
    }


    /*
     * 得到文章类型(所有)
     */
    public function get_a_lei()
    {
        $a_lei = DB::table('a_lei')->get();
        return $a_lei;
    }

    /*
     * 写文章
     * 得到数据传值 入库
     */
    public function add($a_title, $a_type, $a_con, $a_addtime, $file, $a_lei, $a_adduser)
    {
        $allowed_extensions = ["png", "jpg", "gif", "JPG"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only storage png, jpg or gif.'];
        }
        $destinationPath = 'storage/uploads/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10) . '.' . $extension;
        if ($file->move($destinationPath, $fileName)) {
            $a_logo = $destinationPath . $fileName;
            $res = DB::insert("insert into article(a_title,a_type,a_con,a_addtime,a_logo,a_lei,a_adduser) values('$a_title','$a_type','$a_con','$a_addtime','$a_logo','$a_lei','$a_adduser')");
            return $res;
        }
    }

    /*
     * 用户评论内容查询
     */
    public function users_article()
    {
        $aping = DB::table('aping')->join("users", "aping.u_id", "=", "users.user_id")->join("article", "aping.a_id", "=", "article.a_id")->orderBy("aping.ap_id", "desc")->limit(3)->get();
        return $aping;
    }
    /*
     * 点赞成功  添加数据
     */
    public function add_zandata($u_id,$article_id){
        $add_zdata=DB::table('article_zan')->insert(
            [
                'u_id' => $u_id,
                'article_id' => $article_id
            ]);
        if($add_zdata){
           //修改点赞数量
            $up_zannum = DB::select("update article set a_num = a_num+1 where a_id = $article_id");
                $arr=array(
                    'msg'=>'queryok',
                    'error'=>0
                );
                return $arr;
        }else{
            $arr=array(
                //已经添加过了
                'msg'=>'already has',
                'error'=>1
            );
            return $arr;
        }
    }
    /*
     * 文章详情页显示文章作者
     */
    public function get_user($id){
        $user = DB::table('users')->where('user_id', $id)->first();
        return $user;
    }


    /*
     * 点赞功能的实现
     */
    public function zan($username)
    {
        $brr = DB::table('users')->where("user_name", "$username")->first();
        return $brr;
    }

    /*
     * 文章点赞功能查询
     */
    public function get_zandata($u_id,$article_id){
        $zan_data = DB::table('article_zan')
            ->where(['u_id'=>$u_id,'article_id'=>$article_id])
            ->first();
        return $zan_data;
    }

    /*
     * 得到对应id查询相应文章
     */
    public function article($a_id)
    {
        $zan = DB::table('article')->where('a_id', $a_id)->first();
        return $zan;
    }

    /*
     * 点赞数量增加
     */
    public function insert_article($a_num, $a_id)
    {
        $aa = DB::insert("update article set a_num=$a_num where a_id=$a_id");
        return $aa;

    }

    /*
     * 没点过赞的人点赞成功
     */
    /*public function article_zan2($u_id, $a_id)
    {
        $a = DB::insert("insert into article_zan(u_id,article_id) values('$u_id','$a_id')");
        $arr = array(
            'msg' => '2',//点赞成功
            'error' => '0'
        );
        return $arr;
    }*/

    /*
     *用户评论 制作人::李慧敏
     */
    //根据a_id两表联查article和ar_type表
    public function join_artype($id)
    {
        $arr = DB::table("article")
            ->join("ar_type", "article.a_type", "=", "ar_type.at_id")
            ->join('users','article.a_adduser','=','users.user_id')
            ->where("article.a_id", $id)
            ->get();
        $lei2 = explode(',', $arr[0]['a_lei']);
        $lei = DB::table("a_lei")
            ->whereIn('al_id', $lei2)
            ->select("al_name")
            ->get();
        $user_id = $arr[0]['a_adduser'];
        $sql = "select count(*),sum(brows) from article where a_adduser='$user_id' and a_state=1";
        $dats=DB::select($sql);
        $arr['yulan']=$dats;

        $arr['lei'] = $lei;
        return $arr;
    }

    /*
     * 查出这篇文章的相关评论
     * 制作人::李慧敏 // 时庆庆 张峻玮
     */
    //->select('a_ping.article_id', 'a_ping.ap_cont', 'a_ping.u_id', 'a_ping.ap_id', 'a_ping.article_addtime', 'aping.ap_con', 'aping.a_id', 'aping.ap_addtime', 'users.user_name', 'users.user_filedir')

    public function get_ping($id)
    {
        $data = DB::table('aping')
            ->leftjoin('article', 'aping.a_id', '=', 'article.a_id')
            ->leftjoin('ping_zan', 'aping.ap_id', '=', 'ping_zan.ap_id')
            ->leftjoin('users','aping.u_id','=','users.user_id')
            ->select(
                'aping.ap_con',
                'aping.ap_addtime',
                'users.user_name',
                'users.user_filedir',
                'aping.ap_id',
                'ap_con',
                'aping.a_id',
                'ap_zannum',
                'ap_iszan',
                'ap_addtime',
                DB::raw('count(ping_zan.u_id) as count'), DB::raw('group_concat(ping_zan.u_id) as allid'))
            ->where('aping.a_id', $id)

            ->groupBy('aping.ap_id')
            ->get();
        foreach($data as $key=>$val){
            $por = DB::table('aping')
                ->join('a_ping','aping.ap_id','=','a_ping.ap_id')
                ->join('users','users.user_id','=','a_ping.u_id')
                ->where('aping.ap_id',$val['ap_id'])
                ->get();
            if(!empty($por))
            {
                $data[$key]['huifu']=$por;
            }
        }

        return $data;
    }
    /*
     * 收藏文章
     *是否有收藏
     * 添加数据库
     */
    public function sel_collect($article_id,$user_id){
        $is_collect = DB::table('house_article')
            ->where('article_id', $article_id)
            ->where('user_id', $user_id)
            ->first();
        return $is_collect;
    }
    public function add_collects($user_id,$article_id){
        $adds=DB::table('house_article')->insert(
            [
                'user_id' => $user_id,
                'article_id' => $article_id
            ]);
        return $adds;
    }

    /*
     * aping users联查 制作人::李慧敏
     */
    public function join_users()
    {
        $aping = DB::table('aping')->join("users", "aping.u_id", "=", "users.user_id")->join("article", "aping.a_id", "=", "article.a_id")->orderBy("aping.ap_id", "desc")->limit(3)->get();
        return $aping;
    }
    /*
     * 查出该篇文章的作者一共有多少文章和总浏览量
     */



    /*
     * 添加到用户评论表中aping
     */
    public function insert_aping($u_id, $a_id, $ap_con, $ap_addtime)
    {
        $sql = "insert into aping(u_id,ap_con,a_id,ap_addtime) values('$u_id','$ap_con','$a_id','$ap_addtime')";
        $re = DB::insert($sql);
        if ($re) {
            DB::select("update article set a_pingnum=a_pingnum+1 where a_id='$a_id'");
            $arr = array(
                "msg" => 'ok',
                "error" => '0'
            );
            return $arr;
        } else {
            $arr = array(
                "msg" => 'no',
                "error" => '1'
            );
            return $arr;
        }
    }

    /*
     * 文章详情页
     * 查看文章类型
     */


    /*
     * 查询用户是否对这条评论赞过
     */
    public function get_uzp($id, $u_id)
    {
        $data = DB::table('ping_zan')
            ->where('ap_id', $id)
            ->where("u_id", $u_id)
            ->first();
        return $data;
    }

    /*
     * 点赞  添加数据表
     */
    public function add_z($ap_id, $u_id)
    {
        $addz = DB::table('ping_zan')->insert(
            [
                'ap_id' => $ap_id,
                'u_id' => $u_id
            ]);
        //return $addz;
        if ($addz) {
            $arr = array(
                "msg" => '0',
                "error" => '0'
            );
            return $arr;
        } else {
            $arr = array(
                "msg" => '0',
                "error" => '1'
            );
            return $arr;
        }
    }

    /*
     * 点击取消赞  删除数据表
     */
    public function del_z($ap_id, $u_id)
    {
        $delz = DB::table('ping_zan')
            ->where('ap_id', $ap_id)
            ->where("u_id", $u_id)
            ->delete();
        //return $delz;
        if ($delz) {
            $arr = array(
                "msg" => '1',
                "error" => '0'
            );
            return $arr;
        } else {
            $arr = array(
                "msg" => '1',
                "error" => '1'
            );
            return $arr;
        }
    }

    /*
     * 查看该篇文章有多少评论
     */
    public function get_pingnum($id)
    {
        $ping_num = DB::table('aping')
            ->select('*')
            ->where('a_id', $id)
            ->count();
        return $ping_num;
    }

    /*
     * 方法推荐文章
     */
    public function get_tiu()
    {
        $arr = DB::table("article")
            ->join("ar_type", "a_type", "=", "at_id")
            ->join("users", "article.a_adduser", "=", "users.user_id")
            ->orderby("article.brows", "DESC")
            ->where("a_state", 1)
            ->limit(3)
            ->get();
        return $arr;
    }

    /*
         * 方法详情热门文章
         */
    public function get_re($id)
    {
        $uid = DB::table("article")->where("a_id", "$id")->get();
        $u_id = $uid[0]["a_adduser"];
        $arr = DB::table("article")
            ->join("ar_type", "a_type", "=", "at_id")
            ->where("a_adduser", "$u_id")
            ->where("a_id", "!=", "$id")
            ->where("a_state", 1)
            ->orderby("brows", "DESC")
            ->limit(3)
            ->get();
        return $arr;
    }

}
    
