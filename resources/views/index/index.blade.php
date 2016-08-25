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
    <link rel="stylesheet" href="css/a.css" type="text/css">
    <meta name="Keywords" content="面试，面试宝典，面试技巧，面试经验，面试简历，简历下载，面试试题">
    <script src="../js/push.js"></script>
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
                <a  href="{{url("xiang?id=$v[c_id]&v=0&a=0&l=0")}}">
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
                <a  href="#">
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

<!--方法开始 -->
<div class="icourse">
    <div class="incourse-wrap idx-width">
        <h2 class="icourse-title">方法</h2>
        <ul class="icourse-course clearfix">
            <?php foreach($article as $key=>$val){?>
            <li>
                <a  href="{{url("fangfa?id=$val[a_id]")}}">
                    <div class="icourse-img">
                        <img class="scrollLoading" src="{{url("$val[a_logo]")}}" alt="">
                    </div>
                    <div class="icourse-intro clearfix">
                        <p>标题:{{$val['a_title']}}</p>
                        <span class="l "><?php echo mb_substr($val['a_con'],0,30)?></span>
                    </div>
                    <div class="icourse-tips clearfix">
                        <h2>{{$val['a_title']}}</h2>
                        <span class="l ">标签:<?php
                            $leis = explode(',',$val['a_lei']);
                                    foreach($lei as $s=>$d){
                                        foreach($d as $m=>$n){
                                            if(in_array($n['al_id'],$leis)){
                                                echo $n['al_name']."  ";
                                            }
                                        }
                                    }
                            ?></span>
                        <span class="r">{{$val['brows']}}浏览</span>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!--方法结束 -->

<!--简历开始 -->
<div class="icourse">
    <div class="incourse-wrap idx-width">
        <h2 class="icourse-title">简历</h2>
        <ul class="icourse-course clearfix">
            <?php foreach($gather as $key=>$val){?>
            <li>
                <a  href="{{url("college_exam?id=$val[g_id]")}}">
                    <div class="icourse-img">
                        <img class="scrollLoading" src="{{url("$val[g_dir]")}}" alt="">
                    </div>
                    <div class="icourse-intro clearfix">
                        <p>名称:{{$val['g_name']}}</p>
                        <span class="l "><?php echo $val['g_name']?></span>
                    </div>
                    <div class="icourse-tips clearfix">
                        <h2>{{$val['g_name']}}</h2>
                        <span class="l "></span>
                        <span class="r">{{$val['g_click']}}浏览</span>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!--简历介绍-->

<!--答疑开始 -->
<div class="icourse">
    <div class="incourse-wrap idx-width">
        <h2 class="icourse-title">答疑</h2>
        <ul class="icourse-course clearfix">
            <?php foreach($questions as $key=>$val){?>
            <li>
                <a  href="{{url("detail?id=$val[t_id]")}}">
                    <div class="icourse-img">
                        <img class="scrollLoading" src="{{$val['user_filedir'] or "images/unknow-160.png" }}" alt="">
                    </div>
                    <div class="icourse-intro clearfix">
                        <p>答案:<?php echo strip_tags($val['t_content']);?></p>
                        <span class="l "></span>
                    </div>
                    <div class="icourse-tips clearfix">
                        <h2>问题:<?php echo substr($val['t_title'],0,15)?></h2>
                        <span class="l ">{{$val['d_name']}}</span>
                        <span class="r">提问时间：{{$val['add_time']}}</span>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
{{--<!--答疑介绍-->--}}


<!--script-->
<SCRIPT src="../js/jquery-1.9.1.min.js" type="text/javascript"></SCRIPT>


<!--图片异步加载-->
<script type="text/javascript" src="../js/jquery.lazyload.js"></script>
<script type="text/javascript" src="../js/jquery.scrollLoading.js"></script>
<script>
//图片异步加载
// $(document).ready(function($){
//     $("img").lazyload({
//     placeholder:"grey.gif", //加载图片前的占位图片
//     effect:"fadeIn" //加载图片使用的效果(淡入)
//     });
// });
//图片异步加载
jQuery(document).ready(function($){
        //实现图片慢慢浮现出来的效果
            $("img").load(function () {
                //图片默认隐藏  
                $(this).hide();
                //使用fadeIn特效  
                $(this).fadeIn("5000");
                //$(this).stop().fadeIn("5000");
            });
            // 异步加载图片，实现逐屏加载图片
            $(".scrollLoading").scrollLoading(); 
});
</script>
</body>
@endsection
</html>
