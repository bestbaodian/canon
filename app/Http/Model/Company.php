<?php
namespace APP\Http\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Session;
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
	public function shiti()
	{
		$exam = DB::table('shiti')->simplePaginate(9);
		return $exam;
	}
	//查看试题
	public function college_exam($id)
	{
		if(!empty($id))
		{
			$sql = "select click from shiti where s_id='$id'";
			$click=DB::select($sql);
			$click_1 =($click[0]['click'])+1;
			$upd = "update shiti set click='$click_1' where s_id='$id'";
			$upd_sav = DB::update($upd);
			//$id=session::get('id');
		 }
		//$id=session::get('id');
		//return $id;die;
		$count=DB::table('exam')->where('company_id',"$id")->count();
		if($count==0){
		 echo "<script>alert('暂无试题');location.href='company'</script>";
				}else{
		$data=DB::table('exam')->where('company_id',"$id")->paginate(1);
		return $data;
				     }
	}
} 
?>