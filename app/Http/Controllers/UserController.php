<?php

namespace App\Http\Controllers;
use App\Http\Model\User;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Mail;

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
        $Topclient->appkey ='23435932';
        $Topclient->secretKey = '115d3e752e61d4339c45b8a6551797ea';
        $req->setExtend("123456");
        $req->setSmsType("normal");
        $req->setSmsFreeSignName("宝典");
        //生成验证码
        $rand=rand(1000,9999);
        Session::put('rands', $rand);
        $req->setSmsParam("{\"name\":\"$rand\",\"verf\":\"$rand\"}");
        $req->setRecNum($phone);
        $req->setSmsTemplateCode("SMS_13190328");
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
        $confirm['confirm'];
        $phone=$confirm['phone'];
        if($confirm['confirm']!=$yan){
            $url = $request->url();
            echo "<script>alert('绑定失败');location.href='/user/setphone'</script>";
        }else{
            DB::update("update users set user_phone=$phone,user_phone_status = 1 where user_id = '$uid'");
            $url = $request->url();
            echo "<script>alert('绑定成功');location.href='/user/setphonestep'</script>";
        }

    }
    /*
     * !!邮箱验证
     */

    public function bangemail()
    {
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
       return view('user/setemail',['user'=>$user]);
    }

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

    //发送邮件验证用户邮箱唯一
    public function send_email(Request $request)
    {
        $email = $request->input('email');
        Session::put('email',$email);
        Session::put('email_rand',rand(10000,99999));
        $name = '面试宝典-绑定邮箱';
        $flag = Mail::send('user.send_email',['name'=>$name],function ($message){
            $to = Session::get('email');
            //$to = "2691246603@qq.com";
            $message ->to($to)->subject('面试宝典-绑定邮箱');
        });
        if($flag){
            $data = array(
                'msg'=>'ok',
                'error'=>'0',
                'result'=>'成功'
            );
            return json_encode($data);
        }else{
            $data = array(
                'msg'=>'no',
                'error'=>'1',
                'result'=>'失败'
            );
            return json_encode($data);
        }
    }

    /*
     *验证* 验证码是否正确
     */
    public function check_code(Request $request){
        $code = $request->input('code');
        $ses_code = Session::get('email_rand');
        if($code==$ses_code){
            $data = array(
                'msg'=>'ok',
                'error'=>'0',
                'result'=>'成功'
            );
            return json_encode($data);
        }else{
            $data = array(
                'msg'=>'no',
                'error'=>'1',
                'result'=>'失败'
            );
            return json_encode($data);
        }
    }

    /*
     * 我的收藏
     */
    public function my_house(){
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);

        //用户收藏信息查询
        $college_questions =$User->question_house($username);
        return view('user/my_house',['college_questions' => $college_questions,'user'=>$user]);
    }

    /*
     * 收藏文章
     */
    public function my_house_article(){
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);

        $article = $User->article_house($username);

        return view('user/my_house_article',['article' => $article,'user'=>$user]);

    }

    /*
     * 我的评价
     */
    public function my_ping(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(empty($_SESSION['username'])){
            return view('user/my_ping');
        }else {
            $user_name = $_SESSION['username'];
            $users = DB::table('users')->where("user_name", $user_name)->get();
            $user_id = $users[0]['user_id'];
            $shiti = DB::table('e_ping')
                ->join('users', 'e_ping.u_id', '=', 'users.user_id')
                ->join('college_questions', 'e_ping.e_id', '=', 'college_questions.c_id')
                ->select('c_name', 'c_answer')
                ->distinct('c_name')
                ->distinct('c_answer')
                ->where('users.user_id', $user_id)
                ->get();
            $shiti_ping = DB::table('e_ping')
                ->join('users', 'e_ping.u_id', '=', 'users.user_id')
                ->join('college_questions', 'e_ping.e_id', '=', 'college_questions.c_id')
                ->select('p_con')
                ->where('users.user_id', $user_id)
                ->get();
            //print_r($shiti_ping);die;
            //$shiti = array_unique($arr);
            //print_r($shiti);die;
            return view('user/my_ping', ['shiti' => $shiti,'shiti_ping' => $shiti_ping]);
        }
    }
    /*
     * 验证用户邮箱&验证码提交是否正确
     */
    public function sub_code(Request $request)
    {
        $email = $request->input('email');
        $code = $request->input('code');
        $ses_code = Session::get('email_rand');
        //验证*验证码是否正确
        if($code == $ses_code){
            $User = new User();
            $arr = $User->sub_code($email);
            $data = array(
                'msg'=>'ok',
                'error'=>'0',
                'result'=>'成功'
            );
            return json_encode($data);
        }else{
            $data = array(
                'msg'=>'no',
                'error'=>'1',
                'result'=>'失败'
            );
            return json_encode($data);
        }
    }
    /*
     * 签到
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
    /*
     * 面试资料
     */
    public function interview(Request $request){
        //获取用户session信息
        $username = Session::get("username");
        $User  =new  User();
        $user  =$User->setprofile($username);
        //获取用户面试信息
        $arr=$User->sel_one();
        return view('user/interview',['user'=>$user,'arr'=>$arr]);
    }
    public function addview(Request $request){
        //获取用户session信息
        $data=$request->all();
        $username = Session::get("username");
        $User  =new User();
        $user  =$User->setprofile($username);
        if(isset($data['id'])){
            $arr=$User->upd_one($data['id']);
            return view('user/addview',['user'=>$user,'arr'=>$arr]);
        }
        return view('user/addview',['user'=>$user]);
    }
    public function setview(Request $request){
        //获取用户session信息
        $data = $request->all();
        $User  =new  User();
        $user  =$User->add_inter($data);
        return view('user/interview',['user'=>$user]);
    }
    public function del_one(Request $request){
        $ic_id = $request->all();
        $User  =new  User();
        $user  =$User->del_one($ic_id['ic_id']);
        if($user==1){
            $username = Session::get("username");
            $User  =new  User();
            $user  =$User->setprofile($username);
            //获取用户面试信息
            $arr=$User->sel_one();
            return view('user/interview',['user'=>$user,'arr'=>$arr]);
        }else{
            echo 2;
        }
    }

    public function attestation(){
        $username = Session::get("username");
        $User  =new User();
        $user  =$User->attestation($username);
        $college=$User->sel_college();
        if(isset($user['cid'])&&!empty($user['cid'])){
            $class=$User->sel_class($user['cid']);
        }else{
            $class=[];
        }
        return view('user/attestation',['user'=>$user,'college'=>$college,'class'=>$class]);
    }
    public function setclass(Request $request){
        $id=$request->input('college');
        $User  =new User();
        $college=$User->sel_class($id);
        if(!empty($college)){
            echo json_encode($college);
        }else{
            echo 1;
        }
    }
    public function setmsg(Request $request){
        $data = $request->all();
        $User  =new  User();
        $User->sel_msg($data);
    }
}