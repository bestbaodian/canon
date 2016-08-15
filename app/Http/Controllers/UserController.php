<?php

namespace App\Http\Controllers;
use App\Http\Model\User;
use Illuminate\Http\Request;
use DB;
use Session;
/*
 * user控制器
 * 管理用户个人中心
 * lhm
 */
class UserController extends Controller
{
    //个人资料
    public function setprofile(){
        $username = Session::get("username");
        $User  =new  User();

        $user  =$User->setprofile($username);
        //查询职业
        $career=$User->get_career();

        //地区
        $district=$User->get_region();
        //查询用户库中的城市
        $city = $User -> city();
        $arr = array(array("region_id"=>0,"region_name"=>"选择省份"),array("region_id"=>0,"region_name"=>"选择城市"),array("region_id"=>0,"region_name"=>"选择区县"));
        //如果用户没有设置地址就默认选择
        if(empty($city)){
            $city = $arr;
        }
        return view('user/setprofile',['user'=>$user,'career'=>$career,'first'=>$district,'city'=>$city]);
    }


    //获取省信息
    public function getprovince(Request $request){
        $region_id=$request['id'];
        //根据parent_id查对应省份
        $region=new User();
        $provinces=$region->get_province($region_id);
        //print_r($provinces);die
        $data=json_encode($provinces);
        return $data;
    }


    //修改个人资料
    public function updprofile(Request $request){
        $arr=$request->all();
        $pro=new User();
        $msg=$pro->re_profile($arr);
        return $msg;
    }


    //头像设置
    public function setavator(){
        //获取用户session信息
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
        $data = $user[0]['user_filedir'];
        return view('user/setavator',['data'=>$data]);
    }
    //头像上传
    public function postpic(Request $request){
        $datas = $request->file();
        if(empty($datas)){
            return redirect("user/setavator");
        }else{
            $a_addtime=date("Y-m-d H:i:s");
            $file = $request->file('fileField');
            $allowed_extensions = ["png", "jpg", "gif","JPG"];
            //如果上传出错,返回错误信息
            if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions))
            {
                return ['error' => 'You may only storage png, jpg or gif.'];
            }
            $destinationPath = 'picture/';
            //获取图片后缀名
            $extension = $file->getClientOriginalExtension();
            //设置图片名称

            $uid=Session::get("uid");
            $username=Session::get("username");
            $code=md5($uid.$username);
            $fileName = $code.'.'.$extension;
            //print_r($fileName);die;

            if($file->move($destinationPath, $fileName))
            {
                //设置用户头像字段入库
                $user_filedir = $destinationPath.$fileName;
                $sql = "update users set user_filedir = '$user_filedir' where user_id = '$uid'";
                $upd = DB::select($sql);
                redirect("user/setavator");

            }
        }
    }


    //手机设置
    public function setphone(){
        return view('user/setphone');
    }


    //邮箱验证
    public function setverifyemail(){
        return view('user/setverifyemail');
    }


    //修改密码
    public function setresetpwd(){
        return view('user/setresetpwd');
    }


    //绑定账号
    public function setbindsns(){
        return view('user/setbindsns');
    }
}