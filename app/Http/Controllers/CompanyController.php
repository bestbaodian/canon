<?php
/*
 *公司试题控制器
 *梁坤
 */
namespace App\Http\Controllers;
use DB;
use App\Http\Model\Company;
use App\Http\Model\Index;
use Request;
use Session;
class CompanyController extends Controller
{
	//公司列表
	public function index(){
        $index = new Index();
        $datas = $index ->head_scu();
        $picture = isset($datas['user_filedir'])?$datas['user_filedir']:"";
		$model=new Company();
        $ra=$model->direction();
        $arr=$model->company();
        $exam=$model->shiti();
       return view('company/index',['arr'=>$arr,'re'=>$ra,'exam'=>$exam,'picture'=>$picture]);
	}
	//根据专业查询试题
	public function college(){
		$name = $_GET['name'];
		$arr = DB::table('shiti')->where('direction_name',"$name")->simplePaginate(9);
		return view('company/college',['exam'=>$arr]);
	}
	//根据专业以及公司查询试题
	public function college_x(){
		$name_z = $_GET['name_z'];
		$name_x = $_GET['name_x'];
		if(empty($name_z)){
		$arr = DB::table('shiti')->where('company_name',"$name_x")->simplePaginate(9);
		}else{
		$arr = DB::table('shiti')->where('company_name',"$name_x")->where('direction_name',"$name_z")->simplePaginate(9);
		}
		return view('company/college_x',['exam'=>$arr]);
	}
	//查看试题
	public function college_exam()
	{
		$id=Request::input('id');
		$model=new company();
		$data=$model->college_exam($id);
		return view('company/college_exam',['arr'=>$data]);
	}
}
 

