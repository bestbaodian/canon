<?php
/*
 *招聘信息控制器
 *
 *马天天
 */
namespace App\Http\Controllers;
use DB;
use App\Http\Model\program;
use App\Http\Model\Index;
class ProgramController extends Controller
{
	/*
	 *招聘信息显示
	 */
    public function program(){
        $model=new program();
        $all = $model->program();
        $data = $model->recruit1();
        $index = new Index();
        $datas = $index ->head_scu();
        $picture = isset($datas['user_filedir'])?$datas['user_filedir']:"";
        return view('program/program',['all'=>$all,'data'=>$data,'picture'=>$picture]);
    }
   /*
     *根据职位查询信息
     */
    public function position(){
        $p_name=$_GET['p_name'];
        $arr = DB::table('recruit')->where('position_name',"$p_name")->get();
        return view('program/position',['data'=>$arr]);
    }



    /*
	 *招聘信息详情页面
	 */
    public function etc_sel(){
    	$id=$_GET['id'];
    	$data = DB::table('recruit')->where('r_id',"$id")->first();
    	return view('program/etc_sel',['arr'=>$data]);
    }



}