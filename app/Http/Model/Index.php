<?php

namespace App\Http\Model;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    /*
    * 制作人 :: 王浩东 2016-08-17 16:46
    */
    //查询试题信息
    public function index()
    {
        return DB::table('college_questions')
            ->select("c_id","c_college","c_name","c_type","c_direction","c_num","c_answer")
            ->limit(8)->orderBy("c_num","desc")
            ->get();
    }

    /*
     * 主页 显示招聘信息
     * 制作人 :: 王浩东 2016-08-17 21:10
     */
    public function program()
    {
        $all = DB::table('position')->limit(8)->orderBy('p_id','asc')->get();
        return $all;
    }
    /*
     * 主页方法内容显示
     * 显示文章内容
     * 制作人 ::王浩东 2016-08-18 20:12
     */
    public function article()
    {
        $arr = DB::table('article')
            ->join('ar_type','article.a_type','=','ar_type.at_id')
            ->where('article.a_state','!=','0')
            ->orderby('article.brows','DESC')
            ->get();
        return $arr;
    }
    public function lei(){
        $art = $this->article();

        foreach($art as $k=>$v)
        {
            $lei = explode(',',$v['a_lei']);
            $see[]  = DB::table('a_lei')
                ->select('al_id','al_name')
                ->whereIn('al_id',$lei)
                ->get();
        }

        return $see;
    }
}
