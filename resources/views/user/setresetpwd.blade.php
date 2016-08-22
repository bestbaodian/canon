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
    <script src="/static/js/user.js"></script>
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
        <div class="wlfg-wrap">
            <label for="" class="label-name">当前密码</label>
            <div class="rlf-group">
                <input type="password" placeholder="请输入当前密码" style="width:345px;" id="pwd_blur" class="rlf-input rlf-input-pwd rlf-field-error" name="oldpwd"><span id="ch_pwd" style="float:right;line-height:40px;"></span>
                <p class="rlf-tip-wrap rlf-tip-error"></p>
            </div>
        </div>
        <div class="wlfg-wrap">
            <label for="newpass" class="label-name">新密码</label>
            <div class="rlf-group">
                <input type="password" style="width:345px;" placeholder="请输入密码" class="rlf-input rlf-input-pwd" id="newpass" name="newpass" data-validate="password"><span id="ch_pwd1" style="float:right;line-height:40px;"></span>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        <div class="wlfg-wrap">
            <label for="confirm" class="label-name" >确认密码</label>
            <div class="rlf-group">
                <input type="password" style="width:345px;" placeholder="请输入密码" class="rlf-input rlf-input-pwd" id="confirm" name="confirm"><span id="ch_pwd2" style="float:right;line-height:40px;"></span>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        <div class="wlfg-wrap">
            <label for="" class="label-name"></label>
            <div class="rlf-group">
                <span style="width:403px;" class="rlf-btn-green btn-block" aria-role="button" hidefocus="true" id="resetpwd-btn-save">保存</span>
            </div>
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
