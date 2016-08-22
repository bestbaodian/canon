<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>面试宝典-我的收藏</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="keywords" content="面试宝典网，面试宝典官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
<link rel="stylesheet" href="/css/base.css" type="text/css" />
<!--
<link rel="stylesheet" href="/static/component/logic/login/login-regist.css" type="text/css" />
<link rel="stylesheet" href="/static/css/settings.css" type="text/css" />
-->
<link rel="stylesheet" href="/css/common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/profile-less.css" type="text/css" />
<link rel="stylesheet" href="/css/user-common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/layer.css" type="text/css" />
<link rel="stylesheet" href="/css/user_settings_avtou-less.css" type="text/css" />
<link rel="stylesheet" href="/css/login-regist.css" type="text/css" />
    {{--<script src="/static/js/user.js"></script>--}}

    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
@extends('layouts.master')
@section('sidebar')
@parent
<div id="main">
    <div class="settings-cont clearfix">
        @include('layouts.menu')
      <div class="setting-right-wrap wrap-boxes settings" style="margin-left: 280px;background-color: #ffffff">
          <div >
              <ul class="nav nav-tabs" style="height: 50px;">
                  <li class="active"><a href="{{url("user/my_house")}}">试题</a></li>
                  <li><a href="#">答疑</a></li>
                  <li><a href="{{url("user/my_house_article")}}">文章</a></li>
              </ul>
                  @foreach($college_questions as $key => $v)
                      <br><span><h3 style="color: red">问题：{{$v['c_name']}}</h3></span><br><br>
                      <span>
                          <h5>
                              <p>　　<?php echo mb_substr($v['c_answer'],0,100);?></p>
                          </h5>
                      </span>
                    <p style="float: right;"><a  style="color: blue;"href="{{url("xiang?id=$v[c_id]&v=0&a=0&l=0")}}">点击查看详情</a></p>
                  <br><br>
                  @endforeach
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
