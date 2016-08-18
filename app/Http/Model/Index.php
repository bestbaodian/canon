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
    public function index()
    {
        return DB::table('college_questions')
            ->select("c_id","c_college","c_name","c_type","c_direction","c_num","c_answer")
            ->limit(8)->orderBy("c_num","desc")
            ->get();
    }

    /*
     * 制作人 :: 王浩东 2016-08-17 21:10
     */
    public function program()
    {
        $all = DB::table('position')->limit(8)->orderBy('p_id','asc')->get();
        return $all;
    }

}
