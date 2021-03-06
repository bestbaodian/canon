<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>面试宝典大师秀</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375">
<meta property="wb:webmaster" content="c4f857219bfae3cb">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Cache-Control" content="no-transform ">
    <meta name="keywords" content="面试宝典网，面试宝典官网，mbaodian，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
    <meta name="description" content="面试宝典是学习编程最简单的免费平台。面试宝典提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="/js/jquery-1.9.1.min.js"></script>
    <style>
        h1,h2,h3,h4,h5,h6{
            color:black;
        }
        .imgs{border:solid 1px black;height:50px;width:50px;border-radius: 50%;float:left;}/*头像类*/
    </style>
    <link rel="stylesheet" href="css/ahx.css" type="text/css">
    <link rel="stylesheet" href="css/muke3.css" type="text/css" />
</head>
<body style="background:#fff;">

@extends('layouts.master')
@section('sidebar')
    @parent
    <div id="main">
        <div class="wenda clearfix">
            <div class="l wenda-main">
                <div class="qa-content" data-qid="325735">
                    <div class="qa-content-inner ">
                        <div id="js-content-main">
                            <div class="detail-q-title clearfix">
                                <div>
                                    <a href="#" target="_blank">{{--href地址回答者的个人中心--}}
                                        {{--回答者头像--}}
                                        <img src="/<?php if($arr_user['user_filedir']){ echo $arr_user['user_filedir']; }else{ echo "images/unknow-160.png"; };?>"class="imgs" alt="用户头像" >
                                    </a>
                                </div><br/>
                                <h1 class="js-qa-wenda-title detail-wenda-title l" style="color:black;margin-left: 15px;"><?php echo $arr['0']['t_title'];?></h1>
                                <!-- 编辑 -->

                            </div>

                            <div id="js-qa-wenda" class="detail-wenda imgPreview rich-text" style="padding-left: 75px;"><p><?php echo $arr['0']['t_content']?><br /></p></div>
                        </div>

                        <div class="qa-header detail-user-tips">

                            <div class="qa-header-right r">
                                <em class="split l"> </em>
                                    @if(empty($house))
                                        <h4 id="s1" style="float: right"><a href="javascript:void(0)"><span  id="house" style="color: red">加入收藏<img src="/images/collection.jpg" style="width: 20px;height:20px;"></span></a></h4>
                                    @else
                                        <h4 id="s1" style="float: right"><a href="javascript:void(0)"><span  id="house" style="color: #0000ff">已收藏<img src="/images/cancel.jpg" style="width: 20px;height:20px;"></span></a></h4>
                                    @endif
                            </div>
                            <!-- 个人信息 -->
                            <div class="detail-user">
                                <span class="detail-provider">提问者</span>
                                <?php echo $arr_user['user_name'];?>
                            </div>

                        </div>
                    </div>

                </div>
                {{--问题回答是否登录--}}
                <?php if(Session::get('username')==""){ ?>
                {{--不登陆直接登录--}}
                <div id="js-qa-comment-input" class="detail-comment-input js-msg-context clearfix">
                    <div id="add-answer" class="detail-ci-avator">
                        <h3 class="answer-add-tip">添加回答</h3>
                        <a href="#login-modal" id="" data-category="UserAccount" data-action="login" data-toggle="modal" > <button id="answer-frame" class="answer-btn"></button></a>
                    </div>
                    <div id="avator-wrap" class="detail-ci-avator answer-hidden">
                    </div>
                    <div id="js-reply-wrap" class="answer-hidden">
                        <div id="js-reply-editor-box" class="wd-comment-box  js-ci-unlogin">
                        </div>
                        <div id="js-qa-ci-footer" class="qa-ci-footer clearfix">
                            <span class="qa-tips l"></span>
                            <div class="qa-ci-footright">
                                <button id="js-wenda-ci-submit" class="btn btn-red detail-ans disabled" data-qid="325735">回答</button>
                            </div>
                        </div>
                    </div>


                </div>
                <?php } else{?>
                {{--登录后可以评价--}}
                <div id="js-qa-comment-input" class="detail-comment-input js-msg-context clearfix">

                    <div id="add-answer" class="detail-ci-avator" style="">
                        <h3 class="answer-add-tip">添加回答</h3>
                        <button id="answer-frame" class="answer-btn"></button>
                    </div>

                    {{--添加回答--}}
                    <form action="hui" method="post">
                        <div id="avator-wrap" class="detail-ci-avator answer-hidden">
                            {{--当前登录人回答者头像--}}
                            <?php if(isset($arr['user'])){?>
                            <img src="/<?php if(Session::get('user_filedir')){ echo Session::get('user_filedir'); }else{ echo "images/unknow-160.png"; };?>"style="width: 50px;height: 50px;"  alt="用户头像" class="imgs"/>
                            <?php } ?>
                            <div class="detail-r clearfix">
                                <input type="hidden" name="url" value="<?php echo Request::fullurl() ?>">
                                {{--题id--}}
                                <input type="hidden" id="tid" name="tid" value="<?php echo $arr['0']['t_id']?>">
                                {{--回答者的名字--}}
                                <input type="hidden" value="{{Session::get('username')}}" name="user_name">

                                <span class="detail-name">{{Session::get('username')}}</span>
                                <p class="detail-signal"></p>
                            </div>
                        </div>
                        <div id="js-reply-wrap" style="" class="answer-hidden">
                            {{--百度编辑器--}}
                            <textarea  name="account" id="editor"></textarea>
                            <div id="js-qa-ci-footer" class="qa-ci-footer clearfix">
                                <span class="qa-tips l"></span>
                                <div class="qa-ci-footright">
                                    <input type="submit" class="btn btn-red detail-ans " value="回答" >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{--添加回答结束--}}
                <?php } ?>

                <!-- 回答数 -->
                <div class="ans_num">共<?php echo count($arr_com);?>条回答</div>
                <!--.开始回答-->
                <?php foreach ($arr_com as $key => $val){?>
                <div id="aa">
                    <div class="ques-answer">
                        <div class="answer-con first" id="id_156829">
                            <div class="user-pic l">
                                <a href="#" target="_blank">{{--href地址回答者的个人中心--}}
                                    {{--回答者头像--}}
                                    <img src="/<?= $val['user_filedir'];?>" class="imgs" alt="用户头像">
                                </a>
                            </div><!--.user end-->
                            <div class="detail-r">
                                <span class="time"><?php echo $val['com_addtime'];?></span>
                                <a class="detail-name" href="#" target="_blank"><?php echo $val['user_name'];?></a>{{--href地址回答者的个人中心--}}
                            </div>


                            <div class="answer-content rich-text imgPreview"><p><?php echo $val['com_content'];?><br></p></div>

                            <div class="ctrl-bar clearfix js-wenda-tool">
                                {{--判断是否登录,进行对回复的支持与反对--}}

                                <?php if(Session::get('username')==""){ ?>
                                <span class="agree-with " data-ques-id="313011" data-answer-id="156829" data-hasop="">
                                            <a href="#login-modal" id="" data-category="UserAccount" data-action="login" data-toggle="modal" ><b >赞同</b></a>
                                            </span>
                                            <span class="agree-with " data-ques-id="313011" data-answer-id="156829" data-hasop="">
                                            <a href="#login-modal" id="" data-category="UserAccount" data-action="login" data-toggle="modal" ><b >反对</b></a>
                                            </span>
                                <span class="reply" data-replynum="0" data-reply-id="156829" data-ques-uid="2965295"><em><?php if(isset($val['agree'])){echo count($val['agree']);}else{echo 0;}  ?></em>个回复</span>
                                <?php }else{ ?>

                                <?php if($val['is_agree']=='' ||$val['is_agree']==0){ ?>
                                {{--当前登录人没有回复--}}
                                <span class="agree-with " data-ques-id="313011" data-answer-id="156829" data-hasop="">
                                                <b class="agree" b="<?php echo $val['com_id'] ?>"  >赞同</b> </span>
                                <span class="agree-with " data-ques-id="313011" data-answer-id="156829" ><b class="disagree" b="<?php echo $val['com_id']; ?>">反对</b></span>
                                <?php }else{ if($val['is_agree']==1){ ?>
                                {{--已经赞过--}}
                                <span class="agree-with " data-ques-id="313011" data-answer-id="156829" data-hasop=""  style="background: #EDF1F2">
                                                    <b class="agree" b="<?php echo $val['com_id'] ?>"  >取消赞同</b>
                                                    </span>
                                <span class="agree-with" data-ques-id="313011" data-answer-id="156829" ><b class="disagree" b="<?php echo $val['com_id']; ?>">反对</b></span>

                                <?php }else{ ?>
                                {{--已经反对--}}
                                <span class="agree-with " data-ques-id="313011" data-answer-id="156829" data-hasop="">
                                                    <b class="agree" b="<?php echo $val['com_id'] ?>" >赞同</b>
                                                     </span>
                                <span class="oppose " data-ques-id="313011" data-answer-id="156829" style="background: #EDF1F2" ><b class="disagree" b="<?php echo $val['com_id']; ?>">取消反对</b></span>

                                <?php } ?>



                                <?php }?>
                                <span class="reply" data-replynum="0" data-reply-id="156829" data-ques-uid="2965295"><em class="num"><?php if(isset($val['agree'])){echo count($val['agree']);}else{echo 0;}  ?></em>个回复</span>

                                <?php  }?>
                            </div><!--.ctrl-bar end-->


                        </div>
                    </div>
                </div>
                <?php } ?>
                <!--.结束回答-->
                <div class="qa-comment-page">
                </div>

            </div>
            {{--右边开始--}}
            <div class="wenda-slider r">
                <div class="quiz"><a href="save" class="js-quiz">我要提问</a></div>
                <!-- 相关问题 -->
                <div class="panel about-ques">
                    <div class="panel-heading">
                        <h2 class="panel-title">相关问题</h2>
                    </div>
                    <div class="panel-body clearfix">
                        @foreach($xingguan as $v)
                            @if($v)
                            <div class="mkhotlist padtop">
                                <a class="relwenda" href="{{url("detail?id=$v[t_id]")}}" target="_blank"><?php echo mb_substr($v['t_title'],0,10);?></a><i class="answer-num">{{$v['S']}}回答</i>
                            </div>
                            @else
                                <div class="mkhotlist padtop">
                                    <p>暂无相关问题</p>
                                </div>
                                @endif
                        @endforeach
                    </div>
                </div>
                <!-- 广告 -->
                <div class="advertisement">
                </div><!--.advertisement end-->
                <div class="recommend-class">
                    <div class="title clearfix">
                        <h3>相关分类</h3>
                    </div><!--title end-->
                    <ul class="cls-list">
                        @foreach($ti as $key => $v)
                            <li>
                                <div class="class-info">
                                    <div class="class-icon">
                                        <a href="/wenda/5" target="_blank">
                                            分类头像位置
                                        </a>
                                    </div><!--.class-icon end-->
                                    <h4>
                                        <a href="#" target="_blank"><?= $v['d_name']?></a>
                                    </h4>
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
                                </div><!--.class-info end-->
                                <div class="desc">
                                    <i class="answer-num">{{$v['C']}}回答</i>
                                </div>
                            </li><!--li end-->
                        @endforeach
                    </ul><!--.cls-list end-->
                </div><!--.recommend-class end-->

            </div>
            {{--右边结束--}}
        </div>


        <div class="pop-tips-layer"></div>
    </div>


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
    <a class="elevator-top" href="javascript:;" style="display:none" id="backTop"></a>
</div>
<!--script-->
    <div style="display: none">
        {{--百度编辑器--}}
        <script type="text/javascript" charset="utf-8" src="baidu/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="baidu/ueditor.all.min.js"> </script>
        <script type="text/javascript">
            var ue = UE.getEditor('editor');
        </script>
        <?php  if(Session::get('username')){ ?>
<script>
    $('#answer-frame').click(function(){
        /*修改回答的样式，隐藏起来*/
        $('#add-answer').css('display','none')
//            $('#avator-wrap').toggleClass('detail-ci-avator')
        //把编辑器显示出来
        $('#avator-wrap').removeClass('detail-ci-avator answer-hidden').addClass('detail-ci-avator')
        $('#js-reply-wrap').removeClass('answer-hidden')

    })
</script>
<script>
jQuery(document).ready(function($) {
$('.agree').click(function(){
    /*获取同意按钮*/
    var ag=$(this)
    /*获取反对按钮*/
    var disag=$(this).parent().siblings('.agree-with').children();
    /*同意按钮的值*/
    var zan=$(this).html();
    /*获取点回答id*/
    var com_id=$(this).attr('b');
    /*获取数量位置*/
    var replay=ag.parent().siblings('.reply').children('.num');
    if(zan=='赞同'){
    $.ajax({
        url:'agree',
        type:'GET',
        data:{status:1,com_id:com_id},
        success:function(msg) {
            if (msg == 2) {
                /*初始状态不为0*/
                disag.html('反对');
                disag.parent().css('background', '');

                ag.parent().css('background', '#EDF1F2');
                ag.html('取消赞同')
            } else {
                if(msg==4){
                    var re = replay.html()*1+1*1;
                    replay.html(re)
                    ag.parent().css('background', '#EDF1F2');
                    ag.html('取消赞同')
                }
            }
        }})
    }else{
        $.ajax({
            url:'agree',
            type:'GET',
            data:{status:0,com_id:com_id},
            success:function(msg){
                if(msg==5){
                    var re = replay.html()-1;
                    replay.html(re)
                    ag.parent().css('background','');
                    ag.html('赞同')
                }
            }
        })
    }

})
$('.disagree').click(function(){
    /*获取同意按钮*/
    var ag=$(this)
    /*获取反对按钮*/
    var disag=$(this).parent().siblings('.agree-with').children();
    /*同意按钮的值*/
    var zan=$(this).html();
    /*获取点回答id*/
    var com_id=$(this).attr('b');
    /*获取数量位置*/
    var replay=ag.parent().siblings('.reply').children('.num');
    if(zan=='反对'){
        $.ajax({
            url:'agree',
            type:'GET',
            data:{status:2,com_id:com_id},
            success:function(msg){
                if (msg == 2) {
                    /*初始状态不为0*/
                    disag.html('赞同');
                    disag.parent().css('background', '');
                    ag.parent().css('background', '#EDF1F2');
                    ag.html('取消反对')
                } else {
                    if(msg==4){
                        var re = replay.html()*1+1*1;
                        replay.html(re)
                        ag.parent().css('background', '#EDF1F2');
                        ag.html('取消反对')
                    }
                }
            }})
    }else{
        $.ajax({
            url:'agree',
            type:'GET',
            data:{status:0,com_id:com_id},
            success:function(msg){
                if(msg==5){
                    var re = replay.html()-1;
                    replay.html(re)
                    ag.parent().css('background','');
                    ag.html('反对')
                    }
                }
            })
        }
    })
})
</script>
        <?php } ?>
    </div>
</body>
</html>
@endsection
<script>
    $(function(){
        $("#house").click(function(){
            var tid = $("#tid").val();
            $.ajax({
                type: "POST",
                url: "delhouse_wenda",
                data: "tid="+tid,
                success: function(msg){
                    var obj = eval("("+msg+")");
                    if(obj['msg'] == "ok"){
                        tr = '';
                        tr += '<h4 id="s1" style="float: right"><a href="javascript:void(0)"><span  id="house" style="color: #0000ff">已收藏<img src="/images/cancel.jpg" style="width: 20px;height:20px;"></span></a></h4>';
                        $("#house").remove();
                        $("#s1").html(tr);
                    }else{
                        alert('已收藏')
                    }
                }
            });
        })
    })
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