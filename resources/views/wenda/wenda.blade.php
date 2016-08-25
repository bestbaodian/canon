
<html>
<head>
<meta charset="utf-8">
<title>面试宝典-IT技术问答平台</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="Keywords" content="" />
<meta name="Description" content="猿问是由面试宝典为广大IT爱好者提供的专业问答交流平台,这里大牛云集,用户可根据自身需求,提出相关问题,也可为有问题同学进行解答,互帮互助,分享知识！" />

<meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>
<link rel="stylesheet" href="css/c0e7cb6dbd3c47c9bcf65581ec74e79d.css" type="text/css" />
</head>
<body style="background:#fff;">

@extends('layouts.master')
@section('sidebar')
@parent

<div id="main">


<div class="wenda clearfix">

  <div class="js-layout-change">
    <div class="l wenda-main">
      <div class="wd-top-slogan">
        <span>程序员自己的问答社区</span>
        <a class="js-quiz" href="save">我要提问</a>
      </div>
        <?php
        $is_look = isset($_GET['is_look'])?$_GET['is_look']:"";
        if($is_look){
        ?>
        <div class="nav">
            <a href="{{url("wenda?is_look=1")}}" class="active">推荐</a>
            <a href="{{url("bestnew?is_look=1")}}" >最新</a>
            <a href="{{url("waitreply?is_look=1")}}">等待回答</a>
            <div class="switch-box">
                <div class="switch js-switch on">
                    <div class="fill">
                        <div class="outer"></div>
                    </div>
                    <div class="inner"></div>
                </div>
                <span>只显示关注内容</span>
            </div>
        </div>
        <?php }else{?>
        <div class="nav">
            <a href="{{url("wenda")}}" class="active" >推荐</a>
            <a href="{{url("bestnew")}}"  >最新</a>
            <a href="{{url("waitreply")}}" >等待回答</a>
            <div class="switch-box">
                <div class="switch js-switch">
                    <div class="fill">
                        <div class="outer"></div>
                    </div>
                    <div class="inner"></div>
                </div>
                <span>只显示关注内容</span>
            </div>
        </div>
        <?php }?>
      <div >

<?php foreach($pro as $k=>$v){?>
<div class="ques-answer">
    <div class="tag-img">
        <a href="#" target="_blank">
            <img src="{{$v['user_filedir'] or "images/unknow-40.png"}}" title="28"/>
        </a>
    </div><!--.tag-img end-->
    <div class="from-tag">        来自
                <a href="{{url("detail?id=$v[t_id]")}}" id="timu"><?php echo $v['d_name']?></a>的　<b>{{$v['user_name'] or "无名大侠"}}</b>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="{{url("detail?id=$v[t_id]")}}" class="ques-con-content" target="_self" title="#include&amp;lt;stdio.h&amp;gt;#include&amp;lt;string.h&amp;gt;int main(){struct student{long nu;char name[10];int age;};struct student stu_i;struct student*p;p=&amp;amp;stu_i;stu_1.nu =201601;stu_1.age =12;strcpy(stu_1.name ,&quot;xiong&quot;);stu_2.nu =201602;stu_2.age =15;strcpy(stu_2.name ,&quot..."><?php echo $v['t_title'];?></a>

    </div>
        <div class="answer-con first" data-answer-id="156328" id="answer-con">
        <div class="user">
        </div>
        <div class="answer-content">
            <?php echo mb_substr($v['t_content'],0,50)."…………" ;?>
        </div>
        <div class="ctrl-bar clearfix">
            共<?php echo $v['num']; ?>条回答
        </div><!--.ctrl-bar end-->
    </div><!--.answer-con end-->

    </div><!--.ques-answer end-->



<?php } ?>
    <style>
        .pagination{
            position:absolute;
            left:450px;
            bottom:-20px;
        }
        .pagination li{
            float:left;
            margin-left:10px;
            font-size:24px;
            color: #0000cc;
        }
    </style>

    <?php
    $is_look = isset($_GET['is_look'])?$_GET['is_look']:"";
    if($is_look){?>
    <?=$pro->appends(['is_look' => '1'])->links();?>

    <?php }else{?>

    <?=$pro->links();?>

    <?php } ?>
      </div>
    </div>
      <?php $pro->render();?>
    <div class="r wenda-slider">

      <!--.my-follow-class登录后可见-->

<div class="recommend-class">
    <div class="title clearfix">
        <h3>推荐分类</h3>
        <span class="all-cls">全部分类</span>
    </div><!--title end-->
    <ul class="cls-list">
        @foreach($sort as $k=>$v)
        <li>
            <div class="class-info">
                <div class="class-icon">
                    <a href="javascript:void(0)" target="_blank">
                        <img src="{{$v['aa'] or "images/unknow-40.png"}}" alt="Linux"/>
                    </a>
                </div><!--.class-icon end-->
                <h4><a href="javascript:void(0)" target="_blank"><?= $v['d_name']?></a></h4>
                <p class="follow-person">{{$v["G"]}}人关注</p>
                <?php  if(Session::get("username")){ ?>
                @if($v['is_guan'] == 0)
                    <span id="direction_<?= $v['d_id']?>"><a href="javascript:void(0)" data-tag-id="5" class="follow"  onclick="g_direction(<?= $v['d_id']?>)" id="g_direction_<?= $v['d_id']?>">关注</a></span>
                @else
                    <a href="javascript:void(0)" data-tag-id="5" class="follow" id="g_direction">已关注</a>
                @endif
                <?php }else{ ?>
                <span><a href="#login-modal" id="" data-category="UserAccount" data-action="login" data-toggle="modal" class="follow">关注</a></span>
                {{--<span><a href="javascript:void(0)" data-tag-id="5"  onclick="is_house()"></a></span>--}}
                <?php } ?>

                        {{--<a href="javascript:void(0)" data-tag-id="20" class="follow">关注</a>--}}
                            </div><!--.class-info end-->
            <div class="desc"></div>
        </li>
            @endforeach<!--li end-->
    </ul><!--.cls-list end-->
</div><!--.recommend-class end-->

<div class="advertisement">
        <a href="#" data-ast="yuanwenindexright_1_189" target="_blank">
    </a>
    </div><!--.advertisement end-->
<div class="hot-ques">
    
</div><!--.hot-ques end-->
<div class="leifeng-sort">
    <h3 class="title">一周回答雷锋榜</h3>
    <ul>
        @foreach($honor as $key => $v)
            <li>
                <div class="ranking first"><?= $key+1;?></div>
                <div class="user-pic">
                    <a target="_blank" href="#">
                        <img src="{{$v['user_filedir'] or "images/unknow-40.png"}}" alt="用户头像">
                    </a>
                </div>
                <div class="user-name">
                    <a target="_blank" href="#"><?= $v['user_name'];?></a>
                </div><!--.user-name end-->
                <div class="user-info clearfix">
                    <span class="role">{{$v["num"] or "0"}}人关注</span>
                    <span class="answer-num"><?= $v['C'];?>回答</span>
                </div><!--.user-info end-->
            </li>
        @endforeach
    </ul>
</div><!--.leifeng-sort end-->
    </div>
  </div>
</div>

  <div class="tag-pop" id="tag-pop">
    <div class="shade"></div>
    <div class="tag-main">
        <h3><span>关注我喜欢或专注的猿问分类</span> <i class="icon-close2 js-close"></i></h3>
        <ul class="tag-list clearfix">
                        <li data-tag-id="12" >
                <img src="picture/563aff7e0001c8c700900090.jpg" alt=""/>
                <span>Android</span>
            </li>
                    </ul>
        <div class="save-btn">保存</div>
    </div><!--.tag-main end-->
</div><!--.tag-pop end-->


</div>
    <!--footer-->
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



<script type="text/javascript" src='../js/jquery-1.9.1.js'></script>
<script type="text/javascript">
    $.ready($('.switch').click(function(){
        if($(this).attr('class')=="switch js-switch"){
//                $(this).attr("class",'switch js-switch on ')
            location.href='{{url("wenda?is_look=1")}}'
        }else{
            location.href='{{url("wenda")}}'
        }
    }))
</script>
<script>
    function g_direction(d_id){
        $.ajax({
            type: "POST",
            url: "house_direction",
            data: "d_id="+d_id,
            dataType: "json",
            success: function(msg){
                var tr = '';
                for(var i=0;i<=msg.length;i++){
                    tr += '<a href="javascript:void(0)" data-tag-id="5" class="follow" id="g_direction">已关注</a>';
                }
                $("#g_direction_"+d_id).remove();
                $("#direction_"+d_id).html(tr);
            }
        });
    }
</script>
</div>
</body>
@endsection
</html>
