
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
<link rel="stylesheet" href="../css/myemojiPl.css">	
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
      <div>
<?php foreach($pro as $k=>$v){?>
<div class="ques-answer">
    <div class="tag-img">
        <a href="#" target="_blank">
            <img src="{{$v['user_filedir'] or "images/unknow-40.png"}}" title="28"/>
        </a>
    </div><!--.tag-img end-->
    <div class="from-tag">        来自
                <a href="/detail" id="timu"><?php echo $v['d_name']?></a>的<a href="" target="_top"><b>{{$v['user_name'] or "无名大侠"}}</b></a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="detail?id=<?php echo $v['t_id']?>" class="ques-con-content" target="_self" title="#include&amp;lt;stdio.h&amp;gt;#include&amp;lt;string.h&amp;gt;int main(){struct student{long nu;char name[10];int age;};struct student stu_i;struct student*p;p=&amp;amp;stu_i;stu_1.nu =201601;stu_1.age =12;strcpy(stu_1.name ,&quot;xiong&quot;);stu_2.nu =201602;stu_2.age =15;strcpy(stu_2.name ,&quot..."><?php echo $v['t_title'];?></a>

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
                <li>
            
            <div class="class-info">
                <div class="class-icon">
                    <a href="/wenda/20" target="_blank">
                        <img src="picture/563aff130001c76f00900090.jpg" alt="Linux"/>
                    </a>
                </div><!--.class-icon end-->
                <h4><a href="/wenda/20" target="_blank">Linux</a></h4>
                <p class="follow-person">12162人关注</p>
                                <a href="guanzhu" data-tag-id="20" class="follow">关注</a>
                            </div><!--.class-info end-->
            <div class="desc">Linux是一套免费使用和自由传播的类Unix操作系统，是一个基于P...</div>
        </li><!--li end-->
            </ul><!--.cls-list end-->
</div><!--.recommend-class end-->

<div class="advertisement">
        <a href="#" data-ast="yuanwenindexright_1_189" target="_blank">
        <img src="picture/569cb54900010baf02800100.jpg" alt="年度问答牛人团"/>
    </a>
    </div><!--.advertisement end-->
<div class="hot-ques">
    
</div><!--.hot-ques end-->
<div class="leifeng-sort">
    <h3 class="title">一周回答雷锋榜</h3>
    <ul>
                <li>
            <div class="ranking first">1</div>
            <div class="user-pic">
                <a target="_blank" href="/u/1088132/bbs">
                    <img src="picture/5485bdcf00015df201000100-100-100.jpg" title="Caballarii"/>
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/1088132/bbs">Caballarii</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">JAVA开发工程师</span>
                <span class="answer-num">35回答</span>
            </div><!--.user-info end-->
        </li>
                <li>
            <div class="ranking second">2</div>
            <div class="user-pic">
                <a target="_blank" href="/u/1206175/bbs">
                    <img src="picture/54c1f7be00019ad801000100-100-100.jpg" title="流口水流"/>
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/1206175/bbs">流口水流</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">Web前端工程师</span>
                <span class="answer-num">34回答</span>
            </div><!--.user-info end-->
        </li>
                <li>
            <div class="ranking third">3</div>
            <div class="user-pic">
                <a target="_blank" href="/u/2553777/bbs">
                    <img src="picture/53fbd87f0001e4c006000338-240-135.jpg" title="display_none"/>
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/2553777/bbs">display_none</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">Web前端工程师</span>
                <span class="answer-num">31回答</span>
            </div><!--.user-info end-->
        </li>
                <li>
            <div class="ranking ">4</div>
            <div class="user-pic">
                <a target="_blank" href="/u/114554/bbs">
                    <img src="picture/56f4fca500018f4101000100-100-100.jpg" title="李晓健"/>
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/114554/bbs">李晓健</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">Web前端工程师</span>
                <span class="answer-num">29回答</span>
            </div><!--.user-info end-->
        </li>
                <li>
            <div class="ranking ">5</div>
            <div class="user-pic">
                <a target="_blank" href="/u/1008219/bbs">
                    <img src="picture/569639de0001ab3713000867-100-100.jpg" title="晚安sp"/>
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/1008219/bbs">晚安sp</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">PHP开发工程师</span>
                <span class="answer-num">28回答</span>
            </div><!--.user-info end-->
        </li>
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
</div>
</body>
@endsection
</html>
