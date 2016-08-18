<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>

</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375">
<meta property="wb:webmaster" content="c4f857219bfae3cb">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Cache-Control" content="no-transform ">
<meta name="Keywords" content="">
<link rel="stylesheet" href="css/a2.css" type="text/css">
    <style>
        body,div,ul,li,p{margin:0;padding:0;}
        body{color:#666;font:12px/1.5 Arial;}
        ul{list-style-type:none;}
        #star{position:relative;width:600px;margin:0px auto;}
        #star ul,#star span{float:left;display:inline;height:25px;line-height:30px;}
        #star ul{margin:10px 10px;}
        #star li{float:left;height:28px;width:24px;cursor:pointer;text-indent:-9999px;background:url(images/star.png) no-repeat;}
        #star strong{color:#f60;padding-left:10px;}
        #star li.on{background-position:0 -30px;height:35px;}
        #star p{position:absolute;top:20px;width:159px;height:60px;display:none;background:url(images/icon.gif ) no-repeat;padding:7px 10px 0;}
        #star p em{color:#f60;display:block;font-style:normal;}
    </style>
    <script type="text/javascript">
        window.onload = function ()
        {
            var oStar = document.getElementById("star");
            var aLi = oStar.getElementsByTagName("li");
            var oUl = oStar.getElementsByTagName("ul")[0];
            var oSpan = oStar.getElementsByTagName("span")[1];
            var oP = oStar.getElementsByTagName("p")[0];
            var i = iScore = iStar = 0;
            var aMsg = [
                "很不满意|差得太离谱，面试根本不问这个问题",
                "不满意|内容不实用，去了公司用不到，不满意",
                "一般|内容一般，逻辑描述不清晰",
                "满意|逻辑挺好，内容晦涩了点，还是挺满意的",
                "非常满意|各方面都非常好，非常满意"
            ]
            for (i = 1; i <= aLi.length; i++)
            {
                aLi[i - 1].index = i;
                //鼠标移过显示分数
                aLi[i - 1].onmouseover = function ()
                {
                    fnPoint(this.index);
                    //浮动层显示
                    oP.style.display = "block";
                    //计算浮动层位置
                    oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
                    //匹配浮动层文字内容
                    oP.innerHTML = "<em><b>" + this.index + "</b> 分 " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
                };
                //鼠标离开后恢复上次评分
                aLi[i - 1].onmouseout = function ()
                {
                    fnPoint();
                    //关闭浮动层
                    oP.style.display = "none"
                };
                //点击后进行评分处理
                aLi[i - 1].onclick = function ()
                {
                    iStar = this.index;
                    oP.style.display = "none";
                    oSpan.innerHTML = "<strong>" + (this.index) + " 分</strong> (" + aMsg[this.index - 1].match(/\|(.+)/)[1] + ")"
                }
            }
            //评分处理
            function fnPoint(iArg)
            {
                //分数赋值
                iScore = iArg || iStar;
                for (i = 0; i < aLi.length; i++) aLi[i].className = i < iScore ? "on" : "";
            }
        };
    </script>
<body>

@extends('layouts.master')
@section('sidebar')
@parent
<?php
$vv=isset($_GET['v'])?$_GET['v']:0;
$a=isset($_GET['a'])?$_GET['a']:0;
$l=isset($_GET['l'])?$_GET['l']:0;
?>

<div id="main">

<div class="course-infos">
  <div class="w pr">
		
    <div class="hd">
        <h3 class="1"></h3>
        <h2 class="l"><br/> The good seaman<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; is known in bad weather.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </h2>
            <a href="javascript:void(0);" class="l video-desc-trigger" id="js-video-trigger">
        <i class="ic-video"></i>
      </a>
    </div>
    <div class="statics clearfix">
      <div class="static-item ">
        <span class="meta-value"><strong><?php echo $arr['c_direction']?></strong></span>
        <span class="meta">专业</span>
        <em></em>
      </div>
      <div class="static-item static-time">
        <span class="meta-value"><strong><?php echo $arr['c_type']?></strong></span>
        <span class="meta">类型</span>
        <em></em>
      </div>
      <div class="static-item">
        <span class="meta-value"><strong><?php echo $arr['c_num']?></strong></span>
        <span class="meta">学习人数</span>
        <em></em>
      </div>
    </div>
    <div class="extra">
      <!-- credit -->
      <div style="display: none;" class="share-rl-tips share-posi js-share-statue">
          <span>分享即可 +</span><strong>1积分</strong>
          <span class="rule-arrow"></span>
      </div>
      <!-- share -->
      <div data-bd-bind="1459252125792" class="share-action r bdsharebuttonbox bdshare-button-style0-16">
        分享
          <div class="bshare-custom"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
      </div>
      <i class="split-line r"></i>
        <?php
        if($follow){
        ?>
        <a href="javascript:;" onclick="zhu(<?php echo Session::get('uid')?>);" class="follow-action r js-follow-a  ction" data-cid="85">
            取消关注
        </a>
        <?php
        }else{
        ?>
        <a href="javascript:;" onclick="zhu(<?php echo Session::get('uid')?>);" class="follow-action r js-follow-a  ction" data-cid="85">
            关注
        </a>
        <?php
        }
        ?>
        </div>
  </div>
  <div class="info-bg" id="js-info-bg">
    <div class="cover-img-wrap">
      <img data-src="http://img.mukewang.com/55af49c2000117af06000338.jpg" alt="" style="display: none" id="js-cover-img">
    </div>
    <div class="cover-mask"></div>
  <canvas id="js-cover-canvas" class="cover-canvas" height="240" width="1349"></canvas></div>
</div>
<div class="course-info-main clearfix w">
  <div class="info-bar clearfix">
    <div class="info-bar-box">
      
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                    <a href="#" class="btn-red start-study-btn r">开始学习</a>
            <div class="score-info">
    <div class="satisfaction-degree-info">
        <h3>满意度评分</h3>
        <h4>9.9</h4>
        <div class="star-box">
            <img src="images/xing.jpg" width="20" height="20">
            <img src="images/xing.jpg" width="20" height="20">
            <img src="images/xing.jpg" width="20" height="20">
            <img src="images/xing.jpg" width="20" height="20">
            <img src="images/xing.jpg" width="20" height="20">
        </div>
    </div><!--satisfaction-degree-info end-->
        <div class="condition-box">
        <div class="condition">
            <h3>内容实用</h3>
            <p>9.9</p>
        </div>
        <div class="condition">
            <h3>通俗易懂</h3>
            <p>9.6</p>
        </div>
        <div class="condition">
            <h3>逻辑清晰</h3>
            <p>9.4</p>
        </div>
    </div><!--condition-box end-->
            <p class="person-num noLogin"><a href="javascript:;" target="_blank">1337人评价</a></p>
    </div><!--score-info end-->    </div><!--info-bar-box end-->
  </div>
  <div class="content-wrap">
    <div class="content">
      <div class="course-brief">
        <h3 class="ctit">试题名称</h3>
        <p class="auto-wrap"><?php echo  $arr['c_name']?></p>
      </div>
      <div class="course-outline">
        <div class="bar clearfix">
            <input type="hidden" id="s_id" value="<?php echo $arr['c_id']?>">
          <h3 class="ctit l">试题答案</h3>

        </div>
        <div class="outline-list">
            <ul>
                <li class="chapter clearfix ">
                  <i class="chapter-icon"></i>
                    <div class="chapter-bd l">
                     {{-- <h5 class="name">第1章 Java初体验</h5>--}}<p class="desc"><?php echo $arr['c_answer']?></p>
                    </div>
                </li>
            </ul>
        </div>
      </div>
        {{--试题选题功能--}}
        <div>
            <?php if($min){ ?>
            <a href="{{url("xiang?id=$min&v=$vv&a=$a&l=$l")}}">下一题</a>
            <? } ?>
            <?php if($max){ ?>
            <a href="{{url("xiang?id=$max&v=$vv&a=$a&l=$l")}}">上一题</a>
            <? } ?>
        </div>
        <?php
        if(Session::get('username')==""){
        $user_name = 0; ?>
        <div style="float: right"><a href="#login-modal" id="ping" data-category="UserAccount" data-action="login" data-toggle="modal"  style="color: red">立即评价</a></div>
        <?php }else{
        $user_name = 1; ?>
        <div style="float: right"><a href="javascript:void(0)"  id="ping" onclick="pingjia(<?php echo $user_name;?>)">立即评价</a></div>
        <?php  }
        ?>


        <!--
            评论功能 制作人:: 时庆庆
        -->
        <div id="pinglun">
            <div id="star" style="float:left;">
                <span>点击打分:</span>
                <ul style="float:left">
                    <li><a href="javascript:;"> 1 </a></li>
                    <li><a href="javascript:;"> 2 </a></li>
                    <li><a href="javascript:;"> 3 </a></li>
                    <li><a href="javascript:;"> 4 </a></li>
                    <li><a href="javascript:;"> 5 </a></li>
                </ul>
                <span id="score"></span>
                <p></p>
            </div>
            <textarea rows="5" cols="100" id="con" placeholder="请输入评论:" style="background:#ffffff"></textarea>
            <a href="javascript:void(0)" id="subs">提交评论</a></div>
        <div class="evaluation-list">
            <h3>试题评价</h3>
            <div class="evaluation-info clearfix">
                <p class="satisfaction">满意度评分：<em>9.9</em></p>
                <div class="star-box">
                    <img src="images/xing.jpg" width="20" height="20">
                    <img src="images/xing.jpg" width="20" height="20">
                    <img src="images/xing.jpg" width="20" height="20">
                    <img src="images/xing.jpg" width="20" height="20">
                    <img src="images/xing.jpg" width="20" height="20">
                </div><!--star-box end-->
                <p>内容实用：9.9</p>
                <p>通俗易懂：9.6</p>
                <p>逻辑清晰：9.4</p>
                <p class="person_num"><em>1337</em>位同学参与评价</p>
            </div><!--evaluation-info end-->
            <div class="evaluation">
                <?php foreach($ping as $k=>$v){?>
                <div class="evaluation-con" id="list">
                    <div class="content-box">
                        <a href="#" class="img-box"><span><img src="/{{$v['user_filedir']}}" width="40px" height="40px" alt="518000"></span></a>
                        <div class="user-info clearfix">
                            <a href="#" class="username"><?php echo $v['user_phone']?></a>
                            <div class="star-box">
                                @if($v['e_score'] == 1)
                                    <img src="images/xing.jpg" width="20" height="20">
                                @elseif($v['e_score'] == 2)
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                @elseif($v['e_score'] == 3)
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                @elseif($v['e_score'] == 4)
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                @else
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                    <img src="images/xing.jpg" width="20" height="20">
                                @endif
                            </div>
                        </div>
                        <p class="content"><?php echo $v['p_con']?></p>
                        <div class="info">
                            <span class="time">时间：<?php echo $v['e_addtime']?></span>
                        </div>
                    </div>
                    <!--content end-->
                </div>
                    <?php } ?><!--evaluation-con end--
            </div><!--evaluation end-->
            <!--evaluation end-->
        </div>
            <div class="more-evaluation"><a href="#" target="_blank">查看更多评价</a></div>
          </div><!--content end-->
    <div class="aside r">
      <div class="bd">

      <div class="box mb40">
      <h4>讲师提示</h4>
            <div class="teacher-info">
        <a href="http://www.imooc.com/u/112258/courses?sort=publish" target="_blank">
          <img src="picture/535f03950001915501400140-80-80.jpg" height="80" width="80">
        </a>
        <span class="tit">
          <a href="http://www.imooc.com/u/112258/courses?sort=publish" target="_blank">laurenyang</a><i class="icon-imooc"></i>
        </span>
        <span class="job">JAVA开发工程师</span>
      </div>
                  <div class="course-info-tip">
                <dl class="first">
          <dt>课程须知</dt>
          <dd class="autowrap">此部分为Java入门课程，适合零基础的小伙伴们，赶紧开始学习吧。</dd>
        </dl>
                        <dl>
          <dt>老师告诉你能学到什么？</dt>
          <dd class="autowrap">1、会配置Java开发环境，并使用工具进行程序开发
2、掌握Java中基本语法的使用

</dd>
        </dl>
              </div>
        </div>
  
          
<div class="cp-other-learned  js-comp-tabs">
  <div class="cp-header clearfix">
    <h2 class="cp-tit l">该课的同学还学过</h2>
    <ul class="cp-tabs r">

            <li class="l">
        <a href="javascript:;" class="on js-comp-tab-item" data-pannel="course">课程</a>
      </li>
      <li class="l end"><a href="javascript:;" class="js-comp-tab-item" data-pannel="plan">计划</a></li>
          </ul>
  </div>
  <div class="cp-body">
    <div class="cp-tab-pannel js-comp-tab-pannel" data-pannel="course" style="display: block">
    <!-- img 200 x 112 -->
      <ul class="other-list">
                <li class="curr">
          <a href="http://www.imooc.com/view/124?src=sug" target="_blank">
            <img src="picture/53b65f70000148d306000338-240-135.jpg" alt="Java入门第二季">
            <span class="name autowrap">Java入门第二季</span>
          </a>
        </li>
                <li>
          <a href="http://www.imooc.com/view/110?src=sug" target="_blank">
            <img src="picture/537587c60001def606000338-240-135.jpg" alt="Java入门第三季">
            <span class="name autowrap">Java入门第三季</span>
          </a>
        </li>
                <li>
          <a href="http://www.imooc.com/view/9?src=sug" target="_blank">
            <img src="picture/529dc3380001379906000338-240-135.jpg" alt="HTML+CSS基础课程">
            <span class="name autowrap">HTML+CSS基础课程</span>
          </a>
        </li>
                <li>
          <a href="http://www.imooc.com/view/96?src=sug" target="_blank">
            <img src="picture/53bf89100001684e06000338-240-135.jpg" alt="Android攻城狮的第一门课（入门篇）">
            <span class="name autowrap">Android攻城狮的第一门课（入门篇）</span>
          </a>
        </li>
                <li>
          <a href="http://www.imooc.com/view/36?src=sug" target="_blank">
            <img src="picture/53e1d0470001ad1e06000338-240-135.jpg" alt="JavaScript入门篇">
            <span class="name autowrap">JavaScript入门篇</span>
          </a>
        </li>
              </ul>
    </div>
        <div class="cp-tab-pannel js-comp-tab-pannel" data-pannel="plan">
      <ul class="other-list">
                <li class="curr">
          <a href="http://www.imooc.com/course/programdetail/pid/29?src=sug" target="_blank">
            <img src="picture/55aef90d0001f2a502400180-240-135.jpg" alt="高德开发者必由之路——Android SDK篇">
            <span class="name autowrap">高德开发者必由之路——Android SDK篇</span>
          </a>
        </li>
                <li>
          <a href="http://www.imooc.com/course/programdetail/pid/31?src=sug" target="_blank">
            <img src="picture/56551e6700018b0c09600720-240-135.jpg" alt="Java工程师">
            <span class="name autowrap">Java工程师</span>
          </a>
        </li>
                <li>
          <a href="http://www.imooc.com/course/programdetail/pid/33?src=sug" target="_blank">
            <img src="picture/56551e450001afcd09600720-240-135.jpg" alt="Android工程师">
            <span class="name autowrap">Android工程师</span>
          </a>
        </li>
              </ul>
    </div>
      </div>
</div>

</div>    </div>
  </div>
  <div class="clear"></div>

</div>
<!-- 视频介绍 -->
<div id="js-video-wrap" class="video pop-video" style="display:none">
    <div class="video_box" id="js-video"></div>
    <a href="javascript:;" class="pop-close icon-close"></a>
</div>

</div>

@endsection
<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="http://www.imooc.com/user/feedback" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="http://www.imooc.com/mobile/app">
        <div class="elevator-app-box">
        </div>
    </a>
    <a class="elevator-top" href="javascript:;" style="display: none;" id="backTop"></a>
</div>


<!--script-->
<script src="js/ssologin.js"></script>

<script type="text/javascript">
</script>
<div class="mask"></div>
</body></html>
<script src="js/jquery-1.8.3.min.js"></script>
<script>
   $(function(){
       $("#pinglun").hide()
   })
    $(document).on("click",'#ping',function(){
        $("#pinglun").show()
        $("#ping").hide()
    })
   //评论
   $(document).on("click","#subs",function(){
       var con=$("#con").val();
       var c_id=$("#s_id").val();
       var score=$("#score").html();
       if(score == ''){
           $("#score").html("<span style='color: red'>请点击打分</span>")
       }else{
           if(con == '') {
               alert('请输入评论内容')
           }else{
               $.ajax({
                   type: "POST",
                   url: "pinglun_shiti",
                   data: "con="+con+"&c_id="+c_id+"&score="+score,
                   success: function(msg){
                       alert('评论成功');
                       $("#pinglun").hide();
                       $('.evaluation').html(msg);
                   }
               });
           }
       }
   })
    //关注
    function zhu(uid)
   {
       var c_id=$("#s_id").val()
       $.ajax({
           type: "POST",
           url: "{{URL('state')}}",
           data: "c_id="+c_id+"&u_id="+uid,
           success: function(data){
               //alert(data);
               obj=eval("("+data+")");
               if(obj['msg']=='2')
               {
                   alert("请先登录");
                   location.href="{{URL('index')}}";die;
               }
               if(obj['msg']=='3')
               {
                  //alert("取消关注");
                   $('.follow-action').html("关注");
               }
               else
               {
                   $('.follow-action').html("取消关注");
               }

           }
       });
   }
</script>
