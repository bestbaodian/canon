
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

<div class='search-warp clearfix' style='min-width: 32px; height: 60px;'>
    <div class="search-area min" data-search="top-banner">
        <input class="search-input" data-suggest-trigger="suggest-trigger" placeholder="请输入想搜索的内容..." type="text" autocomplete="off">
        <input type='hidden' class='btn_search' data-search-btn="search-btn" />
        <ul class="search-area-result" data-suggest-result="suggest-result">
        </ul>
    </div>
            <div class='showhide-search' data-show='no'><i class='icon-search'></i></div>
</div>
<div id="main">


<div class="wenda clearfix">

  <div class="js-layout-change">
    <div class="l wenda-main">
      <div class="wd-top-slogan">
        <span>程序员自己的问答社区</span>
        <a class="js-quiz" href="save">我要提问</a>
      </div>
      <div class="nav">
      </div>
      <!--.nav end-->
      <!--推荐位-->
                  <ul class="recommend">
                
              </ul><!--recommend end-->
                  <!--左侧列表内容-->
      <div >

<?php foreach($pro as $k=>$v){?>



<div class="ques-answer">
    <div class="tag-img">
                                            <a href="#" target="_blank">
                <img src="picture/563afeb5000149c000900090.jpg" title="28"/>
            </a>
                                                            </div><!--.tag-img end-->
        <div class="from-tag">        来自

                <a href="/detail" id="timu"><?php echo $v['d_name']?></a>的<a href="" target="_top"><b><?php echo $v['user_name']?></b></a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="detail?id=<?php echo $v['t_id']?>" class="ques-con-content" target="_blank" title="#include&amp;lt;stdio.h&amp;gt;#include&amp;lt;string.h&amp;gt;int main(){struct student{long nu;char name[10];int age;};struct student stu_i;struct student*p;p=&amp;amp;stu_i;stu_1.nu =201601;stu_1.age =12;strcpy(stu_1.name ,&quot;xiong&quot;);stu_2.nu =201602;stu_2.age =15;strcpy(stu_2.name ,&quot..."><?php echo $v['t_title'];?></a>

    </div>
        <div class="answer-con first" data-answer-id="156328" id="answer-con">
        <div class="user">
        </div>
        <div class="answer-content">
            <?php echo $v['t_content'];?>
        </div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="312708" data-answer-id="156328" data-hasop="">
            <em class='bb' id="<?php echo $v['t_id'] ?>">赞同</em>
            </span>
            <span class="agree-with " data-ques-id="312708" data-answer-id="156328" data-hasop="">
            <em class='aa' >评论</em>
            </span>
            <div class="share-box clearfix">
                
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_156328" data-quesid="156328">
                        <a class="bds_weixin icon-share-weichat" data-cmd="weixin"></a>
                        <a class="bds_tsina icon-share-weibo" data-cmd="tsina"></a>
                        <a class="bds_qzone icon-share-qq" data-cmd="qzone" href="#"></a>
                    </div>
                </div>
            </div>

            <span class="shrink">收起</span>
        </div><!--.ctrl-bar end-->
    </div><!--.answer-con end-->
    <div class="reply-con">
        <ul class="reply-list">
           

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <span class="no-login-pic"><i class="icon-ques-revert"></i></span>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <span class="no-login-user-name">未知生物</span>
                            </div>
            <div class="textarea-con">
                <textarea ></textarea>
                                
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="156328" data-ques-uid="2413329">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->



<?php } ?>
<style>
        .pager{
            position:absolute;
            left:400px;
            bottom:-20px;
        }
        .pager li{
            float:left;
            margin-left:100px;
            font-size:xx-large;
        }
</style>
             <?php echo $pro->links(); ?>


</div>
    </div> 
    <?php $pro->render() ?>
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


<!--script-->
<script src="js/ssologin.js"></script>
<script type="text/javascript" src="js/sea.js"></script>
<script type="text/javascript" src="js/sea_config.js"></script>






<div style="display: none">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Ff0cfcccd7b1393990c78efdeebff3968' type='text/javascript'%3E%3C/script%3E"));
(function (d) {
window.bd_cpro_rtid="rHT4P1c";
var s = d.createElement("script");s.type = "text/javascript";s.async = true;s.src = location.protocol + "//cpro.baidu.com/cpro/ui/rt.js";
var s0 = d.getElementsByTagName("script")[0];s0.parentNode.insertBefore(s, s0);
})(document);
</script>
<script>
(function(){
    var bp = document.createElement('script');
    bp.src = '//push.zhanzhang.baidu.com/push.js';
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();

</script>

<script type="text/javascript" src='../js/jquery-1.9.1.js'></script>
<script type="text/javascript">
    /* $(".bb").click( function () {
           var zid=$(this).attr("pp"); 
            //alert(zid)
             $.ajax({
               type: "GET",
               url: "zid",
               data: "name="+zid,
               success: function(msg){
                   // alert(msg)
                   if(msg=='1'){
                        alert('点赞成功');
                    }
                    else{
                        alert('取消成功');
                    }
               }
            });
     });  */
</script>
</div>
</body>
@endsection
</html>
<script>
var emojiconfig = {
    tieba: {
        name: "贴吧表情",
        path: "img/tieba/",
        maxNum: 50,
        file: ".jpg",
        placeholder: ":{alias}:",
        alias: {
            1: "hehe",
            2: "haha",
            3: "tushe",
            4: "a",
            5: "ku",
            6: "lu",
            7: "kaixin",
            8: "han",
            9: "lei",
            10: "heixian",
            11: "bishi",
            12: "bugaoxing",
            13: "zhenbang",
            14: "qian",
            15: "yiwen",
            16: "yinxian",
            17: "tu",
            18: "yi",
            19: "weiqu",
            20: "huaxin",
            21: "hu",
            22: "xiaonian",
            23: "neng",
            24: "taikaixin",
            25: "huaji",
            26: "mianqiang",
            27: "kuanghan",
            28: "guai",
            29: "shuijiao",
            30: "jinku",
            31: "shengqi",
            32: "jinya",
            33: "pen",
            34: "aixin",
            35: "xinsui",
            36: "meigui",
            37: "liwu",
            38: "caihong",
            39: "xxyl",
            40: "taiyang",
            41: "qianbi",
            42: "dnegpao",
            43: "chabei",
            44: "dangao",
            45: "yinyue",
            46: "haha2",
            47: "shenli",
            48: "damuzhi",
            49: "ruo",
            50: "OK"
        },
        title: {
            1: "呵呵",
            2: "哈哈",
            3: "吐舌",
            4: "啊",
            5: "酷",
            6: "怒",
            7: "开心",
            8: "汗",
            9: "泪",
            10: "黑线",
            11: "鄙视",
            12: "不高兴",
            13: "真棒",
            14: "钱",
            15: "疑问",
            16: "阴脸",
            17: "吐",
            18: "咦",
            19: "委屈",
            20: "花心",
            21: "呼~",
            22: "笑脸",
            23: "冷",
            24: "太开心",
            25: "滑稽",
            26: "勉强",
            27: "狂汗",
            28: "乖",
            29: "睡觉",
            30: "惊哭",
            31: "生气",
            32: "惊讶",
            33: "喷",
            34: "爱心",
            35: "心碎",
            36: "玫瑰",
            37: "礼物",
            38: "彩虹",
            39: "星星月亮",
            40: "太阳",
            41: "钱币",
            42: "灯泡",
            43: "茶杯",
            44: "蛋糕",
            45: "音乐",
            46: "haha",
            47: "胜利",
            48: "大拇指",
            49: "弱",
            50: "OK"
        }
      },
    AcFun:{
    	name : "AcFun表情",
    	path : "img/AcFun/",
    	maxNum : 54,
    	file : ".png"
    }
  };
$('.Main').myEmoji({emojiconfig : emojiconfig});
$('.Main3').myEmoji();
$('.Main2').myEmoji();
</script> 
