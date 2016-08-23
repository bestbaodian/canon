<?php
/*
 *公司试题控制器
 *梁坤
 */
namespace App\Http\Controllers;
use DB;
use App\Http\Model\Company;
use Request;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;
/*
 * 简历管理 马天天
 */
class CompanyController extends Controller
{
	/*
	 * 简历模板展示
	 */
	public function index(){
        //$seachs=Request::input('seachs');
        //print_r($seachs);
        $model=new Company();
        if(empty($seachs))
        {
            $ra=$model->direction();
            $arr=$model->company();
            $exam=$model->gather1();
        }
        else
        {
            $exam=$model->gather($seachs);
        }

        return view('company/index',['arr'=>$arr,'re'=>$ra,'exam'=>$exam]);
	}

	/*
	 * 查看简历模板
	 */
	public function college_exam()
	{
		$id=Request::input('id');
        $model=new company();
		$data=$model->college_exam($id);
        return view('company/college_exam',['arr'=>$data]);
	}
}
 

