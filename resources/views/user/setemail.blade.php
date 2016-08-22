<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>面试宝典</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="keywords" content="面试宝典网，面试宝典官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
<meta name="description" content="慕课网（IMOOC）是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
<link rel="stylesheet" href="/css/base.css" type="text/css" />
<link rel="stylesheet" href="/css/common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/login-regist.css" type="text/css" />
<link rel="stylesheet" href="/css/settings.css" type="text/css" />
<link rel="stylesheet" href="/css/user-common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/avtou-less.css" type="text/css" />
<link rel="stylesheet" href="/css/layer.css" type="text/css" />
    <script src="/js/jquery-1.9.1.min.js"></script>
</head>
<body >
@extends('layouts.master')
@section('sidebar')
@parent
<div id="main">

<div class="settings-cont clearfix">

    @include('layouts.menu')

  <div class="setting-right">
    <div class="setting-right-wrap wrap-boxes settings" >

<div class="pwd-reset-wrap setting-resetpwd">
    {{--<form id="resetpwdform" method="post">--}}
    @if($user[0]['user_email_status']==1)
    <div style="margin-left:130px;">
        <p class="rlf-tip-wrap" style="color: red;">已绑定</p>
        <p class="rlf-tip-wrap">可用邮箱加密码登录面试宝典，可用邮箱找回密码</p>
    </div>
    @endif
        <div class="wlfg-wrap">
            <label for="" class="label-name">当前邮箱</label>
            <div class="rlf-group">
                @if($user[0]['user_email_status']==0)
                <input type="email" placeholder="请输入邮箱" style="width:345px;" id="email" value="{{$user[0]['user_email'] or "" }}" required="required" class="rlf-input rlf-input-pwd rlf-field-error">
                <p class="rlf-tip-wrap rlf-tip-error"></p>
            </div>
        </div>
        <div class="wlfg-wrap">
            <label for="confirm" class="label-name" >验证码</label>
            <div class="rlf-group">
                <input type="text" style="width:345px;" placeholder="请输入验证码" class="rlf-input rlf-input-pwd" id="code" ><span id="ch_pwd2" style="float:right;line-height:40px;"></span>

                <p class="rlf-tip-wrap"></p>

                <span class="rlf-btn-gray btn-block"  hidefocus="true" id="huo">点击获取验证码</span>
                <p class="rlf-tip-wrap" id="email_sp"></p>
            </div>
        </div>
        <div class="wlfg-wrap">
            <label for="" class="label-name"></label>
            <div class="rlf-group">
                <p class="rlf-tip-wrap"></p>

                <span style="width:403px;" class="rlf-btn-green btn-block" aria-role="button" hidefocus="true" id="subEMail">提交</span>
            </div>
            @else
                <input type="email" placeholder="请输入邮箱" disabled style="width:345px;" id="email" value="{{$user[0]['user_email'] or "" }}" required="required" class="rlf-input rlf-input-pwd rlf-field-error">
            @endif
        </div>
    {{--</form>--}}
</div>
    </div>
  </div>
</div>
</div>
@endsection
<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="/user/feedback" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="http://www.imooc.com/mobile/app" >
        <div class="elevator-app-box">
        </div>
    </a>
    <a class="elevator-top" href="javascript:;" style="display:none" id="backTop"></a>
</div>
<div style="display: none">
</div>
</body>
</html>
<script>
    $(function(){
        //发送验证码到邮箱
        $("#huo").click(function(){
            $("#huo").removeAttr('id');
            var email = $("#email").val()
            var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
            if(reg.test(email)){
                $("#email_sp").html('')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{url('user/send_email')}}",
                    type:"post",
                    datatype:"json"
                });
                $.ajax({
                    data:{
                        email:email
                    },
                    success:function(data){
                        var obj=eval("("+data+")");
                        if(obj['error']==0 && obj['result']=="成功"){
                            $("#email_sp").html("验证码已发送到你的邮箱,请查收").show(1).delay(2000).hide(1)
                            $("#huo").removeAttr('id');
                        }else{
                            $("#email_sp").html("咿呀出错了!!!").show(1).delay(2000).hide(1)
                            $("#huo").attr("id","huo")
                        }
                    }
                })
            }else{
                $("#email_sp").html("邮箱格式不正确").show(1).delay(2000).hide(1)
            }
        })

        //验证
        $("#code").blur(function(){
            var code = $("#code").val()
            if(code !=""){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{url('user/check_code')}}",
                    type:"post",
                    datatype:"json"
                });
                $.ajax({
                    data:{code:code},
                    success:function(data){
                        var obj=eval("("+data+")");
                        if(obj['error']==0 && obj['result']=="成功"){
                            $("#email_sp").html('<font color="#5ff137">√</font>').show(1).delay(2000).hide(1)
                        }else{
                            $("#email_sp").html("验证码错误").show(1).delay(2000).hide(1)
                            $("#huo").attr("id","huo")
                        }
                    }
                })
            }else{
                $("#email_sp").html("验证码不能为空").show(1).delay(2000).hide(1)
            }
        })
        $("#subEMail").click(function(){
            var email = $("#email").val()
            var code = $("#code").val()
            if(email!="" && code !="")
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{url('user/sub_code')}}",
                    type:"post",
                    datatype:"json"
                });
                $.ajax({
                    data:{
                        code:code,
                        email:email
                    },
                    success:function(data){
                        var obj=eval("("+data+")");
                        if(obj['error']==0 && obj['result']=="成功"){
                            alert('绑定成功');
                            location.reload()
                        }else{
                            $("#email_sp").html("验证码或email错误!!!").show(1).delay(2000).hide(1)
                            $("#huo").attr("id","huo")
                        }
                    }
                })
            }else
            {
                $("#email_sp").html("验证码或邮箱不能为空").show(1).delay(2000).hide(1)
            }
        })
    })
</script>
