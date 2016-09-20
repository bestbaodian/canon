<?php
namespace App\Http\Model;
use DB;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
/*
*招聘模块
*/
class program extends Model
{
   public function program()
   {
   	 $all = DB::table('position')->where("p_up_id",0)->get();
   	 foreach ($all as $key => $value) {
            $two = DB::table('position')->where("p_up_id",$value['p_id'])->get();
            
            foreach ($two as $k => $v) {
             $three = DB::table('position')->where("p_up_id",$v['p_id'])->get();
             $two[$k]['three']=$three;
            }
            $all[$key]['two']=$two;
        }
        return $all;
   }
   public function recruit1()
   {
	 $brr=DB::table('curls')->orderBy('id','desc')->paginate(10);
     return $brr;
   }
}
?>