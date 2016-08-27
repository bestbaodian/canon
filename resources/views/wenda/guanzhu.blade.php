<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>
php技术问答,php技术社区-慕课网猿问</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
    <meta name="keywords" content="面试宝典网，面试宝典官网，mbaodian，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
    <meta name="description" content="面试宝典是学习编程最简单的免费平台。面试宝典提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />

<meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>



<link rel="stylesheet" href="/static/moco/v1.0/dist/css/moco.min.css" type="text/css" />

<script type="text/javascript">

eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('!4(){3 6=a;3 l=4(){3 b,e=9 y("(^| )"+"c=([^;]*)(;|$)");j(b=h.g.z(e)){k w(b[2])}x{k a}};3 8=4(t){3 f=l();3 7=9 o();7.A(7.d()+B*i*i*r);h.g="c="+t+";s="+7.M()+";N=/;L=O.m";j(t&&t!=f){Q.P.G()}};3 5=9 E();5.H=4(){K(6);6=a;8(0)};5.J=4(){8(1)};6=I(4(){5.n="";8(1)},F);5.n=\'R://p.u.m/p/v/q/D.C?t=\'+9 o().d()}()',54,54,'|||var|function|imgobj|timer|exp|setcookie|new|null|arr|IMCDNS|getTime|reg|_0|cookie|document|60|if|return|getcookie|com|src|Date|static|common|1000|expires||mukewang|img|unescape|else|RegExp|match|setTime|24|png|logo|Image|3000|reload|onload|setTimeout|onerror|clearTimeout|domain|toGMTString|path|imooc|location|window|http'.split('|'),0,{}))

</script>
<script type="text/javascript">
  var OP_CONFIG={"module":"wenda","page":"wdcategory","userInfo":{"uid":"3823741","nickname":"weixin_\u68a6\u60f3\u9065\u4e0d\u53ef\u53ca_03823741","head":"http:\/\/img.mukewang.com\/user\/57ae93460001181e06400640-80-80.jpg","usertype":"1","roleid":0}};
  var isLogin = 1;
var is_choice = "";
  var seajsTimestamp="v=2016081011958";
    var ownName="13126726903@163.com"
  </script>



<link rel="stylesheet" href="http://static.mukewang.com/static/css/??base.css,common/common-less.css,wenda/wenda-less.css?t=1,poplogin-less.css?v=1470984066" type="text/css" />
</head>
<body >

<div id="header">
    <div class="page-container" id="nav">
        <a href="/" target="_self"><img src="/images/login.png" style="float: left; padding-top:6px;"><a href="index" target="_self" class="hide-text"></a>
        <div class="g-menu-mini l">
            <ul class="nav-item l">
                <li><a href="{{url('shiti')}}"  target="_self">试题</a></li>
                <li><a href="{{url('program')}}"  target="_self">招聘</a></li>
                <li><a href="{{url('article')}}"  target="_self">方法</a></li>
                <li><a href="{{url('company')}}"  target="_self">简历</a></li>
		        <li><a href="{{url('wenda')}}" target="_self">答疑</a></li>
            </ul>
        </div>
        <div id="login-area">
            <ul    <?php if(empty(Session::get('username'))){ ?> class="header-unlogin clearfix" <?php }else{ ?> class="clearfix logined" <?php }?>>
                <li class="header-app">
                    <a href="/mobile/app">
                        <span class="icon-appdownload"></span>
                    </a>
                    <div class="QR-download">
                        <p id="app-text">面试宝典APP下载</p>
                        <!--<p id="app-type">iPhone / Android / iPad</p>-->
                        <img src="/images/erweima.png">
                    </div>
                </li>
		    <?php
                if(empty(Session::get('username'))){
                        ?>
                <li class="header-signin">
                    <a href="#login-modal" id="" data-category="UserAccount" data-action="login" data-toggle="modal" >登录</a>
                </li>
                <li class="header-signup">
                    <a href="#signup-modal" id="js-signup-btn" data-category="UserAccount" data-action="login" data-toggle="modal" >注册</a>
                </li>
                    <?php
                    }else{
                        ?>

                <li class="remind_warp">
                    <i class="msg_remind" style="display: none;"></i>
                    <a href="{{url('sms/messagesone')}}" target="_blank"><i class="icon-notifi"></i></a>
                </li>
        	    <li class="my_message">
                    <a target="_blank" title="我的消息" href="{{url('sms/messages')}}">
                        <span style="display: inline;" class="msg_icon">3</span>
                        <i class="icon-mail"></i>
                        <span style="display: none;">我的消息</span>
                    </a>
                </li>
                <li class="set_btn user-card-box">
                    <a target="_self" href="{{url('user/setprofile')}}" action-type="my_menu" class="user-card-item" id="header-avator">
                        <img width="40" height="40" src="/<?php if(Session::get('user_filedir')){ echo Session::get('user_filedir'); }else{ echo "images/unknow-160.png"; };?>"> <!--images/unknow-160.png-->
                        <i style="display: none;" class="myspace_remind"></i>
                        <span style="display: none;">动态提醒</span>
                    </a>
                    <div class="g-user-card">
                        <div class="card-inner">
                            <div class="card-top">
                                <a href="{{url('user/setprofile')}}"><img class="l" alt="{{ Session::get('username') }}" src="/<?php if(Session::get('user_filedir')){ echo Session::get('user_filedir'); }else{ echo "images/unknow-160.png"; };?>"></a>
                                <a href="{{url('user/setprofile')}}"><span class="name text-ellipsis">{{ Session::get('username') }}</span></a>
                                <p class="meta">
					<a href="{{url('user/setprofile')}}">经验<b id="js-user-mp">550</b></a>
					<a href="{{url('user/setprofile')}}">积分<b id="js-user-credit">0</b></a></p>

                                <a class="icon-set setup" href="{{url('user/setprofile')}}"></a>
                            </div>
                            <!--
                            <div class="card-links">
                                <a href="/space/index" class="my-mooc l">我的慕课<i class="dot-update"></i></a>
                                <span class="split l"></span>
                                <a href="/myclub/myquestion/t/ques" class="my-sns l">我的社区</a>
                            </div>
                            -->
                            <div class="card-history">
                                <span class="history-item">
                                    <span class="tit text-ellipsis">python进阶</span>
                                    <span class="media-name text-ellipsis">2-9 闭包</span>
                                    <i class="icon-clock"></i>
                                     <a class="continue" href="/video/6059">继续</a>
                                </span>
                            </div>
                            <div class="card-sets clearfix">
                                <a class="l mr30" target="_blank" href="{{url('wenda/save')}}">发问题</a>
                                <a class="l" target="_blank" href="{{url('publish')}}">写文章</a>
                                <a class="r" href="{{url('out')}}">退出</a>
                            </div>
                        </div>
                        <i class="card-arr"></i>
                    </div>
                </li>

                    <?php
                    }
                ?>
            </ul>
        </div>
        <div class='search-warp clearfix' style='min-width: 32px; height: 60px;'>
            <div class="search-area min" data-search="top-banner">
                <input class="search-input" data-suggest-trigger="suggest-trigger" placeholder="请输入想搜索的内容..." type="text" autocomplete="off">
                <input type='hidden' class='btn_search' data-search-btn="search-btn" />
                <ul class="search-area-result" data-suggest-result="suggest-result">
                </ul>
            </div>
            <div class='showhide-search' data-show='no'><i class='icon-search'></i></div>
        </div>
    </div>
</div>

<div class="bindHintBox js-bindHintBox hide">
    <div class="pr">
        为了账号安全，请及时绑定邮箱和手机<a href="/user/setbindsns" class="ml20 color-red" target="_blank">立即绑定</a>
        <button  class="closeBindHint js-closeBindHint" type="button"></button>
        <div class="arrow"> </div>
    </div>
</div>


<div id="main">

<div class="current-label">
    <img src="http://img.mukewang.com/563afd9d0001d30a00900090-100-100.jpg" alt=""/>
    <h3>PHP</h3>
    <p class="content">PHP一种被广泛应用的开放源代码的多用途脚本语言，和其他技术相比，php本身开源免费； 可以将程序嵌入于HTML中去执行， 执行效率比完全生成htmL标记的CGI要高许多，它运行在服务器端，消耗的系统资源相当少，具有跨平台强、效率高的特性，而且php支持几乎所有流行的数据库以及操作系统，最重要的是PHP还可以用C、C  进行程序的扩展，PHP语言在WEB开发方面有着非常广泛的应用，除此之外，PHP4，PHP5中，面向对象有了很大的改进，还可以用来开发大型商业程序。</p>
        <div class="show js-show"><i class="icon-down2"></i></div>
            <div class="follow cancel" data-tag-id="2">取消关注</div>
    </div><!--current-label end-->
<div class="wenda clearfix">
    <div class="js-layout-change">
        <div class="l wenda-main">
            <div class="nav">
                <a href="/wenda/2" class="active">推荐</a>
                <a href="/wenda/2/new" >最新</a>
                <a href="/wenda/2/waitreply" >等待回答</a>
            </div><!--.nav end-->
            <!--推荐位-->
                                                <ul class="recommend">
                                        <li><i class="icon-flag2"></i><a href="http://www.imooc.com/wenda/detail/325341" data-ast="yuanwenindex_1_639" target="_blank" title="遇见好答案，Android开发问答专场">遇见好答案，Android开发问答专场</a></li>
                                        </ul><!--recommend end-->
                                        <!--左侧列表内容-->
            <div class="wenda-list">
            <script>
    window._bd_share_config = {
        share : [
                                    {
                "tag" : 'share_326065',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/326065',
                "bdText":'[慕课猿问：php初学者用什么软件编写呢，zend？还是用Editplus呢？ (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325990',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325990',
                "bdText":'[慕课猿问：打开慕课网http://www.imooc.com到首页后面没有.html或.php文件，怎么做到的？ (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186804',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186804',
                        "bdText":'[慕课猿问：打开慕课网http://www.imooc.com到首页后面没有.html或.php文件，怎么做到的？ 回答者:0936zz (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325961',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325961',
                "bdText":'[慕课猿问：wamp和lamp哪个更好啊，我是PHP初学者，只会JS (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186628',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186628',
                        "bdText":'[慕课猿问：wamp和lamp哪个更好啊，我是PHP初学者，只会JS 回答者:蓝灵焰 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_326062',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/326062',
                "bdText":'[慕课猿问：mysql 用主键排序 会提高效率吗 (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325987',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325987',
                "bdText":'[慕课猿问：编程到了35岁是不是只能做管理了 (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325946',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325946',
                "bdText":'[慕课猿问：怎么弄网站logo。 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186606',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186606',
                        "bdText":'[慕课猿问：怎么弄网站logo。 回答者:丶疯老头 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325988',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325988',
                "bdText":'[慕课猿问：epp4的代码点击运行没有反应，在浏览器输入地址里却可以运行，这是为什么？ (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325978',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325978',
                "bdText":'[慕课猿问：测试文件出现乱码 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186680',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186680',
                        "bdText":'[慕课猿问：测试文件出现乱码 回答者:捷克轩 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325972',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325972',
                "bdText":'[慕课猿问：请问这里的问号怎么回事 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186757',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186757',
                        "bdText":'[慕课猿问：请问这里的问号怎么回事 回答者:慕粉3832773 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_326044',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/326044',
                "bdText":'[慕课猿问：php字串符相关问题 (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325928',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325928',
                "bdText":'[慕课猿问：PHP 真的设计很糟糕吗？那还有没有必要深入研究？ (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186537',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186537',
                        "bdText":'[慕课猿问：PHP 真的设计很糟糕吗？那还有没有必要深入研究？ 回答者:丶疯老头 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325962',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325962',
                "bdText":'[慕课猿问：PHP那些奇奇怪怪的函数名需要花时间记一下吗？ (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186611',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186611',
                        "bdText":'[慕课猿问：PHP那些奇奇怪怪的函数名需要花时间记一下吗？ 回答者:qq_我的太阳永远不落_0 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_326018',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/326018',
                "bdText":'[慕课猿问：JS进阶7-16编程题看一下我的程序怎么可以实现？ (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186777',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186777',
                        "bdText":'[慕课猿问：JS进阶7-16编程题看一下我的程序怎么可以实现？ 回答者:火丁啊 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_326013',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/326013',
                "bdText":'[慕课猿问：为什么我的微信公众号开发调试正确却显示不出来呢？ (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186759',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186759',
                        "bdText":'[慕课猿问：为什么我的微信公众号开发调试正确却显示不出来呢？ 回答者:丶包菜 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_326007',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/326007',
                "bdText":'[慕课猿问：如何安装php环境 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186751',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186751',
                        "bdText":'[慕课猿问：如何安装php环境 回答者:tobbyvic (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_326006',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/326006',
                "bdText":'[慕课猿问：三层架构和MVC有什么区别啊 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186845',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186845',
                        "bdText":'[慕课猿问：三层架构和MVC有什么区别啊 回答者:快乐的时光 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325999',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325999',
                "bdText":'[慕课猿问：WAMP一直显示黄色怎么办?求助大神,弄了好久都没弄好 (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325994',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325994',
                "bdText":'[慕课猿问：MVC单一入口跳转时 是不是每次都重新实例化一个mysql连接 (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325993',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325993',
                "bdText":'[慕课猿问：在admin.inc.php中报adminId没有定义怎么处理，求大神指导 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186747',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186747',
                        "bdText":'[慕课猿问：在admin.inc.php中报adminId没有定义怎么处理，求大神指导 回答者:捷克轩 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325974',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325974',
                "bdText":'[慕课猿问：微信多客服 (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325968',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325968',
                "bdText":'[慕课猿问：如何用mysqli在一个php文件里包含另一个php文件 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186643',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186643',
                        "bdText":'[慕课猿问：如何用mysqli在一个php文件里包含另一个php文件 回答者:yemaa (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325926',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325926',
                "bdText":'[慕课猿问：php中die什么意思 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186518',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186518',
                        "bdText":'[慕课猿问：php中die什么意思 回答者:tangjunfeng (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325930',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325930',
                "bdText":'[慕课猿问：新人求助 关于登录注册写数据库的问题，代码如下。 (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186527',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186527',
                        "bdText":'[慕课猿问：新人求助 关于登录注册写数据库的问题，代码如下。 回答者:0936zz (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325925',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325925',
                "bdText":'[慕课猿问：请问各位$_REQUEST和$_POST的区别是什么? (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186519',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186519',
                        "bdText":'[慕课猿问：请问各位$_REQUEST和$_POST的区别是什么? 回答者:tangjunfeng (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325817',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325817',
                "bdText":'[慕课猿问：php错误提示,求助! (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186268',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186268',
                        "bdText":'[慕课猿问：php错误提示,求助! 回答者:U_SB (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325819',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325819',
                "bdText":'[慕课猿问：php中什么是最要学的？ (分享自@慕课网)#慕课爱分享#'
            }
                                                    ,{
                        "tag" : 'share_answer_186256',
                        "bdUrl" : 'http://www.imooc.com/wenda/wdanswer/186256',
                        "bdText":'[慕课猿问：php中什么是最要学的？ 回答者:夜袭开发站 (分享自@慕课网)#慕课爱分享#'
                    }
                                                        ,            {
                "tag" : 'share_325891',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325891',
                "bdText":'[慕课猿问：请教使用php开发需要注意的各种安全问题？ (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325868',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325868',
                "bdText":'[慕课猿问：mvc架构模式分析与设计那门课教程为什么放到服务器上无法使用 (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325849',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325849',
                "bdText":'[慕课猿问：ci网站上传出现的错误 (分享自@慕课网)#慕课爱分享#'
            }
                                        ,            {
                "tag" : 'share_325831',
                "bdUrl" : 'http://www.imooc.com/wenda/detail/325831',
                "bdText":'[慕课猿问：PHP中如何实现观看Word文档 (分享自@慕课网)#慕课爱分享#'
            }
                            
        ]
    };
</script>

<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/326065"  class="ques-con-content" target="_blank" title="php初学者用什么软件编写呢，zend？还是用Editplus呢？">php初学者用什么软件编写呢，zend？还是用Editplus呢？</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/326065" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/326065" class="answer-num">5个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="326065"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/5" target="_blank">
                <img src="http://img.mukewang.com/563affe40001680c00900090.jpg" title="Html/CSS"/>
            </a>
                                                                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/5" target="_blank">Html/CSS</a>
                <a href="/wenda/17" target="_blank">JavaScript</a>
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325990" class="ques-con-content" target="_blank" title="打开慕课网http://www.imooc.com到首页后面没有.html或.php文件，怎么做到的？">打开慕课网http://www.imooc.com到首页后面没有.html或.php文件，怎么做到的？</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186804" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/2479172/bbs" target="_blank">0936zz</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">我个人感觉慕课网的后端八成是node写的，nodejs和php的运行方式简直天上地下我就这么给你说吧，nodejs的天生伪静态，楼主知道php的伪静态么，在php中伪静态根本不是有那么个文件，而是通过服务器检测访问的路径然后转到某个php文件，大概是这样的而用nodejs一般是把数据从数据库中取出，然后通过模板引擎（比如ejs）渲染，最后显示在页面上，也就是说nodejs是根本不需要index文件的！！！一个入口文件，起一个node服务器足矣现在已经不是八成了，现在是十成啊，我TM真够真机智的<...图片...><span class="see-more">[ 查看全部 ]</span></div>
        <div class="answer-content-all rich-text imgPreview"><p>我个人感觉慕课网的后端八成是node写的，nodejs和php的运行方式简直天上地下</p><p>我就这么给你说吧，nodejs的天生伪静态，楼主知道php的伪静态么，在php中伪静态根本不是有那么个文件，而是通过服务器检测访问的路径然后转到某个php文件，大概是这样的</p><p>而用nodejs一般是把数据从数据库中取出，然后通过模板引擎（比如ejs）渲染，最后显示在页面上，也就是说nodejs是根本不需要index文件的！！！一个入口文件，起一个node服务器足矣<br /></p><p><br /></p><p>现在已经不是八成了，现在是十成啊，我TM真够真机智的</p><p><img src="http://img.mukewang.com/57b1aec50001502902300209.jpg" alt="http://img.mukewang.com/57b1aec50001502902300209.jpg" /></p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with active" data-ques-id="325990" data-answer-id="186804" data-hasop="1"><b>已赞同</b><em>4</em></span>
            <span class="oppose " data-ques-id="325990" data-answer-id="186804" data-hasop="1">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186804" data-quesid="325990">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186804" data-ques-uid="2737388">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325961" class="ques-con-content" target="_blank" title="wamp和lamp哪个更好啊，我是PHP初学者，只会JS">wamp和lamp哪个更好啊，我是PHP初学者，只会JS</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186628" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/1110510/bbs" target="_blank">蓝灵焰</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">谢邀！前期初学可以使用wamp，当然linux也是必学的，前期只要对linux了解和简单使用就好。公司里开发环境还是wamp居多，慢慢对linux了解更多之后，就转吧。要想到大牛级别提高自己，以后linux是必走之路。linux开始学起来会比较枯燥，所以为了不给学习曲线增加难度，建议使用wamp</div>
        <div class="answer-content-all rich-text imgPreview"><p>谢邀！</p><p>前期初学可以使用wamp，当然linux也是必学的，前期只要对linux了解和简单使用就好。公司里开发环境还是wamp居多，慢慢对linux了解更多之后，就转吧。要想到大牛级别提高自己，以后linux是必走之路。</p><p>linux开始学起来会比较枯燥，所以为了不给学习曲线增加难度，建议使用wamp</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with active" data-ques-id="325961" data-answer-id="186628" data-hasop="1"><b>已赞同</b><em>4</em></span>
            <span class="oppose " data-ques-id="325961" data-answer-id="186628" data-hasop="1">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186628" data-quesid="325961">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186628" data-ques-uid="3440283">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/11" target="_blank">
                <img src="http://img.mukewang.com/563aff910001771f00900090.jpg" title="Mysql"/>
            </a>
                                                            </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/11" target="_blank">Mysql</a>
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/326062"  class="ques-con-content" target="_blank" title="mysql 查询时用主键排序 会提高效率吗">mysql 用主键排序 会提高效率吗</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/326062" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/326062" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="326062"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325987"  class="ques-con-content" target="_blank" title="编程到了35岁是不是只能做管理了">编程到了35岁是不是只能做管理了</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325987" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325987" class="answer-num">3个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325987"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325946" class="ques-con-content" target="_blank" title="怎么弄网站logo。">怎么弄网站logo。</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186606" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/317109/bbs" target="_blank">丶疯老头</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">可以去这个网站搜索一下你的网站的一些关键词，会给你提供很多的图标，然后再根据自己网站的特色进行扩展延伸就行前往</div>
        <div class="answer-content-all rich-text imgPreview"><p>可以去这个网站搜索一下你的网站的一些关键词，会给你提供很多的图标，然后再根据自己网站的特色进行扩展延伸就行</p><p><a href="http://www.easyicon.net">前往</a></p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325946" data-answer-id="186606" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="325946" data-answer-id="186606" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186606" data-quesid="325946">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186606" data-ques-uid="2882679">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325988"  class="ques-con-content" target="_blank" title="在浏览器输地址http://localhost/工程名/文件名 这样的方式可以运行，但是epp4的代码点击红色框那里的运行没有反应，这是为什么？">epp4的代码点击运行没有反应，在浏览器输入地址里却可以运行，这是为什么？</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325988" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325988" class="answer-num">2个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325988"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                                                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
                <a href="/wenda/26" target="_blank">前端工具</a>
                <a href="/wenda/51" target="_blank">测试</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325978" class="ques-con-content" target="_blank" title="xampp用dreamwever打开下载的server.php文件没有显示参数错误，而是出现了乱码，有给header设置utf-8格式">测试文件出现乱码</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186680" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/171310/bbs" target="_blank">捷克轩</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">你设置了头文件为UTF-8只能说明你告诉浏览器要用UTF-8的方式去解读代码，但是你的代码是不是UTF-8就是两回事情了，你用的什么编辑器看看右下角是不是别的编码方式，或者用编辑器另存为格式代码写成UTF-8。最简单的方式就是在浏览器里面把编码改成GBK看看是不是会变成正常的。</div>
        <div class="answer-content-all rich-text imgPreview"><p>你设置了头文件为UTF-8只能说明你告诉浏览器要用UTF-8的方式去解读代码，但是你的代码是不是UTF-8就是两回事情了，你用的什么编辑器看看右下角是不是别的编码方式，或者用编辑器另存为格式代码写成UTF-8。最简单的方式就是在浏览器里面把编码改成GBK看看是不是会变成正常的。</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325978" data-answer-id="186680" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="325978" data-answer-id="186680" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186680" data-quesid="325978">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186680" data-ques-uid="3204180">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325972" class="ques-con-content" target="_blank" title="怎样用的啊">请问这里的问号怎么回事</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186757" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/3832773/bbs" target="_blank">慕粉3832773</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">通过url进行传值，是php中一个传值的重要手段。所以我们要经常对url里面所带的参数进行解析,列如：&lt;a href='$url?page=".($pageval-1)."'&gt;上一页&lt;/a&gt;&lt;a href='$url?page=".($pageval+1)."'&gt;下一页&lt;/a&gt;</div>
        <div class="answer-content-all rich-text imgPreview"><p><br /></p><p>通过url进行传值，是php中一个传值的重要手段。所以我们要经常对url里面所带的参数进行解析,列如：&lt;a href='$url?page=".($pageval-1)."'&gt;上一页&lt;/a&gt;&lt;a href='$url?page=".($pageval+1)."'&gt;下一页&lt;/a&gt;</p><p><br /></p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325972" data-answer-id="186757" data-hasop=""><b>赞同</b></span>
            <span class="oppose " data-ques-id="325972" data-answer-id="186757" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186757" data-quesid="325972">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186757" data-ques-uid="1977212">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/326044"  class="ques-con-content" target="_blank" title="&amp;lt;?php $Sstring1=&amp;lt;&amp;lt;&amp;lt;GOD我有一只小毛驴，我从来也不骑。有一天我心血来潮，骑着去赶集。我手里拿着小皮鞭，我心里正得意。不知怎么哗啦啦啦啦，我摔了一身泥.GOD;echo $string1;?&amp;gt;运行后出现：Notice: Undefined variable: string1 in /54/751/9wID/index.php on line 9&nbsp;&nbsp; 为什么求大神相告">php字串符相关问题</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/326044" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/326044" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="326044"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325928" class="ques-con-content" target="_blank" title="不过讲道理，每个语言都有自己的优点与缺陷">PHP 真的设计很糟糕吗？那还有没有必要深入研究？</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186537" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/317109/bbs" target="_blank">丶疯老头</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">进行中小型项目的开发PHP真心不错，深入研究完全看你自己喜欢程度，PHP7还是值得研究的。80%的web应用多多少少都用PHP，你觉得糟糕么</div>
        <div class="answer-content-all rich-text imgPreview"><p>进行中小型项目的开发PHP真心不错，深入研究完全看你自己喜欢程度，PHP7还是值得研究的。80%的web应用多多少少都用PHP，你觉得糟糕么</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325928" data-answer-id="186537" data-hasop=""><b>赞同</b></span>
            <span class="oppose " data-ques-id="325928" data-answer-id="186537" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186537" data-quesid="325928">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186537" data-ques-uid="3440283">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325962" class="ques-con-content" target="_blank" title="太多太杂了">PHP那些奇奇怪怪的函数名需要花时间记一下吗？</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186611" id="answer-con">
        <div class="user">
            
                        <a href="/u/2737388/bbs" target="_blank">qq_我的太阳永远不落_0</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">常用的肯定要记啊，虽然现在有自动补全，至于那些不常用的肯定是查手册啊，几千个方法名不可能全记住，你只要记住常用的，熟悉cookie，session，oop编程这些才是要记的，把时间用在重要的地方，还有多敲，记笔记，推荐有道云。你要记住以后要接触很多mvc框架，甚至各种api，所以不可能全部记得。java我记得有几万个方法，难道全记吗？所以下载个手册，需要查下。</div>
        <div class="answer-content-all rich-text imgPreview"><p>常用的肯定要记啊，虽然现在有自动补全，至于那些不常用的肯定是查手册啊，几千个方法名不可能全记住，你只要记住常用的，熟悉cookie，session，oop编程这些才是要记的，把时间用在重要的地方，还有多敲，记笔记，推荐有道云。你要记住以后要接触很多mvc框架，甚至各种api，所以不可能全部记得。java我记得有几万个方法，难道全记吗？所以下载个手册，需要查下。</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325962" data-answer-id="186611" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="325962" data-answer-id="186611" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186611" data-quesid="325962">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186611" data-ques-uid="3440283">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/17" target="_blank">
                <img src="http://img.mukewang.com/563aff440001e80700900090.jpg" title="JavaScript"/>
            </a>
                                                            </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/17" target="_blank">JavaScript</a>
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/326018" class="ques-con-content" target="_blank" title="&amp;lt;!DOCTYPE&nbsp;html&amp;gt;
&amp;lt;html&amp;gt;
&amp;lt;head&amp;gt;
&amp;lt;meta&nbsp;http-equiv=&quot;Content-Type&quot;&nbsp;content=&quot;text/html;&nbsp;charset=utf-8&quot;&nbsp;/&amp;gt;
&amp;lt;title&amp;gt;Math&nbsp;&amp;lt;/title&amp;gt;
&amp;lt;script&nbsp;type=&quot;text/javascrip...">JS进阶7-16编程题看一下我的程序怎么可以实现？</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186777" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/2601695/bbs" target="_blank">火丁啊</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">你的第12行 x=Math.round(c)); 多了一个括号，删了就可以了。</div>
        <div class="answer-content-all rich-text imgPreview"><p>你的第12行 x=Math.round(c)); 多了一个括号，删了就可以了。</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="326018" data-answer-id="186777" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="326018" data-answer-id="186777" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186777" data-quesid="326018">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186777" data-ques-uid="3084645">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/326013" class="ques-con-content" target="_blank" title="//&nbsp;我的本意是想做一个关注微信公众号就自动回复一个welcome的效果，想了很多办法，也查了很多资料，但是就是没有用
//&nbsp;&nbsp;&nbsp;调试也成功了，但是在手机上用的时候，关注就是没反应，然后发送消息还显示我的公众号暂时停止服务
//&nbsp;&nbsp;&nbsp;真的很疲倦。。。我是新手，这个问题卡了两天了，快疯了。求大神给指点，详细一些，感激不尽！

&amp;lt;?php

public&nbsp;function&nbsp;index{
		//获得参数&nbsp;signature&nbsp;nonce&nbsp;token&nbsp;time...">为什么我的微信公众号开发调试正确却显示不出来呢？</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186759" id="answer-con">
        <div class="user">
            
                        <a href="/u/1008780/bbs" target="_blank">丶包菜</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">首先确定你的服务器公网能访问，微信能联通。然后：1，$fromUser  =  $postObj -&gt; ToUserName; 2，&lt;CreateTime&gt;%s&lt;/CreateTime&gt;3，$info =  sprintf( $template , $toUser , $fromUser , $time , $msgType , $content  );echo $info;    <span class="see-more">[ 查看全部 ]</span></div>
        <div class="answer-content-all rich-text imgPreview"><p>首先确定你的服务器公网能访问，微信能联通。然后：<br /></p><p>1，$fromUser  =  $postObj -&gt; ToUserName; <br /></p><p><br /></p><p>2，&lt;CreateTime&gt;%s&lt;/CreateTime&gt;</p><p><br /></p><p>3，$info =  sprintf( $template , $toUser , $fromUser , $time , $msgType , $content  );</p><p>echo $info;    <br /></p><p><br /></p><p></p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="326013" data-answer-id="186759" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="326013" data-answer-id="186759" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186759" data-quesid="326013">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186759" data-ques-uid="3193185">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/326007" class="ques-con-content" target="_blank" title="如何安装php环境">如何安装php环境</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186751" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/3716346/bbs" target="_blank">tobbyvic</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">小白的话  wamp</div>
        <div class="answer-content-all rich-text imgPreview"><p dir="ltr">小白的话  wamp</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="326007" data-answer-id="186751" data-hasop=""><b>赞同</b></span>
            <span class="oppose " data-ques-id="326007" data-answer-id="186751" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186751" data-quesid="326007">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186751" data-ques-uid="3741451">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/5" target="_blank">
                <img src="http://img.mukewang.com/563affe40001680c00900090.jpg" title="Html/CSS"/>
            </a>
                                                                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/5" target="_blank">Html/CSS</a>
                <a href="/wenda/17" target="_blank">JavaScript</a>
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/326006" class="ques-con-content" target="_blank" title="RT，新手学到这里傻傻的分不清">三层架构和MVC有什么区别啊</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186845" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/257548/bbs" target="_blank">快乐的时光</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">MVC和三层架构，是不一样的。 三层架构中，DAL、BLL、WEB层各司其职，意在职责分离。 MVC是 Model-View-Controller，严格说这三个加起来以后才是三层架构中的WEB层，也就是说，MVC把三层架构中的WEB层再度进行了分化，分成了控制器、视图、实体三个部分，控制器完成页面逻辑，通过实体来与界面层完成通话；而C层直接与三层中的BLL进行对话。<...图片...><span class="see-more">[ 查看全部 ]</span></div>
        <div class="answer-content-all rich-text imgPreview"><p>MVC和三层架构，是不一样的。 <br />三层架构中，DAL、BLL、WEB层各司其职，意在职责分离。 <br />MVC是 Model-View-Controller，严格说这三个加起来以后才是三层架构中的WEB层，也就是说，MVC把三层架构中的WEB层再度进行了分化，分成了控制器、视图、实体三个部分，控制器完成页面逻辑，通过实体来与界面层完成通话；而C层直接与三层中的BLL进行对话。<br /><br /><img src="(null)" alt="(null)" /></p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="326006" data-answer-id="186845" data-hasop=""><b>赞同</b></span>
            <span class="oppose " data-ques-id="326006" data-answer-id="186845" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186845" data-quesid="326006">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186845" data-ques-uid="2323478">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325999"  class="ques-con-content" target="_blank" title="WAMP一直显示黄色怎么办?求助大神,弄了好久都没弄好">WAMP一直显示黄色怎么办?求助大神,弄了好久都没弄好</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325999" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325999" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325999"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325994"  class="ques-con-content" target="_blank" title="例如：index.php?c=index&amp;amp;m=index 在这个URL中 随着传入的控制器c和方法m不同 就要重新刷新页面，那么每次都会初始化一个mysql连接，这样做不会给服务器造成严重的负担么， 尤其是多次刷新index.php页面时 ，有没有老师或是高手帮忙解答一下！！！谢谢~">MVC单一入口跳转时 是不是每次都重新实例化一个mysql连接</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325994" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325994" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325994"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325993" class="ques-con-content" target="_blank" title="在admin.inc.php中报adminId没有定义怎么处理，求大神指导">在admin.inc.php中报adminId没有定义怎么处理，求大神指导</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186747" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/171310/bbs" target="_blank">捷克轩</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">把代码贴出来我给你看看  感觉就是没有定义</div>
        <div class="answer-content-all rich-text imgPreview">把代码贴出来我给你看看  感觉就是没有定义</div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325993" data-answer-id="186747" data-hasop=""><b>赞同</b></span>
            <span class="oppose " data-ques-id="325993" data-answer-id="186747" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186747" data-quesid="325993">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186747" data-ques-uid="1959524">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325974"  class="ques-con-content" target="_blank" title="微信多客服是一个单独的聊天窗口么，还是在公众号下直接和用户交流">微信多客服</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325974" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325974" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325974"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325968" class="ques-con-content" target="_blank" title="如何用mysqli在一个php文件里包含另一个php文件">如何用mysqli在一个php文件里包含另一个php文件</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186643" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/2808185/bbs" target="_blank">yemaa</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">使用include或require</div>
        <div class="answer-content-all rich-text imgPreview"><p>使用include或require<br /></p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325968" data-answer-id="186643" data-hasop=""><b>赞同</b></span>
            <span class="oppose " data-ques-id="325968" data-answer-id="186643" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186643" data-quesid="325968">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186643" data-ques-uid="2882679">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325926" class="ques-con-content" target="_blank" title="php中die什么意思">php中die什么意思</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186518" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/1439252/bbs" target="_blank">tangjunfeng</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">字面意思~die就是死的意思~结束程序，die()后面的就不执行~跟exit()一样~</div>
        <div class="answer-content-all rich-text imgPreview"><p>字面意思~die就是死的意思~结束程序，die()后面的就不执行~跟exit()一样~<br /></p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325926" data-answer-id="186518" data-hasop=""><b>赞同</b></span>
            <span class="oppose " data-ques-id="325926" data-answer-id="186518" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186518" data-quesid="325926">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186518" data-ques-uid="2882679">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/11" target="_blank">
                <img src="http://img.mukewang.com/563aff910001771f00900090.jpg" title="Mysql"/>
            </a>
                                                            </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/11" target="_blank">Mysql</a>
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325930" class="ques-con-content" target="_blank" title="这是register页面
&amp;lt;!--注册部分--&amp;gt;
&amp;lt;div&nbsp;class=&quot;register_body&quot;&amp;gt;
&nbsp;&nbsp;&nbsp;&nbsp;&amp;lt;div&nbsp;class=&quot;col-xs-12&nbsp;register_title&quot;&amp;gt;注册&amp;lt;/div&amp;gt;
&nbsp;&nbsp;&nbsp;&nbsp;&amp;lt;form&nbsp;action=&quot;reg.php&quot;&nbsp;class=&quot...">新人求助 关于登录注册写数据库的问题，代码如下。</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186527" id="answer-con">
        <div class="user">
            
                        <a href="/u/2479172/bbs" target="_blank">0936zz</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">给你的提交按钮加一个name="submit"</div>
        <div class="answer-content-all rich-text imgPreview"><p>给你的提交按钮加一个name="submit"</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325930" data-answer-id="186527" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="325930" data-answer-id="186527" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186527" data-quesid="325930">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186527" data-ques-uid="1889357">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325925" class="ques-con-content" target="_blank" title="他们两个分别在什么时候用，一块用的时候有区分吗？">请问各位$_REQUEST和$_POST的区别是什么?</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186519" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/1439252/bbs" target="_blank">tangjunfeng</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">$_GET变量接受所有以get方式发送的请求，及浏览器地址栏中的?之后的内容$_POST变量接受所有以post方式发送的请求，例如，一个form以method=post提交，提交后php会处理post过来的全部变量而$_REQUEST支持两种方式发送过来的请求，即post和get它都可以接受，显示不显示要看传递方法，get会显示在url中（有字符数限制），post不会在url中显示，可以传递任意多的数据（只要服务器支持）<span class="see-more">[ 查看全部 ]</span></div>
        <div class="answer-content-all rich-text imgPreview"><p>$_GET变量接受所有以get方式发送的请求，及浏览器地址栏中的?之后的内容<br />$_POST变量接受所有以post方式发送的请求，例如，一个form以method=post提交，提交后php会处理post过来的全部变量<br />而$_REQUEST支持两种方式发送过来的请求，即post和get它都可以接受，显示不显示要看传递方法，get会显示在url中（有字符数限制），post不会在url中显示，可以传递任意多的数据（只要服务器支持）</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325925" data-answer-id="186519" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="325925" data-answer-id="186519" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186519" data-quesid="325925">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186519" data-ques-uid="1977212">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325817" class="ques-con-content" target="_blank" title="我用的是php5.6.19，输入以下代码后出现个问题。如图">php错误提示,求助!</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186268" id="answer-con">
        <div class="user">
            
                        <span class="had-solve">已采纳</span>
                        <a href="/u/3247527/bbs" target="_blank">U_SB</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">看样子是PHP与MySQL那门课，我也才看了那门课，也遇到了。主要就是课程比较老了，现在都用mysqli了，所以那个课可以看思路，代码的自己改改。关于mysqli扩展，可以先看看这门课Duang~MySQLi扩展库来袭下面是我的代码，献丑了。。<...code...><span class="see-more">[ 查看全部 ]</span></div>
        <div class="answer-content-all rich-text imgPreview"><p>看样子是PHP与MySQL那门课，我也才看了那门课，也遇到了。</p><p><span>主要就是课程比较老了，现在都用mysqli了，所以那个课可以看思路，代码的自己改改。</span></p><p><span>关于mysqli扩展，可以先看看这门课<a href="http://www.imooc.com/learn/349">Duang~MySQLi扩展库来袭</a></span></p><p>下面是我的代码，献丑了。。</p><pre class="brush:php;toolbar:false">&lt;?php 
    //连库
    $mysqli = new mysqli("localhost", "root", "", "test");
    if ($mysqli-&gt;connect_errno) {
        die('Counter Error:'.$mysqli-&gt;connect_error);
    }
    //设置字符集
    $mysqli-&gt;set_charset('utf8');
?&gt;</pre><p><br /></p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325817" data-answer-id="186268" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="325817" data-answer-id="186268" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186268" data-quesid="325817">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186268" data-ques-uid="2882679">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325819" class="ques-con-content" target="_blank" title="我学习了php的一些大部分，但是不知道在实际公司开发过程中什么是重点，特地来求大牛们解疑答惑">php中什么是最要学的？</a>
        
    </div>
        <div class="answer-con first" data-answer-id="186256" id="answer-con">
        <div class="user">
            
                        <a href="/u/1124609/bbs" target="_blank">夜袭开发站</a><span class="signature">回答：</span>
        </div>
        <div class="answer-content">存在即合理，都是要好好的学的，学无止境</div>
        <div class="answer-content-all rich-text imgPreview"><p dir="ltr">存在即合理，都是要好好的学的，学无止境</p></div>
        <div class="ctrl-bar clearfix">
            <span class="agree-with " data-ques-id="325819" data-answer-id="186256" data-hasop=""><b>赞同</b><em>1</em></span>
            <span class="oppose " data-ques-id="325819" data-answer-id="186256" data-hasop="">反对</span>
            
            <div class="share-box clearfix">
                <div class="show-btn">分享</div>
                <div class="share-box-con">
                    <div class="bdsharebuttonbox" data-tag="share_answer_186256" data-quesid="325819">
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
            <!--<li>
                <div class="user-pic">
                    <a href="?" target="_blank">
                        <img src="/static/img/appbg.jpg" alt="?"/>
                    </a>
                </div>&lt;!&ndash;.user end&ndash;&gt;
                <div class="user-info clearfix">
                    <em>提问者</em>
                    <a class="from-user" href="?">张三</a>
                    <span>回复</span>
                    <a class="to-user" href="?">李四</a>
                    <span class="time">14小时前</span>
                </div>
                <div class="reply-content">显示本次终端运行路线，或者其他命令可以做我送来的数据，在地图上显示本次终端运行路线，或者其他命令可以做我需要在安卓终端上做个软件。</div>
                <div class="reply-btn">回复</div>
            </li>-->

        </ul><!--.reply-list end-->
        <!--<div class="more-reply">点击展开后面<span>2</span>条评论</div>-->
        <div class="release-reply-con clearfix">
            <div class="user-pic">
                                <a href="/myclub/myquestion" target="_blank">
                    <img src="http://img.mukewang.com/57ae93460001181e06400640-100-100.jpg" alt="weixin_梦想遥不可及_03823741"/>
                </a>
                            </div><!--.user-pic end-->
            <div class="user-name">
                                <a href="/myclub/myquestion" target="_blank">weixin_梦想遥不可及_03823741</a>
                            </div>
            <div class="textarea-con">
                <textarea placeholder="写下你的回复"></textarea>
                            </div>
            <p class="err-tip"></p>
            <div class="userCtrl clearfix">
                <div class="verify-code"></div>
                <div class="do-reply-btn" data-answer-id="186256" data-ques-uid="3248301">回复</div>
            </div>
        </div><!--.release-reply-con end-->
    </div><!--.reply-con end-->
    </div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325891"  class="ques-con-content" target="_blank" title="由于是刚开始进行php 的开发，所以安全意识方面较为薄弱，想慢慢培养安全意识，请各位大神，老师，前辈多多指点~">请教使用php开发需要注意的各种安全问题？</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325891" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325891" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325891"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325868"  class="ques-con-content" target="_blank" title="mvc架构模式分析与设计那门课教程为什么放到服务器上无法使用">mvc架构模式分析与设计那门课教程为什么放到服务器上无法使用</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325868" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325868" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325868"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325849"  class="ques-con-content" target="_blank" title="用ci框架做的博客网站上传到真实服务器，出现session问题，看图，怎么解决？？？">ci网站上传出现的错误</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325849" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325849" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325849"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="ques-answer no-answer">
    <div class="tag-img">
                                            <a href="/wenda/2" target="_blank">
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" title="PHP"/>
            </a>
                                    </div><!--.tag-img end-->
        <div class="from-tag">        来自
                <a href="/wenda/2" target="_blank">PHP</a>
            </div><!--.from-tag end-->
        <div class="ques-con">
        <a href="/wenda/detail/325831"  class="ques-con-content" target="_blank" title="有谁可以解决了呢">PHP中如何实现观看Word文档</a>
    </div><!--.ques-con end-->
    <div class="info-bar clearfix">
        <a href="/wenda/detail/325831" class="to-answer">撰写答案</a>
        <p class="integral-info"><a href="/about/faq?t=3" target="_blank">回答问题最高可获<span>3积分</span>哦！</a></p>
        <a href="/wenda/detail/325831" class="answer-num">1个回答</a>
        <a href="javascript:;" class="follow" data-ques-id="325831"><i class="heart">关注</i></a>
    </div><!--.info-bar end-->
</div><!--.ques-answer end-->
<div class="page"><span class="disabled_page">首页</span><span class="disabled_page">上一页</span><a href="javascript:void(0)" class="active">1</a><a href="/wenda/2/recommend/2">2</a><a href="/wenda/2/recommend/3">3</a><a href="/wenda/2/recommend/4">4</a><a href="/wenda/2/recommend/5">5</a><a href="/wenda/2/recommend/6">6</a><a href="/wenda/2/recommend/7">7</a><a href="/wenda/2/recommend/2">下一页</a><a href="/wenda/2/recommend/81">尾页</a></div>

            </div>
        </div><!--.wenda-main end-->
        <div class="r wenda-slider">
        <div class="quiz"><a href="save" class="js-quiz">我要提问</a></div>

<div class="recommend-class">
    <div class="title clearfix">
        <h3>关联分类</h3>
    </div><!--title end-->
    <ul class="cls-list">
                <li>
            <div class="class-info">
                <div class="class-icon">
                    <a href="/wenda/7" target="_blank">
                        <img src="http://img.mukewang.com/563affd00001cc8a00900090.jpg" alt="Maya"/>
                    </a>
                </div><!--.class-icon end-->
                <h4><a href="/wenda/7" target="_blank">Maya</a></h4>
                <p class="follow-person">808人关注</p>
                                <a href="javascript:void(0)" data-tag-id="7" class="follow">关注</a>
                            </div><!--.class-info end-->
            <div class="desc">Autodesk Maya是美国Autodesk公司出品的世界顶级的...</div>
        </li><!--li end-->
                <li>
            <div class="class-info">
                <div class="class-icon">
                    <a href="/wenda/35" target="_blank">
                        <img src="http://img.mukewang.com/563afdd50001d4a400900090.jpg" alt="大数据"/>
                    </a>
                </div><!--.class-icon end-->
                <h4><a href="/wenda/35" target="_blank">大数据</a></h4>
                <p class="follow-person">7840人关注</p>
                                <a href="javascript:void(0)" data-tag-id="35" class="follow">关注</a>
                            </div><!--.class-info end-->
            <div class="desc">大数据(big data,mega data)，或称巨量资料，指的是...</div>
        </li><!--li end-->
                <li>
            <div class="class-info">
                <div class="class-icon">
                    <a href="/wenda/20" target="_blank">
                        <img src="http://img.mukewang.com/563aff130001c76f00900090.jpg" alt="Linux"/>
                    </a>
                </div><!--.class-icon end-->
                <h4><a href="/wenda/20" target="_blank">Linux</a></h4>
                <p class="follow-person">13199人关注</p>
                                <a href="javascript:void(0)" data-tag-id="20" class="follow">关注</a>
                            </div><!--.class-info end-->
            <div class="desc">Linux是一套免费使用和自由传播的类Unix操作系统，是一个基于P...</div>
        </li><!--li end-->
            </ul><!--.cls-list end-->
</div><!--.recommend-class end-->

<div class="best-users">
    <h3 class="title">本月最佳回答网友</h3>
        <ul>
                <li>
            <div class="user-pic">
                <a target="_blank" href="/u/479481/bbs">
                    <img src="http://img.mukewang.com/5768deb700015c6805000500-100-100.jpg" title="秋名山车神" />
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/479481/bbs">秋名山车神</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">全栈工程师</span>
                <span class="support-num">收获 290 赞同</span>
            </div><!--.user-info end-->
        </li>
                <li>
            <div class="user-pic">
                <a target="_blank" href="/u/116403/bbs">
                    <img src="http://img.mukewang.com/53703b2a0001974f01000100-100-100.jpg" title="夫唯不争" />
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/116403/bbs">夫唯不争</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">PHP开发工程师</span>
                <span class="support-num">收获 29 赞同</span>
            </div><!--.user-info end-->
        </li>
                <li>
            <div class="user-pic">
                <a target="_blank" href="/u/2367690/bbs">
                    <img src="http://img.mukewang.com/55fbe7610001a2c101000100-100-100.jpg" title="阿探" />
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/2367690/bbs">阿探</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">Web前端工程师</span>
                <span class="support-num">收获 26 赞同</span>
            </div><!--.user-info end-->
        </li>
                <li>
            <div class="user-pic">
                <a target="_blank" href="/u/2022889/bbs">
                    <img src="http://img.mukewang.com/55727db40001643901000100-100-100.jpg" title="Enchanter" />
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/2022889/bbs">Enchanter</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">JAVA开发工程师</span>
                <span class="support-num">收获 24 赞同</span>
            </div><!--.user-info end-->
        </li>
                <li>
            <div class="user-pic">
                <a target="_blank" href="/u/2479172/bbs">
                    <img src="http://img.mukewang.com/56b4c4ab000115a901000100-100-100.jpg" title="0936zz" />
                </a>
            </div><!--.user-pic end-->
            <div class="user-name">
                <a target="_blank" href="/u/2479172/bbs">0936zz</a>
            </div><!--.user-name end-->
            <div class="user-info clearfix">
                <span class="role">学生</span>
                <span class="support-num">收获 20 赞同</span>
            </div><!--.user-info end-->
        </li>
            </ul>
    </div><!--.leifeng-sort end-->
        </div>
    </div><!--.js-layout-change end-->
</div><!-- .wenda end-->
<div class="tag-pop" id="tag-pop">
    <div class="shade"></div>
    <div class="tag-main">
        <h3><span>关注我喜欢或专注的猿问分类</span> <i class="icon-close2 js-close"></i></h3>
        <ul class="tag-list clearfix">
                        <li data-tag-id="12" >
                <img src="http://img.mukewang.com/563aff7e0001c8c700900090.jpg" alt=""/>
                <span>Android</span>
            </li>
                        <li data-tag-id="22" >
                <img src="http://img.mukewang.com/563afef30001025000900090.jpg" alt=""/>
                <span>AngularJS</span>
            </li>
                        <li data-tag-id="24" >
                <img src="http://img.mukewang.com/563afee70001ccbe00900090.jpg" alt=""/>
                <span>Bootstrap</span>
            </li>
                        <li data-tag-id="28" >
                <img src="http://img.mukewang.com/563afeb5000149c000900090.jpg" alt=""/>
                <span>C</span>
            </li>
                        <li data-tag-id="38" >
                <img src="http://img.mukewang.com/563afd4600014d7e00900090.jpg" alt=""/>
                <span>C#</span>
            </li>
                        <li data-tag-id="30" >
                <img src="http://img.mukewang.com/563afe97000178c200900090.jpg" alt=""/>
                <span>C++</span>
            </li>
                        <li data-tag-id="34" >
                <img src="http://img.mukewang.com/563afdfb000167f300900090.jpg" alt=""/>
                <span>Cocos2d-x</span>
            </li>
                        <li data-tag-id="25" >
                <img src="http://img.mukewang.com/563afed80001928100900090.jpg" alt=""/>
                <span>CSS3</span>
            </li>
                        <li data-tag-id="31" >
                <img src="http://img.mukewang.com/563afe8400019fbc00900090.jpg" alt=""/>
                <span>Go</span>
            </li>
                        <li data-tag-id="5" >
                <img src="http://img.mukewang.com/563affe40001680c00900090.jpg" alt=""/>
                <span>Html/CSS</span>
            </li>
                        <li data-tag-id="14" >
                <img src="http://img.mukewang.com/563aff620001ec7600900090.jpg" alt=""/>
                <span>Html5</span>
            </li>
                        <li data-tag-id="19" >
                <img src="http://img.mukewang.com/563aff2000019d0700900090.jpg" alt=""/>
                <span>iOS</span>
            </li>
                        <li data-tag-id="3" >
                <img src="http://img.mukewang.com/563afff200010a9f00900090.jpg" alt=""/>
                <span>JAVA</span>
            </li>
                        <li data-tag-id="17" >
                <img src="http://img.mukewang.com/563aff440001e80700900090.jpg" alt=""/>
                <span>JavaScript</span>
            </li>
                        <li data-tag-id="15" >
                <img src="http://img.mukewang.com/563aff530001428b00900090.jpg" alt=""/>
                <span>JQuery</span>
            </li>
                        <li data-tag-id="20" >
                <img src="http://img.mukewang.com/563aff130001c76f00900090.jpg" alt=""/>
                <span>Linux</span>
            </li>
                        <li data-tag-id="7" >
                <img src="http://img.mukewang.com/563affd00001cc8a00900090.jpg" alt=""/>
                <span>Maya</span>
            </li>
                        <li data-tag-id="8" >
                <img src="http://img.mukewang.com/563affc20001ce1000900090.jpg" alt=""/>
                <span>MongoDB</span>
            </li>
                        <li data-tag-id="11" >
                <img src="http://img.mukewang.com/563aff910001771f00900090.jpg" alt=""/>
                <span>Mysql</span>
            </li>
                        <li data-tag-id="13" >
                <img src="http://img.mukewang.com/563aff700001005200900090.jpg" alt=""/>
                <span>Node.js</span>
            </li>
                        <li data-tag-id="29" >
                <img src="http://img.mukewang.com/563afea70001be2b00900090.jpg" alt=""/>
                <span>Oracle</span>
            </li>
                        <li data-tag-id="10" >
                <img src="http://img.mukewang.com/563affa10001301000900090.jpg" alt=""/>
                <span>Photoshop</span>
            </li>
                        <li data-tag-id="2" >
                <img src="http://img.mukewang.com/563afd9d0001d30a00900090.jpg" alt=""/>
                <span>PHP</span>
            </li>
                        <li data-tag-id="9" >
                <img src="http://img.mukewang.com/563affb10001bbc500900090.jpg" alt=""/>
                <span>Premiere</span>
            </li>
                        <li data-tag-id="18" >
                <img src="http://img.mukewang.com/563aff300001f47400900090.jpg" alt=""/>
                <span>Python</span>
            </li>
                        <li data-tag-id="50" >
                <img src="http://img.mukewang.com/579f2f59000130cc02400240.jpg" alt=""/>
                <span>React.JS</span>
            </li>
                        <li data-tag-id="36" >
                <img src="http://img.mukewang.com/563afdc60001f1a900900090.jpg" alt=""/>
                <span>SQL Server</span>
            </li>
                        <li data-tag-id="33" >
                <img src="http://img.mukewang.com/563afe730001883800900090.jpg" alt=""/>
                <span>Unity 3D</span>
            </li>
                        <li data-tag-id="27" >
                <img src="http://img.mukewang.com/563afec200019e2400900090.jpg" alt=""/>
                <span>WebApp</span>
            </li>
                        <li data-tag-id="40" >
                <img src="http://img.mukewang.com/564045270001d8dc00900090.jpg" alt=""/>
                <span>ZBrush</span>
            </li>
                        <li data-tag-id="21" >
                <img src="http://img.mukewang.com/563aff040001d14100900090.jpg" alt=""/>
                <span>云计算</span>
            </li>
                        <li data-tag-id="26" >
                <img src="http://img.mukewang.com/563b0af800018db300900090.jpg" alt=""/>
                <span>前端工具</span>
            </li>
                        <li data-tag-id="35" >
                <img src="http://img.mukewang.com/563afdd50001d4a400900090.jpg" alt=""/>
                <span>大数据</span>
            </li>
                        <li data-tag-id="39" >
                <img src="http://img.mukewang.com/563b04ef00014a4b00900090.jpg" alt=""/>
                <span>数据结构</span>
            </li>
                        <li data-tag-id="51" >
                <img src="http://img.mukewang.com/57aad4170001397802400240.jpg" alt=""/>
                <span>测试</span>
            </li>
                    </ul>
        <div class="save-btn">保存</div>
    </div><!--.tag-main end-->
</div><!--.tag-pop end-->
</div>

<div id="footer" >
    <div class="waper">
        <div class="footerwaper clearfix">
            <div class="followus r">
                <a class="followus-weixin" href="javascript:;"  target="_blank" title="微信">
                    <div class="flw-weixin-box"></div>
                </a>
                <a class="followus-weibo" href="http://weibo.com/u/3306361973"  target="_blank" title="新浪微博"></a>
                <a class="followus-qzone" href="http://user.qzone.qq.com/1059809142/" target="_blank" title="QQ空间"></a>
            </div>
            <div class="footer_intro l">
                <div class="footer_link">
                    <ul>
                        <li><a href="http://www.imooc.com/" target="_blank">网站首页</a></li>
                        <li><a href="/about/cooperate" target="_blank" title="企业合作">企业合作</a></li>
                        <li><a href="/about/job" target="_blank">人才招聘</a></li>
                        <li> <a href="/about/contact" target="_blank">联系我们</a></li>
                        <li><a href="/corp/index" target="_blank">合作专区</a></li>
                        <li><a href="/about/us" target="_blank">关于我们</a></li>
                        <li> <a href="/about/recruit" target="_blank">讲师招募</a></li>
                        <li> <a href="/user/feedback" target="_blank">意见反馈</a></li>
                        <li> <a href="/about/friendly" target="_blank">友情链接</a></li>
                    </ul>
                </div>
                <p>Copyright © 2016 imooc.com All Rights Reserved | 京ICP备 13046642号-2</p>
            </div>
        </div>
    </div>
</div>
<!--script-->
<script src="/passport/static/scripts/ssologin.js?v=2.0"></script>
<script type="text/javascript" src="/static/sea-modules/seajs/seajs/2.1.1/sea.js"></script>
<script type="text/javascript" src="/static/sea_config.js?v=2016081011958"></script>
<script type="text/javascript">seajs.use("/static/page/"+OP_CONFIG.module+"/"+OP_CONFIG.page);</script>






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
</div>
</body>
</html>
