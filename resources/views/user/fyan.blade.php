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
<script type="text/javascript">

      var OP_CONFIG={"module":"user","page":"setprofile","userInfo":{"uid":3071208,"nickname":"\u51e4\u9896","head":"http:\/\/img.mukewang.com\/images\/unknow-80.png","usertype":"1","roleid":0}};
  var isLogin = 1;
var is_choice = "";
  var seajsTimestamp="v=201604211612";
  </script>
 
<!--
<link rel="stylesheet" href="/static/component/logic/login/login-regist.css" type="text/css" />
<link rel="stylesheet" href="/static/css/settings.css" type="text/css" />
-->


<link rel="stylesheet" href="/css/common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/login-regist.css" type="text/css" />
<link rel="stylesheet" href="/css/settings.css" type="text/css" />
<link rel="stylesheet" href="/css/user-common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/avtou-less.css" type="text/css" />
<link rel="stylesheet" href="/css/layer.css" type="text/css" />

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
    <form action="{{url("user/yanzheng")}}" method="post">
        <div class="wlfg-wrap">
            <label for="" class="label-name">手机号</label>
            <div class="rlf-group">
                @if($user[0]['user_phone_status']==0)
                <input type="text" value="{{$user[0]['user_phone']}}" placeholder="请输入当前手机号" class="rlf-input rlf-input-pwd rlf-field-error" name="phone" id="phone">
                <span class="rlf-btn-gray btn-block"  hidefocus="true" onclick="fun1()" id="huo">点击获取验证码</span>
                <!-- <input type="button" id="huo" value="点击获取验证码" /> -->
            </div>
        </div>
        <div class="wlfg-wrap">
            <label for="confirm" class="label-name">验证码</label>
            <div class="rlf-group">
                <input type="text" placeholder="请输入验证码" class="rlf-input rlf-input-pwd" id="confirm" name="confirm">
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>
        <div class="wlfg-wrap">
            <label for="" class="label-name"></label>
            <div class="rlf-group">
                <input type="submit" class="rlf-btn-green btn-block" aria-role="submit" hidefocus="true" id="resetpwd-btn-save" value="绑定" style="width:420px;height:50px" />
            </div>
            @else
                <input type="text" value="<?php echo substr($user[0]['user_phone'],0,3).'*****'.substr($user[0]['user_phone'],8,11)?>" disabled class="rlf-input rlf-input-pwd rlf-field-error">
                @endif
        </div>
    </form>
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



<!--script-->

 


<div style="display: none">
</div>

</body>


</html>

<script type="text/javascript">

  function fun1(){
      var phone=$('#phone').val();
      $.get('bang',{phone:phone},function(msg){
          $("#huo").removeAttr('id');
      });
  }
    
  
  
</script>