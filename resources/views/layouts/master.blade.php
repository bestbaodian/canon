@section('sidebar')
<meta name="_token" content="{{ csrf_token() }}"/>
<link rel="stylesheet" type="text/css" href="../static/css/ui2.css?2013032917">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->  <!---->
<div id="header">
    <div class="page-container" id="nav">
        <a href="/" target="_self"><img src="/images/login.png" style="float: left; padding-top:6px;"><a href="index" target="_self" class="hide-text"></a>
        <div class="g-menu-mini l">
            <a href="#" class="menu-ctrl">
                <i class="icon-menu"></i>
            </a>
            <ul class="nav-item l">
                <li><a href="{{URL('shiti')}}"  target="_self">试题</a></li>
                <li><a href="{{URL('program')}}"  target="_self">招聘</a></li>
                <li><a href="{{URL('article')}}"  target="_self">方法</a></li>
                <li><a href="{{URL('company')}}"  target="_self">简历</a></li>
		<li><a href="{{URL('wenda')}}" target="_self">答疑</a></li>
        <!--         <li><a href="/wiki"  target="_self">WIKI</a></li> -->
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
                    <a href="/sms/messagesone" target="_blank"><i class="icon-notifi"></i></a>
                </li>
        	    <li class="my_message">
                    <a target="_blank" title="我的消息" href="/sms/messages">
                        <span style="display: inline;" class="msg_icon">3</span>
                        <i class="icon-mail"></i>
                        <span style="display: none;">我的消息</span>
                    </a>
                </li>
                <li class="set_btn user-card-box">
                    <a target="_self" href="/user/setprofile" action-type="my_menu" class="user-card-item" id="header-avator">
                        <img width="40" height="40" src="/images/unknow-40.png">
                        <i style="display: none;" class="myspace_remind"></i>
                        <span style="display: none;">动态提醒</span>
                    </a>
                    <div class="g-user-card">
                        <div class="card-inner">
                            <div class="card-top">
                                <a href="/user/setprofile"><img class="l" alt="{{ Session::get('username') }}" src="/images/unknow-160.png"></a>
                                <a href="/user/setprofile"><span class="name text-ellipsis">{{ Session::get('username') }}</span></a>
                                <p class="meta">
					<a href="/u/3071208/experience">经验<b id="js-user-mp">550</b></a>
					<a href="/u/3071208/credit">积分<b id="js-user-credit">0</b></a></p>

                                <a class="icon-set setup" href="/user/setprofile"></a>
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
                                <a class="l mr30" target="_blank" href="/wenda/save">发问题</a>
                                <a class="l" target="_blank" href="/article/publish">写文章</a>
                                <a class="r" href="/out?referer=http://www.mbaodian.com/">退出</a>
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
            <input name="remember" type="checkbox" checked/>下次自动登录 </label>
            <script src="http://open.51094.com/user/myscript/157ad5fc7ec2e3.html"></script>
            <ul>
                <li class="login">
                <span id="hzy_fast_login"></span>
                </li>
            </ul>
        <a class="forgot">忘记密码？</a>

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
        <input type="submit"  class="button-blue reg" value="注册" data-category="UserAccount" data-action="regist">
    </form>
</div>
<script>

    var flag=false;
    $('#username').blur(function(){
        // alert(123);
        var username=$(this).val();
        if(username=='') {
            $('#name_sp').html('用户名非空');
            //alert(123);
            flag=true;
            return flag;
        }else{
            $('#name_sp').html('');
            // alert(456);
            return flag;
        }
    })
    var emailflag=false;
    $('#email').blur(function(){
        var email=$("#email").val();
        var reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if(reg.test(email)){
            // alert(123)
            $("#email_sp").html('')
            emailflag=true;
            return emailflag;
        }else{
            // alert(456)
            // alert(456)
            $("#email_sp").html('格式错误')
            return emailflag;
        }
    })
    var phoneflag=false;
    $("#phone").blur(function(){
        var phone=$("#phone").val();
        var reg = /^1\d{10}$/;
        if(reg.test(phone)){
            $("#phone_sp").html('')
            phoneflag=true;
            return phoneflag;
        }else{
            $("#phone_sp").html('格式错误');
            return phoneflag;
        }
    })
    function show(){
        if(this.aa.password.type='password'){
            box.innerHTML = "<input type='text' name='password'  value="+this.aa.password.value+">";
            box3.innerHTML = "<a href='javascript:void(0)' onclick='hid();'>隐藏密码</a>";
        }
    }
    function hid(){
        if(this.aa.password.type='text'){
            box.innerHTML = "<input type='password' name='password'  value="+this.aa.password.value+">";
            box3.innerHTML = "<a href='javascript:void(0)' onclick='show();'>显示密码</a>";
        }
    }
    $("#u_name").blur(function() {
        var u_name = $("#u_name").val();
        var token  = $("#token").val()
        var reg = /^1\d{10}$/;
        var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if (reg.test(u_name)) {
            // alert(u_name)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"name",
                type:"post"
            });
            $.ajax({
                data:{
                    u_name: u_name
                },success:function(data){
                if (data == 1) {
                    $("#sp_name").html('<font color="#5ff137">√</font>')
                } else if (data == 2) {
                    $("#sp_name").html('<font color="#f00">×</font>')
                }
                }
            })
        } else if (email_reg.test(u_name)) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"email",
                type:"post"
            });
            $.ajax({
                data:{
                    u_name: u_name
                },success:function(data){
                    if (data == 1) {
                        $("#sp_name").html('<font color="#5ff137">√</font>')
                    } else if (data == 2) {
                        $("#sp_name").html('<font color="#f00">×</font>')
                    }
                }
            })
        } else {
            $("#sp_name").html('格式错误')
        }
    })
    $("#password").blur(function() {
        var u_name = $("#u_name").val()
        var u_pwd = $("#password").val()
        var reg = /^1\d{10}$/;
        var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if (reg.test(u_name)) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"name_pwd",
                type:"post"
            });
            $.ajax({
                async : false,
                data:{
                    u_name: u_name,
                    u_pwd: u_pwd
                },success:function(data){
                    if (data == 3) {
                        $("#sp_pwd").html('<font color="#5ff137">√</font>')
                    } else if (data == 4) {
                        $("#sp_pwd").html('<font color="#f00">×</font>')
                    }
                }
            })
        } else if (email_reg.test(u_name)) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"email_pwd",
                type:"post"
            });
            $.ajax({
                async : false,
                data:{
                    u_name: u_name,
                    u_pwd: u_pwd
                },success:function(data){
                    if (data == 3) {
                        $("#sp_pwd").html('<font color="#5ff137">√</font>')
                    } else if (data == 4) {
                        $("#sp_pwd").html('<font color="#f00">×</font>')
                    }
                }
            })
        }
    })
    $("#sub").click(function(){
        var sp_name=$("#sp_name").html();
        var sp_pwd=$("#sp_pwd").html();
        var u_name=$("#u_name").val();
        var u_pwd=$("#password").val();
        if(sp_name=='<font color="#5ff137">√</font>' && sp_pwd=='<font color="#5ff137">√</font>'){
            var reg = /^1\d{10}$/;
            var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
            if (reg.test(u_name)) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"name_deng",
                    type:"post"
                });
                $.ajax({
                    data:{
                        u_name:u_name,
                        u_pwd:u_pwd
                    },success:function(data){
                        if (data == 5) {
                            alert('登陆成功');location.href='index';
                        } else if (data == 6) {
                            alert('登陆失败');location.href='login';
                        }
                    }
                })
            }else if(email_reg.test(u_name)){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"email_deng",
                    type:"post"
                });
                $.ajax({
                    data:{
                        u_name:u_name,
                        u_pwd:u_pwd
                    },success:function(data){
                        if (data == 5) {
                            alert('登陆成功');location.href='index';
                        } else if (data == 6) {
                            alert('登陆失败');location.href='login';
                        }
                    }
                })
            }


        }else{
            alert("条件不成立");
        }
    })
</script>

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
