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
    <script src="/js/jquery.datetimepicker.js"></script>
    <script>
        var $1=$;
    </script>
    <script>
        $1(function(){
            $1('#datetimepicker').datetimepicker();
            $1('#datetimepicker').datetimepicker({
                format:'Y-m-d H:i'
            });
            $1('#profile-submit').click(function(){
                var company=$('#company').val();
                var time=$('#datetimepicker').val();
                var address = $("#company_address").val()
                var myDate = Date.parse(new Date());
                var tid=$(this).attr('tid');
                if(company==''){
                    alert('请输入面试公司');
                    return false;
                }
                if(time==''){
                    alert('请选择面试时间');
                    return false;
                }else if(Date.parse(time)<myDate){
                    alert('面试时间不能小于当前时间');
                    return false;
                }
                if(address==''){
                    alert('请选择面试地址');
                    return false;
                }
                var url="{{url("/user/setview")}}";
                if(tid==0){
                    var arr={company:company,time:time,company_address:address};
                }else{
                    arr={company:company,time:time,ic_id:tid,company_address:address}
                }
                $1.post(url,arr,function(data){
                    if(data==1){
                        alert('新增成功，请到展示页面查看');
                    }
                    else if(data==3){
                        alert('编辑成功，请到展示页面查看');
                    }else{
                        alert('操作失败');
                    }
                })
            })
        })
    </script>
</head>
<body>
@extends('layouts.master')
@section('sidebar')
    @parent
    <div id="main">

        <div class="settings-cont clearfix">

            @include('layouts.menu')
            <div class="setting-right">
                <div class="setting-right-wrap wrap-boxes settings" >
                    <h4 style="margin-top: 30px;color:#226666">
                        @if(isset($arr))
                            编辑资料>>
                        @else
                            新增资料>>
                        @endif
                        <span style="font-size: 18px; float: right; margin-right: 40px;color: #3d444d"><a href="{{url("/user/interview")}}">管理资料</a></span>
                    </h4>
                    <hr/>
                    <div id="setting-profile" class="setting-wrap setting-profile" style="padding-top: 40px;">
                        <div class="wlfg-wrap clearfix">
                            <label class="label-name" for="company" style="cursor: pointer">面试公司</label>
                            <div class="rlf-group">
                                <input type="text" id="company"  autocomplete="off"  data-validate="nick"  class="input rlf-input rlf-input-nick" value="@if(isset($arr)){{$arr['company']}}@endif" placeholder=""/>
                                <p class="rlf-tip-wrap"></p>
                            </div>
                        </div>

                        <div class="wlfg-wrap clearfix">
                            <label class="label-name" for="company" style="cursor: pointer">公司地址</label>
                            <div class="rlf-group">
                                <input type="text" id="company_address"  autocomplete="off"  data-validate="nick"  class="input rlf-input rlf-input-nick" value="@if(isset($arr)){{$arr['company_address']}}@endif" placeholder=""/>
                                <p class="rlf-tip-wrap"></p>
                            </div>
                        </div>

                        <div class="wlfg-wrap clearfix">
                            <label class="label-name" for="datetimepicker" style="cursor: pointer">面试时间</label>
                            <div class="rlf-group">
                                <input type="text" class="input rlf-input rlf-input-nick" value="@if(isset($arr)){{$arr['time']}}@endif" id="datetimepicker"/>
                                <p class="rlf-tip-wrap"></p>
                            </div>
                        </div>


                        <div class="wlfg-wrap clearfix">
                            <label class="label-name" for=""></label>
                            <div class="rlf-group">
                                <span id="profile-submit" tid="@if(isset($arr)){{$arr['ic_id']}}@else 0 @endif"  hidefocus="true"  aria-role="button" class="rlf-btn-green btn-block profile-btn">保存</span>
                            </div>
                        </div>
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
