<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>面试宝典</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
<meta name="keywords" content="面试宝典网，面试宝典官网，MOOC，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
<meta name="description" content="面试宝典是学习编程最简单的免费平台。慕课网提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
<link rel="stylesheet" href="/css/base.css" type="text/css" />
<link rel="stylesheet" href="/css/common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/profile-less.css" type="text/css" />
<link rel="stylesheet" href="/css/user-common-less.css" type="text/css" />
<link rel="stylesheet" href="/css/layer.css" type="text/css" />
<script src="/js/jquery-1.9.1.js"></script>
<script src="/static/js/user.js"></script>
</head>
<body >
@extends('layouts.master')
@section('sidebar')
@parent
<div id="main">

<div class="settings-cont clearfix">

  <div class="setting-left l">
    <ul class="wrap-boxes">
      <li class="active">
        <a href="/user/setprofile" class="onactive">个人资料</a>
      </li>
      <li >
         <a href="/user/setavator">头像设置</a>
       </li>

      <li >
        <a href="/user/setphone">手机设置</a>
                    <span class='unbound'>未绑定</span>
              </li>

      <li >
        <a href="/user/setverifyemail">邮箱验证</a>
                    <span class='unbound'>未绑定</span>
              </li>
      <li >
        <a href="/user/setresetpwd">修改密码</a>
      </li>
      <li >

        <a no-pjajx href="/user/setbindsns">我的收藏</a>
      </li>
    </ul>
  </div>
  <div class="setting-right">
    <div class="setting-right-wrap wrap-boxes settings" >


<div id="setting-profile" class="setting-wrap setting-profile">
    <form id="profile" >

        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="nick" >昵称</label>
            <div class="rlf-group">
                <input type="text" name="nickname" id="nick"  autocomplete="off"  data-validate="nick"  class="input rlf-input rlf-input-nick" value="{{$user['0']['user_name']}}" placeholder="请输入昵称."/>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>

        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="job">职位</label>
            <div class="rlf-group">
                <select class="input rlf-select" name="job" hidefocus="true" id="job">
                    <option value="">请选择职位</option>
                    @foreach($career as $key=>$val)
                        <?php
                            if($val['c_id'] == $user[0]['user_job']){
                                 echo "<option selected='selected' value='$val[c_id]' >$val[c_career]</option>";
                            }else{
                                echo "<option value='$val[c_id]' >$val[c_career]</option>";
                            }
                        ?>
                    @endforeach
                </select>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>

        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="province-select">城市</label>
            <div class="rlf-group profile-address">
                <select id="province-select1" class='input' hidefocus="true">
                    <option  value="0">选择省份</option>
                    @foreach($first as $key=>$val)
                        <?php
                        if($val['region_id']==$city[0]['region_id']){?>
                            <option selected="selected" value="{{ $val['region_id']  }}">{{ $val['region_name'] }}</option>
                        <?php }else{?>
                            <option  value="{{ $val['region_id'] }}">{{ $val['region_name'] }}</option>
                        <?php }?>
                    @endforeach
                        <option value="100">其他</option>
                </select>
                <select class='input' id="city-select1" hidefocus="true" >
                    <option value="{{$city[1]['region_id'] or "0"}}">{{$city[1]['region_name'] or "选择城市"}}</option>
                </select>
                <select class='input mr0' id="area-select" hidefocus="true">
                    <option value="{{$city[2]['region_id'] or "0" }}">{{$city[2]['region_name'] or "选择区县"}}</option>
                </select>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>

        <div class="wlfg-wrap clearfix">
            <label class="label-name" >性别</label>
            <div class="rlf-group rlf-radio-group">
                <label ><input type="radio" hidefocus="true" value="0" <?php if($user[0]['user_sex']==0){ echo "checked"; } ?> name="sex">保密</label>
                <label ><input type="radio" hidefocus="true" value="1" <?php if($user[0]['user_sex']==1){ echo "checked"; } ?> name="sex">男</label>
                <label ><input type="radio" hidefocus="true" value="2" <?php if($user[0]['user_sex']==2){ echo "checked"; } ?> name="sex">女</label>
            </div>
            <p class="rlf-tip-wrap"></p>
        </div>
        <div class="wlfg-wrap clearfix">
            <label class="label-name" for="aboutme">个性签名</label>
            <div class="rlf-group">
                <textarea name="aboutme" id="aboutme" cols="30" rows="5" class="textarea">{{$user[0]['user_aboutme']}}</textarea>
                <p class="rlf-tip-wrap"></p>
            </div>
        </div>

        <div class="wlfg-wrap clearfix">
            <label class="label-name" for=""></label>
            <div class="rlf-group">
                <span id="profile-submit"  hidefocus="true"  aria-role="button" class="rlf-btn-green btn-block profile-btn">保存</span>
            </div>
        </div>
    </form>

</div>


    </div>
  </div>

</div>

</div>
@endsection
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
<div style="display: none">
</div>
</body>
</html>
