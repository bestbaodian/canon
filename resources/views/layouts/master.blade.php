@section('sidebar')
<meta name="_token" content="{{ csrf_token() }}"/>
<link rel="stylesheet" type="text/css" href="../static/css/ui2.css?2013032917">
<div id="header">
    <div class="page-container" id="nav">
        <a href="/" target="_self"><img src="/images/login.png" style="float: left; padding-top:6px;"><a href="index" target="_self" class="hide-text"></a>
        <div class="g-menu-mini l">
            <a href="#" class="menu-ctrl">
                <i class="icon-menu"></i>
            </a>
            <ul class="nav-item l">
                <li><a href="{{url('shiti')}}"  target="_self">试题</a></li>
                <li><a href="{{url('program')}}"  target="_self">招聘</a></li>
                <li><a href="{{url('article')}}"  target="_self">方法</a></li>
                <li><a href="{{url('company')}}"  target="_self">简历</a></li>
		        <li><a href="{{url('wenda')}}" target="_self">答疑</a></li>
		        <li><a href="http://tmjob.mbaodian.com/" target="_self">面试公司</a></li>
            </ul>
        </div>
        <div id="login-area">
            <ul    <?php if(empty(Session::get('username'))){ ?> class="header-unlogin clearfix" <?php }else{ ?> class="clearfix logined" <?php }?>>
                <li class="header-app">
                    <a href="#">
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
					<a href="{{url('user/setprofile')}}">经验<b id="js-user-mp"><?php if(Session::get('user_ex')){echo Session::get('user_ex');}else{echo 0;} ?></b></a>
					<a href="{{url('user/setprofile')}}">积分<b id="js-user-credit"><?php if(Session::get('user_pond')){echo Session::get('user_pond');}else{echo 0;} ?></b></a></p>
                                <a href="javascript:void(0)" class="qiandao" id="{{Session::get('uid')}}">立即签到</a>
                            </div>
                            <div class="card-history">
                                <span class="history-item">
                                    <span class="tit text-ellipsis">python进阶</span>
                                    <span class="media-name text-ellipsis">2-9 闭包</span>
                                    <i class="icon-clock"></i>
                                     <a class="continue" href="#">继续</a>
                                </span>
                            </div>
                            <div class="card-sets clearfix">
                                <a class="l mr30" target="_blank" href="{{url('save')}}">发问题</a>
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

@show

<div class="footer bg-white idx-minwidth">
  <div class="container">

      <div style="text-align:center;margin-top:-10px;padding-bottom:10px;">
      <!--可信网站图片LOGO安装开始-->
      <script src="/js/seallogo.dll"></script>
      <!--可信网站图片LOGO安装结束-->
    </div>
  </div>
</div>


<div id="footer" >
    <div class="waper">
        <div class="footerwaper clearfix">
            <div class="followus r">
                <a class="followus-weixin" href="javascript:;"  target="_blank" title="微信">
                    <div class="flw-weixin-box"></div>
                </a>
                <a class="followus-weibo" href="#"  target="_blank" title="新浪微博"></a>
                <a class="followus-qzone" href="#" target="_blank" title="QQ空间"></a>
            </div>
            <div class="footer_intro l">
                <div class="footer_link">
                    <ul>
                        <li><a href="#" target="_blank">网站首页</a></li>
                        <li><a href="#" target="_blank">人才招聘</a></li>
                        <li> <a href="#" target="_blank">联系我们</a></li>
                        <li><a href="#" target="_blank">面试宝典</a></li>
                        <li><a href="#" target="_blank">合作专区</a></li>
                        <li><a href="#" target="_blank">关于我们</a></li>
                        <li> <a href="#" target="_blank">讲师招募</a></li>
                        <li> <a href="#" target="_blank">意见反馈</a></li>
                        <li> <a href="#" target="_blank">友情链接</a></li>
                    </ul>
                </div>
                <p>Copyright © 2016 mbaodian.com All Rights Reserved | 京ICP备16021576号-1</p>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/landing-min.js?2013032917"></script>
<div style="text-align:center;clear:both"></div>
<div class="modal in" id="login-modal"> <a class="close" data-dismiss="modal">×</a>
    <h1>登录</h1>
    <ul class="login-bind-tp">
        {{--<li class="qweibo"> <a href="http://sc.chinaz.com"><em>&nbsp;</em> QQ登录</a> </li>
        <li class="sina"> <a href="http://sc.chinaz.com"><em>&nbsp;</em> 微博登录</a> </li>--}}
    </ul>
    <a href=""> <p>还没有账号,立即注册</p></a><br>
    <form class="login-form clearfix" method="post" action="">

        <div class="form-arrow"></div>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"/>
        <input id="u_name" type="text" placeholder="手机号或邮箱：">
        <font color="red"><span id="sp_name"></span></font>

        <input id="password" type="password" placeholder="密码：">
        <font color="red"> <span id="sp_pwd"></span></font>

        <input type="button" name="type" class="button-blue login" value="登录" id="sub">
        <input type="hidden" name="return-url" value="">
        <div class="clearfix"></div>
        <label class="remember">
            <ul>
                <li class="login">
                <span id="hzy_fast_login"></span>
                </li>
            </ul>

    </form>
</div>
<div class="modal in" id="signup-modal" > <a class="close" data-dismiss="modal">×</a>
    <h1>注册</h1>
    <ul class="login-bind-tp">
        {{--<li class="qweibo"> <a href="#"><em>&nbsp;</em> QQ登录</a> </li>
        <li class="sina"> <a href="#"><em>&nbsp;</em> 微博登录</a> </li>--}}
    </ul>
    <p><a href="index">已有账号,直接登录</p></a><br/>
    <span id="check_reg"></span>
    <form class="signup-form clearfix">
        {{--<form class="valid-form" id="js-signup-form" autocomplete="off" action='reg' method='post' onsubmit="return sub()">--}}
        <p class="error"></p>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input  type="text" name="user_name" id="username" data-validate="email" autocomplete="off" class="ipt ipt-email" placeholder="请输入名称 4-16位字母或数字或中文非空" required="required" onblur="checkname();"><font color="red"><p class="tips" id="name_sp"></p></font>
        <input  type="password" name="user_pwd"  class="ipt ipt-pwd js-pass-pwd" placeholder="6-16位密码，区分大小写，不能用空格" id="pwd"  style="background-image:url('');
   background-position:right bottom"><p class="tips" id="sp_pwd"><font color="red"></font></p>
        <input  type="text" name="user_email" id="email" data-validate="nick" class="ipt ipt-nick" placeholder="邮箱格式:@ . com" id="email" onblur="checkemail();"><font color="red"><p class="tips" id="email_sp"></p></font>
        <input  type="text" name="user_phone" data-validate="nick" class="ipt ipt-nick" placeholder="手机号为11位 " id="phone" onblur="checkphone();"><font color="red"><p class="tips" id="phone_sp"></p></font>
        <input type="button" id="butt" class="button-blue reg" value="注册" data-category="UserAccount" data-action="regist">
        <ul class="third-parties">
            <li>
                <p data-url="">新浪微博帐号</p>
            </li>
            <li>
                <p data-url="">腾讯微博帐号</p>
            </li>
            <li>
                <p data-url="">豆瓣帐号</p>
            </li>
            <li>
                <p data-url=""></p>
            </li>
        </ul>
    </form>
</div>
<script src="../static/js/my.js"></script>

<script>
    /*
     *  用户签到js请求
     */
    $('.qiandao').click(function() {
        var uid=$('.qiandao').attr('id');
        $.ajax({
            type: "get",
            url: "{{url('qiandao')}}",
            data: "uid="+uid,
            success: function(msg){
                var data = eval(msg);
                $('#spans').html(data[1])
                alert(data[0]);
                location.reload()
            }
        });
    })  </script>