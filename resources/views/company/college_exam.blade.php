<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        公司试题------面试宝典
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375" />
    <meta property="wb:webmaster" content="c4f857219bfae3cb" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="Cache-Control" content="no-transform " />

    <meta name="Keywords" content="" />

    <link rel="stylesheet" href="css/d79d81e9ab144c28aae8b073106e6881.css" type="text/css" />
    <link rel="stylesheet" href="css/nowcoder-ui.css">
</head>
<style>
    .xxx{
        padding-left:10px;
    }
    .zzz{
        padding-left:10px;
    }

</style>
@extends('layouts.master')
@section('sidebar')
    @parent

    <body style="background:#fff;">
    <input type="hidden"  id="college">
    <div class="nk-main test-center-page clearfix" style=" margin-top:50px;">
        <div class="test-center-bar">
            <ul class="test-center-menu">

                <li>
                    <div class="tcm-mod">
                        <div class="tcm-arrow"></div>
                        <h4 class="tcm-hd">简历</h4>
                        <div class="tcm-bd">
                            <a href="{{url('company')}}" class="xxx" data-id="134">简历范文</a>
                        </div>
                    </div>

                </li>
            </ul>

        </div>
        <div class="nk-content">


            <div class="module-box">
                <div class="menu-box">
                    <ul class="menu clearfix">
                        <li class="selected"><a href="javascript:void(0);">简历</a></li>
                    </ul>
                </div>
                <div class="module-body" id="exam">
                    <center>
                        <h4>{{$arr['g_name']}}</h4>
                        <img src="{{$arr['g_dir']}}"  /><br/>
                        <input type="submit" style="width: 400px;height: 50px;font-weight: bold;font-size: 20px;color: #FF0000;font-family: 微软雅黑;" value="【立即下载】点击本按钮直接下载简历" onclick="window.open('http://jianli.yjbys.com/{{$arr['g_down']}}')">                    </center>
                </div>
                <div class="pagination">
                    <style>
                        .pager li{
                            float:left;
                            margin-left:200px;
                        }
                    </style>

                </div>
            </div>
        </div>
    </div>


    <div class="ad-window-sm js-global-tips" style="display:none;">
        <a href="javascript:void(0);" class="ad-close">X</a>
        <div class="ad-live-active"></div>
        <a class="link-green js-global-tips-href" target="_blank" href="">点击查看>></a>
    </div>

    </div>
    <script src="js/sea_1.js" type="text/javascript"></script>
    <script src="js/base.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>

    <script>
        $(document).on("click",".zzz",function(){
            var name = $(this).attr("data-id");
            $("#college").attr('value',name);
            $.get("college",{name:name},function(data){
                $("#exam").html(data);
            })
        })
        $(document).on("click",".xxx",function(){
            var name_z = $("#college").val();
            var name_x = $(this).attr("data-id");
            $.get("college_x",{name_z:name_z,name_x:name_x},function(data){
                $("#exam").html(data);
            })
        })

    </script>






    <script type="text/javascript">
        seajs.use('nowcoder/1.2.456/javascripts/site/common/index');
        seajs.use('nowcoder/1.2.456/javascripts/site/common/nav');
    </script>
    <span id='cnzz_stat_icon_1253353781' style="display:none;"></span>
    <script type="text/javascript">
        window.parameter = {
            mutiTagIds: ''
        };
        seajs.use('nowcoder/1.2.456/javascripts/site/contest/paperList');
    </script>
    </body>
@endsection
</html>

