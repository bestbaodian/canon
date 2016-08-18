<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>面试宝典网</title>
    <meta property="wb:webmaster" content="a1bbe2238ec72e87" /><meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta http-equiv="Cache-Control" content="no-transform ">
    <link rel = "Shortcut Icon" href=http://www.mbaodian.com/favicon.ico>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta name="Keywords" content="面试，面试宝典，面试技巧，面试经验，面试简历，简历下载，面试试题">
    <script src="../js/push.js"></script>
    <link rel="stylesheet" href="css/a.css" type="text/css">
    <script src="../js/jquery.js" async="" charset="utf-8"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="../static/css/ui2.css?2013032917">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->  <!---->
    </head>
<body id="index">
@extends('layouts.master')
@section('sidebar')
@parent
<div id="js-index-video" class="video-container">
    <div class="video-wrap" id="js-video-wrap">
        <div id="js-video"></div>
    </div>
    <div class="video-mask"></div>
    <div id="js-video-close" class="video-close"></div>
</div>

<div id="mooc-dynamic" class="dynamic bg-grey idx-minwidth" style=" margin-top:20px;">
    <div id="dynamic-wrap" class="dynamic-wrap idx-width">
        <div id="dynamic-left" class="dynamic-left"></div>
        <div id="dynamic-right" class="dynamic-right"></div>
        <ul class="dynamic-group clearfix">
            <li><a href="#">
                    <img class="scrollLoading" src="picture/zzzz.jpg" alt="手机APP">
                </a></li>
            <li><a href="#" target="_blank"><img  class="scrollLoading" src="picture/5677ae970001c70404000200.jpg" alt="苹果表"></a></li>
            <li><a href="#" target="_blank">
                    <img class="scrollLoading" src="picture/56a59f870001bd2e04000200.jpg" alt="前端学习计划"></a></li>
        </ul>

    </div>
</div>

<!--试题开始-->
<div class="icourse">
    <div class="incourse-wrap idx-width">
        <h2 class="icourse-title">试题</h2>
        <ul class="icourse-course clearfix">
            <?php foreach($shi as $k=>$v){?>
            <li>
                <a  href="college_exam?id=<?php echo $v['c_id']?>">
                    <div class="icourse-img">
                        <img class="scrollLoading" src="<?php
                        if($v['c_college']=="软工学院"){
                            echo "/images/logo/软工.jpg";
                        }elseif($v['c_college']=="移动通信学院"){
                            echo "/images/logo/移动.jpg";
                        }else if($v['c_college']=="云计算学院"){
                            echo  "/images/logo/云计算.jpg";
                        }elseif($v['c_college']=="高翻学院"){
                            echo  "/images/logo/高翻.jpg";
                        }elseif($v['c_college']=="国际经贸学院"){
                            echo  "/images/logo/经贸.jpg";
                        }elseif($v['c_college']=="建筑学院"){
                            echo  "/images/logo/建筑.jpg";
                        }elseif($v['c_college']=="游戏学院"){
                            echo  "/images/logo/游戏.jpg";
                        }elseif($v['c_college']=="网工学院"){
                            echo  "/images/logo/网工.jpg";
                        }elseif($v['c_college']=="传媒学院"){
                            echo  "/images/logo/传媒.jpg";
                        }?>" alt="">
                    </div>
                    <div class="icourse-intro clearfix">
                        <p>答案:{{$v['c_answer']}}</p>
                        <span class="l ">{{$v['c_type']}}</span>
                    </div>
                    <div class="icourse-tips clearfix">
                        <h2>{{$v['c_name']}}</h2>
                        <span class="l ">{{$v['c_college']}}</span>
                        <span class="r">{{$v['c_num']}}人学习</span>
                    </div>
                </a>
            </li>
                <?php } ?>
        </ul>
    </div>
</div>
<!--试题结束 -->

<!--招聘开始 -->
<div class="icourse">
    <div class="incourse-wrap idx-width">
        <h2 class="icourse-title">招聘</h2>
        <ul class="icourse-course clearfix">
            <?php foreach($pro as $k=>$v){?>
            <li>
                <a  href="college_exam?id=<?php echo $v['p_name']?>">
                    <div class="icourse-img">
                        <img class="scrollLoading" src="{{url("$v[img]")}}" alt="">
                    </div>
                    <div class="icourse-intro clearfix">
                        <p>:{{$v['p_name']}}</p>
                        <span class="l ">{{$v['p_name']}}</span>
                    </div>
                    <div class="icourse-tips clearfix">
                        <h2>{{$v['p_name']}}</h2>
                        <span class="l ">{{$v['p_name']}}</span>
                        <span class="r">{{$v['c_num'] or "暂无"}}人学习</span>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!--招聘结束 -->

<!--方法方法开始 -->

<!--面试方法结束 -->

<!--简历开始 -->

<!--简历介绍-->

<!--答疑开始 -->

{{--<!--答疑介绍-->--}}


<!--script-->
<SCRIPT src="../js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>


<!--图片异步加载-->
<script type="text/javascript" src="../js/jquery.lazyload.js"></script>
<script type="text/javascript" src="../js/jquery.scrollLoading.js"></script>
<script>
//图片异步加载
jQuery(document).ready(function($){
        //实现图片慢慢浮现出来的效果
            $("img").load(function () {
                //图片默认隐藏  
                $(this).hide();
                //使用fadeIn特效  
                //$(this).fadeIn("5000");
                $(this).stop().fadeIn("5000");
            });
            // 异步加载图片，实现逐屏加载图片
            $(".scrollLoading").scrollLoading(); 
});

  var flag=false;
    $('#username').blur(function(){
       // alert(123);
        var username=$(this).val();
        if(username=='') {
            $('#name_sp').html('用户名非空');
            //alert(123);
            flag=true;
            return flag;
        }else{
            $('#name_sp').html('');
            // alert(456);
            return flag;
        }
    })
    var emailflag=false;
    $('#email').blur(function(){
        var email=$("#email").val();
        var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if(reg.test(email)){
            // alert(123)
            $("#email_sp").html('')
            emailflag=true;
            return emailflag;
        }else{
            // alert(456)
            // alert(456)
            $("#email_sp").html('格式错误')
            return emailflag;
        }
    })
    var phoneflag=false;
    $("#phone").blur(function(){
        var phone=$("#phone").val();
        var reg = /^1\d{10}$/;
        if(reg.test(phone)){
            $("#phone_sp").html('')
            phoneflag=true;
            return phoneflag;
        }else{
            $("#phone_sp").html('格式错误');
            return phoneflag;
        }
    })
    function show(){
        if(this.aa.password.type='password'){
            box.innerHTML = "<input type='text' name='password'  value="+this.aa.password.value+">";
            box3.innerHTML = "<a href='javascript:void(0)' onclick='hid();'>隐藏密码</a>";
        }
    }
    function hid(){
        if(this.aa.password.type='text'){
            box.innerHTML = "<input type='password' name='password'  value="+this.aa.password.value+">";
            box3.innerHTML = "<a href='javascript:void(0)' onclick='show();'>显示密码</a>";
        }
    }
    $("#u_name").blur(function() {
        var u_name = $("#u_name").val();
        var token  = $("#token").val()
        var reg = /^1\d{10}$/;
        var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
            if (reg.test(u_name)) {
            // alert(u_name)
            $.post('name', {
                u_name: u_name
            }, function (data) {
                //alert(data)
                if (data == 1) {
                    $("#sp_name").html('<font color="#5ff137">√</font>')
                } else if (data == 2) {
                    $("#sp_name").html('<font color="#f00">×</font>')
                }
       })

        } else if (email_reg.test(u_name)) {
            $.post('email', {
                u_name: u_name
            }, function (data) {
                if (data == 1) {
                    $("#sp_name").html('<font color="#5ff137">√</font>')
                } else if (data == 2) {
                    $("#sp_name").html('<font color="#f00">×</font>')
                }
            })
        } else {
            $("#sp_name").html('格式错误')
        }
    })
    $("#password").blur(function() {
        var u_name = $("#u_name").val()
        var u_pwd = $("#password").val()
        var reg = /^1\d{10}$/;
        var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if (reg.test(u_name)) {
            $.ajax({
                url:"name_pwd",
                type:"post",
                async : false,
                data:{
                    u_name: u_name,
                    u_pwd: u_pwd
                },success:function(data){
                    if (data == 3) {
                        $("#sp_pwd").html('<font color="#5ff137">√</font>')
                    } else if (data == 4) {
                        $("#sp_pwd").html('<font color="#f00">×</font>');
                    }
                }
            })
        } else if (email_reg.test(u_name)) {
            $.post('email_pwd', {
                u_name: u_name,
                u_pwd: u_pwd
            }, function (data) {
                if (data == 3) {
                    $("#sp_pwd").html('<font color="#5ff137">√</font>')
                } else if (data == 4) {
                    $("#sp_pwd").html('<font color="#f00">×</font>');
                }
            })
        }
    })
    $("#sub").click(function(){
        var sp_name=$("#sp_name").html();
        var sp_pwd=$("#sp_pwd").html();
        var u_name=$("#u_name").val();
        var u_pwd=$("#password").val();
        if(sp_name=='<font color="#5ff137">√</font>' && sp_pwd=='<font color="#5ff137">√</font>'){
            var reg = /^1\d{10}$/;
            var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
            if (reg.test(u_name)) {
                $.post('name_deng',{
                    u_name:u_name,
                    u_pwd:u_pwd
                },function(data){
                    if(data==5){
                        alert('登陆成功');location.href='index';
                    }else if(data==6){
                        alert('登陆失败');location.href='login';
                    }
                })
            }else if(email_reg.test(u_name)){
                $.post('email_deng',{
                    u_name:u_name,
                    u_pwd:u_pwd
                },function(data){
                    if(data==5){
                        alert('登陆成功');location.href='index';
                    }else if(data==6){
                        alert('登陆失败');location.href='login';
                    }
                })
            }


        }else{
            alert("条件不成立");
        }
    })
</script>
</body>
@endsection
</html>
