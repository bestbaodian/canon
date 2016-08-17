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
        return DB::table('shiti')->orderBy("click","desc")->limit(8)->get();
    }

}
