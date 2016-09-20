<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\User;
use Monolog\Handler\ZendMonitorHandlerTest;
use Session,DB;
use App\Http\Requests;
class IcController extends Controller{
    public function __construct(){
        if(!Session::get('uid')){
            echo "<script>alert('请先登录');location.href='index'</script>";
        }
    }
    public function index(){
        //获取用户信息
        $id = Session::get("uid");
        $user = DB::table('users')
            ->join('userinfo','users.user_id','=','userinfo.u_id')
            ->leftjoin('career','users.user_job','=','career.c_id')
            ->select('u_name','c_career','user_filedir')
            ->where("user_id",$id)
            ->first();
        if(!$user){
            echo "<script>alert('请先实名认证个人信息');location.href='/user/attestation'</script>";
        }
        $User=new User();
        header("content-type:text/html;charset=utf8");
        $arr=$User->sel_one();
        $ic=DB::table('ic')
            ->leftjoin('userinfo','ic.u_id','=','userinfo.u_id')
            ->where(DB::raw("date_format(time,'%Y-%m-%d')"),date('Y-m-d'))
            ->select('userinfo.u_name','ic.company_address',DB::raw("date_format(ic.time,'%Y-%m-%d %H:%i') as times"),'ic.company')
            ->orderBy('times')
            ->get();
//        print_r($ic);die;
        return view('ic/index',['ic'=>$ic,'user'=>$user,'arr'=>$arr]);
    }
    public function mid(Request $request){
        $date=$request->input('date');
        $mouth=$request->input('mouth');
        $year=$request->input('year');
//        echo $year.'-'.str_pad($mouth,2,0,STR_PAD_LEFT).'-'.$date;
//        echo '<br/>';
//        echo date('Y-m-d');die;
        if($date&&$mouth&&$year){
            $ic=DB::table('ic')
                ->leftjoin('userinfo','ic.u_id','=','userinfo.u_id')
                ->where(DB::raw("date_format(time,'%Y-%m-%d')"),$year.'-'.str_pad($mouth,2,0,STR_PAD_LEFT).'-'.$date)
                ->select('userinfo.u_name','ic.company_address',DB::raw("date_format(ic.time,'%Y-%m-%d %H:%i') as times"),'ic.company')
                ->orderBy('times')
                ->get();
            if($ic){
                $str1=<<<a
                <button style="cursor:pointer;background-color: #fcb6ff;" title="列表">列表</button>
                <button disabled="disabled" title="时间轴">时间轴</button>
                <section id="cd-timeline" class="cd-container">
a;
;
                $str2=<<<a
                <table>
                    <tr>
                        <th>姓名</th>
                        <th>班级</th>
                        <th>面试公司</th>
                        <th>面试时间</th>
                    </tr>
a;
                foreach($ic as $v){
                    $str1.=<<<a
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-picture">
                        <img src="time/images/cd-icon-location.svg" alt="Picture">
                    </div><!-- cd-timeline-img -->
                    <div class="cd-timeline-content">
                        <h5>{$v['u_name']}：</h5>
                        <p>{$v['company']}</p>
                        <span style="float: right">地址--{$v['company_address']}</span>
                        <span class="cd-date">　{$v['times']}　</span>
                    </div> <!-- cd-timeline-content -->
                </div>
a;
                    $str2.=<<<a
                    <tr>
                        <td style="width: 100px;">{$v['u_name']}</td>
                        <td style="width: 260px;">地址--{$v['company_address']}</td>
                        <td style="width: 200px;">{$v['company']}</td>
                        <td style="width: 250px;">{$v['times']}</td>
                    </tr>
a;

                }
                $str1.='</section>';
                $str2.='</table>';
                echo $str1,$str2;
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
    }
}