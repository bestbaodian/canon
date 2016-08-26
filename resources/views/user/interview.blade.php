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
    <meta name="keywords" content="面试宝典网，面试宝典官网，mbaodian，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
    <meta name="description" content="面试宝典是学习编程最简单的免费平台。面试宝典提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
    <link rel="stylesheet" href="/css/base.css" type="text/css" />
    <link rel="stylesheet" href="/css/common-less.css" type="text/css" />
    <link rel="stylesheet" href="/css/profile-less.css" type="text/css" />
    <link rel="stylesheet" href="/css/user-common-less.css" type="text/css" />
    <link rel="stylesheet" href="/css/layer.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.css"/>
    <script src="/js/jquery.js"></script>

</head>
<body id="body">
@extends('layouts.master')
@section('sidebar')
    @parent
    <div id="main">

        <div class="settings-cont clearfix">

            @include('layouts.menu')
            <div class="setting-right">
                <div class="setting-right-wrap wrap-boxes settings" >
                    <h4 style="margin-top: 30px;color:#226666">管理资料>><span style="font-size: 18px; float: right; margin-right: 40px;color: #3d444d"><a href="{{url("/user/addview")}}">新增资料</a></span></h4>
                    <hr/>
                    <table border="1" width="100%">
                        <tr height="40px">
                            <th style="text-align: center"><b>面试公司</b></th>
                            <th style="text-align: center"><b>面试时间</b></th>
                            <th style="text-align: center"><b>操作</b></th>
                        </tr>
                        @foreach($arr as $v)
                            <tr height="40px">
                                <td>{{$v['company']}}</td>
                                <td style="text-align: center">{{$v['time']}}</td>
                                <td style="text-align: center"><a href="{{url("/user/addview?id=".$v['ic_id'])}}">编辑</a> | <a class="del_one" uid="{{$v['ic_id']}}" href="javascript:void(0)">删除</a></td>
                            </tr>
                        @endforeach
                    </table>
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
    $(function(){
        $('.del_one').click(function(){
            var ic_id=$(this).attr('uid');
            var url="{{url('/user/del_one')}}";
            $.post(url,{ic_id:ic_id},function(data){
                if(data==2){
                    alert('删除失败');
                }else{
                    $('#body').html(data);
                }
            })
        })
    })
</script>
