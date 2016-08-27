<!DOCTYPE html>
<!-- saved from url=(0021)http://www.lagou.com/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="23635710066417756375">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6">
<meta charset="UTF-8">

<title>招聘--面试宝典</title>
    <meta name="keywords" content="面试宝典网，面试宝典官网，mbaodian，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
    <meta name="description" content="面试宝典是学习编程最简单的免费平台。面试宝典提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
    <!-- 公共样式 -->
    <!-- header样式 -->   <!-- footer样式 -->
    <!-- 页面样式 -->
    <link rel="stylesheet" type="text/css" href="css/main.html_aio_2ff5795.css">
    <link rel="stylesheet" type="text/css" href="css/widgets_cd857e8.css">
    <link rel="stylesheet" type="text/css" href="css/main.html_aio_2_d6c0dcf.css">
<!-- <script src="css/jquery.validate.min_343f475.js" class="lazyload" charset="utf-8"></script> -->
<!-- <link href="css/loginpop_8eb0b34.css" rel="stylesheet" class="lazyload" charset="utf-8"> -->
{{--<script src="js/lagou_5427c0e.js" class="lazyload" charset="utf-8"></script>--}}
{{--<script src="js/c.js" type="text/javascript"></script>--}}



<link rel="stylesheet" href="css/d79d81e9ab144c28aae8b073106e6881.css" type="text/css" />

</head>
<body style="background:#fff;">
@extends('layouts.master')
@section('sidebar')
    @parent
    <!-- 公共html -->
    <!-- 页面公用结构、velocity变量 --><input type="hidden" value="" name="userid" id="userid">
<input type="hidden" id="serverTime" value="1460098202966">

    <!-- 城市分站 -->


    <!-- header -->
    
    <!--C端头部通栏广告位-->
    

    <!--验证注册邮箱-->
    <!--
    @require "common/widgets/header_c/modules/emailvalid/main.less"
-->
    <div id="lg_header">
    <!-- 全部 -->
    </div><!--end #header-->


    <!-- 页面主体START -->
    <div class="container clearfix" id="container" style="min-height: 844px; margin-top:20px; margin-left:150px;">

        <div id="sidebar" class="sidebar" style=" border-bottom:5px solid green;">
    <div class="mainNavs">
        @foreach($all as $key=>$value)                                                                                        
                <div class="menu_box">
            <div class="menu_main job_hopping">
                <h2 style=" margin-bottom:10px;">
                    {{$value['p_name']}}
                                        <!-- 跳槽月 -->
                                        <span></span>
                </h2>    
                @foreach($value['two'] as $ke=>$va)
             <a href="#" data-lg-tj-id="4A00" data-lg-tj-no="0001" data-lg-tj-cid="idnull" style=" font-size:14px; padding-left:3px; line-height:20px;" val="{{$va['three'][0]['p_name']}}" class="posi">{{$va['three'][0]['p_name']}}</a>
             @endforeach                                                    
              </div>
                
                    <div class="menu_sub dn">
                    @foreach($value['two'] as $k=>$v)
                                <dl>
                                        <dt>                                                          
                        <a href="#" data-lg-tj-id="4H00" data-lg-tj-no="0001" data-lg-tj-cid="idnull" class="posi" val="{{$v['p_name']}}">{{$v['p_name']}}</a>
                    </dt>
                    <dd>       
                    @foreach($v['three'] as $z=>$x)                                                          
       <a href="#" data-lg-tj-id="4O00" data-lg-tj-no="0122" data-lg-tj-cid="idnull" class="posi" val="{{$x['p_name']}}">{{$x['p_name']}}</a>
                    @endforeach
                                            </dd>
                </dl>
                    @endforeach    
                            </div>
                
        </div>
        @endforeach
 </div> 
</div>








        <div class="content">
            <ul class="job_tab">
        <li class="current" data-lg-tj-id="4X00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull">热门职位</li>
        <li data-lg-tj-id="gD00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull">最新职位</li>
</ul>
<div id="hotList" class="clearfix">
    
    <div class="hot_posHotPosition position_list init_joblist" id="position">
        <ul class="clearfix">
        @foreach($data as $q=>$w)
            <li class="position_list_item" data-jobid="1621796" data-positionid="1621796" data-salary="25k-40k" data-company="51Talk 无忧英语" data-positionname="运营总监" data-companyid="119153">


            

                <div class="pli_top">
                    <div class="fl pli_top_l">
                        <div class="position_name">
                            <!--  -->
            <h2 class="fl" style=" font-size:20px;"><a href="etc_sel?id={{$w['r_id']}}" target="_blank" class="position_link fl wordCut" data-index="0" data-lg-tj-id="4m00" data-lg-tj-no="0001" data-lg-tj-cid="1621796">{{$w['position_name']}}<span>[北京][{{$w['c_region']}}]</span></a></h2>
                            <!-- 此处需要和后台确认 -->
                            <span class="fl">{{$w['release_date']}}</span>
                        </div>
                        <div>
                            <span class="salary fl">{{$w['money']}}</span>
                            <span><!-- <i class="experience"></i>&nbsp;  -->{{$w['experience']}}</span> / <span>{{$w['education']}}</span>
                        </div>
                    </div>
                    <div class="fr pli_top_r">
                        <div class="company_name wordCut">
                    <span style=" font-size:16px;"><font color="black">{{$w['company_name']}}</font></span>
                        </div>
                        <div class="industry wordCut">
                            <span> {{$w['main_business']}}</span> / <span>{{$w['nature']}}</span>
                        </div>
                    </div>
                </div>
                <div class="pli_btm">
                    <div class="pli_btm_l fl wordCut">
                        “{{$w['welfare']}}”
                    </div>
                    <div class="pli_btm_r fl">
                          <span>{{$w['r_number']}}</span>
                          <span>{{$w['r_type']}}</span>                                    
                                                                        </div>
                </div>

            



            </li>
                @endforeach       
                                    </ul>
        {{$data->render()}}
    </div>
</div>




        </div>

    </div>
    <!-- 页面主体END -->

    <!-- footer <-->
   
<!-- feedback -->
<!--
    @require "common/widgets/footer_c/modules/feedback/feedback.less"
-->

<!--我要反馈按钮-->


<div id="feedback-con" style="bottom: 80px;">
    <div class="pfb-pho-close">
        <div class="pfb-pho"></div>
        <div class="pfb-close"></div>
    </div>

</div>



    <!-- 底部登陆条 -->
    <!--
    @require "common/widgets/login_toolbar/main.less"
-->

    <div>
        <em></em>
        
        <span class="companycount"><i style="background-position-y: -30px;"></i><i style="background-position-y: -30px;"></i><i style="background-position-y: -120px;"></i><b></b><i style="background-position-y: 0px;"></i><i style="background-position-y: -120px;"></i><i style="background-position-y: 0px;"></i></span>
        <span class="positioncount"><i style="background-position-y: -30px;"></i><b></b><i style="background-position-y: -180px;"></i><i style="background-position-y: -90px;"></i><i style="background-position-y: -150px;"></i><b></b><i style="background-position-y: 0px;"></i><i style="background-position-y: -30px;"></i><i style="background-position-y: -120px;"></i></span>
        <a class="bar_login passport_login_pop" href="javascript:;"><i></i></a>
        <div class="right">
            <a href="http://www.lagou.com/frontRegister.do?from=index_footerbar" onclick="_hmt.push([&#39;_trackEvent&#39;, &#39;button&#39;, &#39;click&#39;, &#39;register&#39;])" class="bar_register" id="bar_register" target="_blank" data-lg-tj-id="4t00" data-lg-tj-no="idnull" data-lg-tj-cid="idnull"><i></i></a>
        </div>
        <input type="hidden" id="cc" value="114040">
        <input type="hidden" id="cp" value="1635014">
    </div>
</div>


    <!-- jquery lib -->
    <!-- analytics js file -->  <!-- plat analytics js file --> <!-- plat ipinyou tj -->
    <noscript>&lt;img src="//stats.ipinyou.com/adv.gif?a=ga..n3f5DPSWZXFMcbQa2-GxjX&amp;e=" style="display:none;" /&gt;</noscript>


<script type="text/javascript" src="js/vendor_d53d12d.js"></script>
<script type="text/javascript" src="js/main.html_aio_4787e07.js"></script>
<script type="text/javascript" src="js/widgets_5256a4e.js"></script><script src="js/h.js" type="text/javascript"></script>
<script type="text/javascript" src="js/userinfo_7f282e9.js"></script>
<script type="text/javascript" src="js/layout_a28dd79.js"></script>
<script type="text/javascript" src="js/main.html_aio_2_d83ecb3.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>

    <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-1" tabindex="0" style="display: none; left: 538.5px;"></ul>
<script type="text/javascript" src="js/ipinyou_2be9977.js"></script>

<script src="js/js.php"></script><script src="js/ydap.js"></script><script src="js/ds.js" type="text/javascript"></script></body>
@endsection
</html>
