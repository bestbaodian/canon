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
    <meta name="description" content="面试宝典是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
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
            $1('#province-select1').change(function(){
                var college=$(this).val();
                var url="{{"/user/class"}}";
                var str='<option  value="0">--选择班级--</option>';
                if(college!=0){
                    $.post(url,{college:college},function(data){
                        if(data!=1){
                            var res=eval('('+data+')');
                            for(var i in res){
                                str+='<option  value="'+res[i]['c_id']+'">'+res[i]['c_class']+'</option>';
                            }
                        }
                        $('#city-select1').html(str);
                    })
                }else{
                    $('#city-select1').html(str);
                }
            });

            $1('#profile-submit').click(function(){
                var u_name=$('#company').val();
                var c_id=$('#city-select1').val();
                var us_id=$(this).attr('tid');
                if(u_name==''){
                    alert('请输入真实姓名');
                    return false;
                }
                if(c_id==0){
                    alert('请选择班级');
                    return false;
                }
                if(us_id==0){
                    var arr={u_name:u_name,c_id:c_id}
                }
                else{
                    arr={u_name:u_name,c_id:c_id,us_id:us_id};
                }
                var url="{{url("/user/msg")}}";
                $1.post(url,arr,function(data){
                    if(data==1){
                        alert('保存成功');
                    }else{
                        alert('操作失败');
                    }
                })
            })
        })
    </script>
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
                    <h4 style="margin-top: 30px;color:#226666">
                        管理资料>>
                    </h4>
                    <hr/>
                    <div id="setting-profile" class="setting-wrap setting-profile" style="padding-top: 40px;">
                        <div class="wlfg-wrap clearfix">
                            <label class="label-name" for="company" style="cursor: pointer">真实姓名</label>
                            <div class="rlf-group">
                                <input type="text" id="company"  autocomplete="off"  data-validate="nick"  class="input rlf-input rlf-input-nick" value="@if(isset($user)){{$user[0]['u_name']}}@endif" placeholder=""/>
                                <p class="rlf-tip-wrap"></p>
                            </div>
                        </div>

                        <div class="wlfg-wrap clearfix">
                            <label class="label-name" for="datetimepicker" style="cursor: pointer">班&nbsp;&nbsp;&nbsp;&nbsp;级&nbsp;&nbsp;</label>
                            <div class="rlf-group profile-address">
                                <select id="province-select1" class='input' hidefocus="true">
                                    <option  value="0">--选择学院--</option>
                                    @foreach($college as $key=>$val)
                                        <?php
                                        if($val['c_id']==$user[0]['cid']){?>
                                        <option selected="selected" value="{{ $val['c_id']  }}">{{ $val['c_name'] }}</option>
                                        <?php }else{?>
                                        <option  value="{{ $val['c_id'] }}">{{ $val['c_name'] }}</option>
                                        <?php }?>
                                    @endforeach
                                </select>
                                <select class='input' id="city-select1" hidefocus="true" >
                                    @if($class)
                                        @foreach($class as $v)
                                            <option value="{{$v['c_id']}}" @if($user[0]['u_class']==$v['c_id'])selected="selected" @endif>{{$v['c_class']}}</option>
                                        @endforeach
                                    @else
                                        <option value="0">--选择班级--</option>
                                    @endif
                                </select>
                                <p class="rlf-tip-wrap"></p>
                            </div>
                        </div>

                        <div class="wlfg-wrap clearfix">
                            <label class="label-name" for=""></label>
                            <div class="rlf-group">
                                <span id="profile-submit" tid="@if(!empty($user[0]['us_id'])){{$user[0]['us_id']}}@else 0 @endif"  hidefocus="true"  aria-role="button" class="rlf-btn-green btn-block profile-btn">保存</span>
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
