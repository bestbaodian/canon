<?php
namespace APP\Http\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Session;
/*
*简历模块
*/
class Company extends Model{
	public function direction()
	{
		$re = "select * from direction";
		$ra = DB::select($re);
		return $ra;
	}
	public function company()
	{
		$sql = "select * from company";
		$arr = DB::select($sql);
		return $arr;
	}
    //查询简历表
	public function gather()
	{
		$exam = DB::table('gather')->simplePaginate(9);
		return $exam;
	}
	//查看试题
	public function college_exam($id)
	{
		if(!empty($id))
		{
			$data=DB::table('gather')->where('g_id',$id)->first();
			$g_click =($data['g_click'])+1;
			//修改点击量
            $click=DB::table('gather')
                ->where('g_id', $id)
                ->update(['g_click' => $g_click]);
		 }
		//$id=session::get('id');
		//return $id;die;
//		$count=DB::table('exam')->where('company_id',"$id")->count();
//		if($count==0){
//		 echo "<script>alert('暂无试题');location.href='company'</script>";
//				}else{
//		$data=DB::table('exam')->where('company_id',"$id")->paginate(1);
		return $data;
				     //}
	}
} 
?>