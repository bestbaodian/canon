<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>
        面试试题_面试宝典网
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375" />
    <meta property="wb:webmaster" content="c4f857219bfae3cb" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta name="Keywords" content="面试试题，面试经验，面试方法，面试问题，面试宝典网" />
    <meta name="Description" content="互联网工程，物联网工程，web前端，苹果方向，网络方向，网络方向，信息方向，室内设计，建筑系方向，工程造价方向，web架构方向，UI设计方向，游戏方向，云应用，云服务"/>
    <link rel="stylesheet" href="css/d79d81e9ab144c28aae8b073106e6881.css" type="text/css" />
</head>
<body  id="List_courseId">
@extends('layouts.master')
@section('sidebar')
    @parent
<div id="main">
    <div class="container">
        <div class="course-content">
            <div class="course-nav-box">
                <div class="course-nav-hd">
                    <span>全部课程</span>
                    <a href="#" class="for-teacher hide-text" title="应聘讲师" target="_blank">应聘讲师</a>
                </div>
                <div class="course-nav-row clearfix">
                    <?php
                    $vv=isset($_GET['v'])?$_GET['v']:0;
                    $a=isset($_GET['a'])?$_GET['a']:0;
                    $l=isset($_GET['l'])?$_GET['l']:0;
                    $p=isset($_GET['page'])?$_GET['page']:1;
                    $top=isset($_GET['top'])?$_GET['top']:0;
                    ?>
                    <span class="hd l">学院：</span>
                    <div class="bd">
                        <ul class="">
                            <li class="course-nav-item <?=($vv==0)?'on':''?>" class="type" id="type">
                               <a href="{{url('shiti?v=0&a=0&l=0')}}" class="leixing" value="0"> 全部</a>
                            </li>
                            <?php foreach($arr as $k=>$v){?>
                            <li class="course-nav-item <?=($vv==$v['c_id'])?'on':'';?>"  class="type" id="type">
                               <a href="{{url("shiti?v=$v[c_id]&a=0&l=0")}}" class="leixing" value="<?php echo $v['c_id']?>">
                               <?php echo $v['c_name']?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="course-nav-row clearfix">
                    <span class="hd l">专业：</span>
                    <div class="bd">
                        <ul class="">
                            <div id="zhuanye">
                                <li class="course-nav-item <?=($a==0)?'on':'';?>" id="zhuan">
                                    <a href="shiti?v=<?=$vv?>&a=0&l=<?=$l?>" class="zhuan" value="0"> 全部</a>
                                </li>

                        <?php foreach($zhuan as $k=>$v){?>
                            <li class="course-nav-item <?=($a==$v['d_id'])?'on':'';?>" id="zhuan">
                                <a href="{{url("shiti?v=$vv&a=$v[d_id]&l=$l")}}"><?php echo $v['d_name']?></a>
                            </li>
                        <?php } ?>
                                </div>
                        </ul>
                    </div>
                </div>
              <div class="course-nav-row clearfix">
                    <span class="hd l">类型：</span>
                   <div class="bd">
                        <ul class="">
                            <div id="lei">
                                <li class="course-nav-item  <?=($l==0)?'on':'';?>" id='lei'>
                                        <a href="{{url("shiti?v=$vv&a=$a&l=0")}}">全部</a>
                                </li>
                        <?php foreach($lei as $k=>$v){?>
                                <li class="course-nav-item <?=($l==$v['t_id'])?'on':'';?>" id="lei">
                                    <a href="{{url("shiti?v=$vv&a=$a&l=$v[t_id]")}}"><?php echo $v['t_name']?></a>
                                </li>
                        <?php } ?>
                                </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="course-tool-bar clearfix">
                <div class="tool-left l">
                    <a href="{{url("shiti?v=$vv&a=$a&l=$l")}}" class="sort-item <?=$top==0?"":"active"?>">最新</a>
                    <a href="{{url("shiti?v=$vv&a=$a&l=$l&top=1")}}" class="sort-item <?=$top==1?"":"active"?>">最热</a>
                </div>
                <div class="l">
                    <span class="tool-item" style="display: none;">
                        <a class="follow-learn tool-chk" href="javascript:void(0);">跟我学</a>
                    </span>
                </div>
                <div class="tool-right r">
                                        <span class="tool-item total-num">
                        共<b>511</b>个课程
                    </span>
                    <span class="tool-item tool-pager">
                                                <span class="pager-num">
                           <em class="pager-total">{{$shi->total()}}条</em>　　<b class="pager-cur">{{$shi->currentPage()}}</b>/<em class="pager-total">{{$shi->lastPage()}}</em>
                        </span>
                        <?php if($p<=1){ ?>
                        <a href="javascript:void(0)" class="pager-action pager-prev hide-text disabled">上一页</a>
                        <?php }else{ ?>
                        <a href="shiti?page=<?=$p-1?>&v=<?=$vv?>&a=<?=$a?>&l=<?=$l?>&top=<?=$top?>" class="pager-action pager-prev hide-text">上一页</a>
                        <?php } ?>
                        <a href="shiti?page=<?=$p+1?>&v=<?=$vv?>&a=<?=$a?>&l=<?=$l?>&top=<?=$top?>" class="pager-action pager-next hide-text">下一页</a>
                        </span>
                </div>
            </div>
            <div class="course-list">
                <div class="js-course-lists" id="list">
                    <ul>
                    <?php foreach($shi as $k=>$v){?>
                        <li class="course-one">
                            <a href="{{url("xiang?id=$v[c_id]&v=$vv&a=$a&l=$l")}}" target="_self">
				<div class="course-list-img">
                                    <img width="240" height="135" alt="" src="<?php
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
                                    }?>">
                                </div>
                                <h5>
                                    <span><a href="{{url("xiang?id=$v[c_id]&v=$vv&a=$a&l=$l")}}" target="_self"><?php echo $v['c_name']?></a></span>
                                </h5>
                                <div class="tips">
                                    <p class="text-ellipsis">类型:<?php echo $v['c_type']?></p>
                                    <p class="text-ellipsis">专业:<?php echo $v['c_direction']?></p>
                                    <span class="l ">更新完毕</span>
                <span class="l ml20">
                                <?php  echo $v['c_num']?>
                                人学习</span>
                                </div>
            <span class="time-label">
                                    9小时17分钟 | 初级
                            </span>
                                <b class="follow-label">跟我学</b>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
<style>
    .pagination{
        position:absolute;
        left:400px;
        bottom:-20px;
    }
    .pagination li{
        float:left;
        margin-left:10px;
        font-size:24px
    }
</style>
            <?=$shi->appends(['v'=>$vv,'a'=>$a,'l'=>$l,'top'=>$top])->render()?>
          </div>
    </div>
</div>


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

<script src="js/jquery-1.8.3.min.js"></script>
<script>
</script>

</body>
@endsection
</html>
