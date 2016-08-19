<?php

namespace App\Http\Controllers;
use App\Http\Model\User;
use Illuminate\Http\Request;
use DB;
use Session;

use App\Http\Model\Topclient;
use App\Http\Model\Resultset;
use App\Http\Model\Requestcheckutil;
use App\Http\Model\Toplogger;
use App\Http\Model\AlibabaAliqinFcSmsNumSendRequest;
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
    public function setavator(Request $request){
        //获取用户session信息

        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
        $data = $user[0]['user_filedir'];
        return view('user/setavator',['data'=>$data,'user'=>$user]);
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
                /*
                 * 设置用户头像字段入库
                 */
                $user_filedir = $destinationPath.$fileName;
                $sql = "update users set user_filedir = '$user_filedir' where user_id = '$uid'";
                $upd = DB::select($sql);

                /*
                 * 修改用户头像重新设置session
                 */
                $da  = DB::table('users')->select("user_filedir")->where("user_id",$uid)->first();
                Session::put('user_filedir',$da['user_filedir']);
                return redirect("user/setavator");
            }
        }
    }

    /*
     * 检测数据库密码是否一致
     */

    public function checkpwd(Request $request){
        $request=$request->all();
        $pwd=$request["oldpwd"];
        $muser=new User();
        $user_data=$muser->get_old($pwd);
        return json_encode($user_data);
    }

    /*
     * //修改数据库密码
     */
    public function updpwd(Request $request){
        $request=$request->all();
        $pwd=$request['newpass'];
        $muser=new User();
        $msg=$muser->gai_pwd($pwd);
        return json_encode($msg);

    }

    /*
     * 手机设置 2016-08-19
     * 手机号码验证绑定 :: 制作人::胡建
     */

    public function setphone(){
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
        return view('user/setphone',['user'=>$user]);
    }

    /*加载手机验证页面*/
    public function setphonestep(){
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
        return view('user/fyan',['user'=>$user]);
    }
    public function bang(Request $request){
        $phone=$request->get('phone');
        //print_r($phone);die;
        $Topclient = new Topclient();
        //print_r($Topclient);die;
        $ResultSet = new ResultSet();
        $RequestCheckUtil = new RequestCheckUtil();
        $TopLogger = new TopLogger();
        $req = new AlibabaAliqinFcSmsNumSendRequest();
        header("content-type:text/html;charset=utf8");
        $Topclient->appkey ='23427168';
        $Topclient->secretKey = '426fa158c141c68757396c4f57333ce0';
        $req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("一路狂跑");
        //生成验证码
        $rand=rand(1000,9999);
        Session::put('rands', $rand);
        $req->setSmsParam("{\"name\":\"小神\",\"verf\":\"$rand\"}");
        $req->setRecNum($phone);
        $req->setSmsTemplateCode("SMS_13010293");
        $resp = $Topclient->execute($req);
        var_dump($resp);

    }
    /*
     * 手机号绑定验证码验证
     */
    public function yanzheng(Request $request){
        $yan=Session::get('rands');
        $uid=Session::get('uid');
        $confirm=$request->input();
        //print_r($yan);die;
        $phone=$confirm['confirm'];
        if($confirm['confirm']!=$yan){
            echo "<script>alert('绑定失败')</script>";
            return redirect('user/setphone');
        }else{
            echo "<script>alert('绑定成功')</script>";
            return redirect('user/setphone');
            DB::update("update users set user_phone=$phone,user_phone_status = 1 where user_id = '$uid'");

        }

    }
    /*
     * !!邮箱验证
     */

    public function setverifyemail(){
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
        return view('user/setverifyemail',['user'=>$user]);
    }


    //修改密码
    public function setresetpwd(){
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
        return view('user/setresetpwd',['user'=>$user]);
    }


    //绑定账号
    public function setbindsns(){
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
        return view('user/setbindsns',['user'=>$user]);
    }



    /*
     * 签到
     * 制作人::张泽远
     * 2016-08-18
     */
    public function qiandao(Request $request){
        $uid=$request->get('uid');
        //echo $uid;die;
        $time=date("Y-m-d");
        glob($num = '1');
        glob($days = '1');
        glob($pond = '1');
        $arr=DB::select("select * from qiandao WHERE uid='$uid'");
        if (empty($arr[0]['qid'])) {
            //第一次签到
            $res=DB::insert("insert into qiandao (num,days,pond,ltime,uid) VALUES ('$num','$days','$pond','$time','$uid')");
            if ($res) {
                Session::put('user_pond',$pond);;
                $data[0]='签到成功，获得' . $pond . '积分';
                $data[1]=$pond;
                //echo '第一次签到成功';
                return json_encode($data);
                die;
            } else {
                $data[0]='签到失败，获得0积分';
                $data[1]=0;
                return json_encode($data);
                die;
            }
        } else {
            //第二次签到
            $arr=DB::select("select * from qiandao WHERE uid='$uid'");
            $ltime = $arr[0]['ltime'];
            $time = date("Y-m-d");
            $ctime = floor((strtotime($time) - strtotime($ltime)) / 86400);
            if ($ctime == 1) {
                //连续签到
                $nnum = $arr[0]['num'] + 1;
                $ndays = $arr[0]['days'] + 1;
                $npond = $arr[0]['pond'] + $arr[0]['days'] + 1;
                $nponds = $arr[0]['days'] + 1;
                $ntime = date("Y-m-d");
                $res=DB::update("update qiandao set num='$nnum',days='$ndays',pond='$npond',ltime='$ntime' where uid='$uid'");
                if ($res) {
                    Session::put('user_pond',$npond);
                    $data=array();
                    // echo '连续签到成功';
                    $data[0]='签到成功，获得' . $nponds . '积分';
                    $data[1]=$npond;
                    return json_encode($data);
                    die;
                } else {
                    $data[0]='签到失败，获得0积分';
                    $data[1]=0;
                    return json_encode($data);
                    die;
                }
            } else {
                if ($ctime == 0) {
                    $arr=DB::select("select * from qiandao WHERE uid='$uid'");
                    $npond = $arr[0]['pond'];
                    $data[0]='您今天已经签到';
                    $data[1]=$npond;
                    return json_encode($data);
                    die;
                } else {
                    //非连续签到
                    $nnum = $arr[0]['num'] + 1;
                    $ndays = 1;
                    $npond = $arr[0]['pond'] + 1;
                    $nponds = 1;
                    $ntime = date("Y-m-d");
                    $res=DB::update("update qiandao set num='$nnum',days='$ndays',pond='$npond',ltime='$ntime' where uid='$uid'");
                    if ($res) {
                        // echo '非连续签到成功';
                        Session::put('user_pond',$npond);
                        $data[0]='签到成功，获得' . $nponds . '积分';
                        $data[1]=$npond;
                        return json_encode($data);
                        die;
                    } else {
                        $data[0]='签到失败，获得0积分';
                        $data[1]=0;
                        return json_encode($data);
                        die;
                    }
                }
            }
        }
    }
}