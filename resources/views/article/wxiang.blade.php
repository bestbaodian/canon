<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>
       <?php echo $arr['a_title'];?>_面试方法-面试宝典
</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375" />
<meta property="wb:webmaster" content="c4f857219bfae3cb" />
<meta http-equiv="Access-Control-Allow-Origin" content="*" />
<meta http-equiv="Cache-Control" content="no-transform " />
    <meta name="keywords" content="面试宝典网，面试宝典官网，mbaodian，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
    <meta name="description" content="面试宝典是学习编程最简单的免费平台。面试宝典提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
<link rel="stylesheet" href="css/common-less.css" type="text/css" />
<link rel="stylesheet" href="css/detail-less.css?v=1463035000" type="text/css" />
</head>
<body >
@extends('layouts.master')
@section('sidebar')
    @parent
<div class="opus-wrap clearfix">

<div class="detail-left l">
    <!-- 面包屑 -->
    <div class="detail-path">
        <a href="/article">方法</a> \
        <span> <?php echo $arr['a_title'];?></span>
    </div>
    <!-- 面包屑end -->
    <!-- 文章详情 -->
    <div class="detail-content-wrap">
        <h1 class="detail-title">

            {{$arr['a_title']}}
                </h1>
        <div class="dc-addon clearfix">
            <div class="dc-profile clearfix">
                <span class="spacer l">{{$arr['a_addtime']}}发布</span>
                <span class="spacer l spacer-2">{{$arr['brows']}}浏览</span>
                <!--<a class="spacer l" href="#comment" >评论</a>-->
                                                                                                            </div>
        </div>

        <div class="detail-content ">
            <input type="hidden" id="a_id" value="<?php echo $arr['a_id'];?>"/>
            <p><?php echo htmlspecialchars($arr['a_con']);?></p>
        </div>
                <!-- 标签 -->
                <div class="cat-box clearfix">
                    {{--需要把标签变活--}}
                    @foreach($typer as $key=>$val)
                        <a class="cat l" href="#" target="_blank">{{$val['al_name']}}</a>
                    @endforeach
                        {{--<a class="cat l" href="/article/tag/25" target="_blank">2</a>--}}
                    </div>
            
        <div class="active-box clearfix">
            <!-- 推荐 --> 
                        <div class="praise-box l">
                <span id="js-praise" data-id="7997" class="dc-praise l">
                    <i class="sns-thumb-up l"></i>
                    <span class="praise l" id="clickzan">
                        <?php
                            if($is_zan){
                                echo "已赞";
                            }else{
                                echo "点赞";
                            }
                        ?>
                        </span>
                </span>
                <var class="cutoff l">|</var>
                <span class="praise-num"><?php echo $arr['a_num'];?></span>
            </div>  
                        <!-- 推荐end -->

            <!-- 分享 -->
            <div class="share-rl-tips share-posi js-share-statue">
                <span>分享即可 +</span><strong>1积分</strong>
                <span class="rule-arrow"></span>
            </div>
            <div class="small-share l">
                <ul class="share-wrap">
                    <li class="weichat-posi">
                         <div class="bdsharebuttonbox weichat-style">
                            {{--<a href="#" class="bds_weixin icon-nav icon-share-weichat" data-cmd="weixin" title="分享到微信"></a>--}}
                            {{--<a href="#" class="bds_tsina icon-nav icon-share-weibo" data-cmd="tsina" title="分享到新浪微博"></a>--}}
                            {{--<a href="#" class="bds_qzone icon-nav icon-share-qq" data-cmd="qzone" title="分享到QQ空间"></a>--}}
                        </div>
                    <div class="bshare-custom">
                    <a title="分享到QQ空间" class="bshare-qzone"></a>
                    <a title="分享到新浪微博" class="bshare-sinaminiblog"></a>
                    <a title="分享到人人网" class="bshare-renren"></a>
                    <a title="分享到腾讯微博" class="bshare-qqmb"></a>
                    <a title="分享到网易微博" class="bshare-neteasemb"></a>
                    <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a>
                    </div>
                    <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>

                       

                    </li>
                </ul>
            </div>
            <!-- 分享end -->
            <!-- 收藏&举报 -->
            <div class="r-box r">
                <span id="js-follow" data-id="7997" class="dc-follow l">
                        <span class="collect" id="{{$a_id}}">
                            <?php
                                if($is_collect){
                                    echo "已收藏";
                                }else{
                                    echo "收藏";
                                }
                            ?>
                            </span>
                    </span>
            </div>
            <!-- 收藏&举报end -->

        </div>
    </div>
 <div class="detail-feedback-wrap" style="">
        <!-- 评论框 -->
    <div>
     <input type="button" id="user1" value="<?php echo session::get('username')?>">
        <textarea name="content1" id="con1" cols="100" rows="10"></textarea>
        <input type="hidden" id="aid" value="<?php echo $arr['a_id'];?>">
        {{--原来的 评论  判断是否登录 转移到一开始点评论进去 判断--}}
        <button class="btn btn-green r" id="js-submit" onclick="cons();">评论</button>
    </div>
 
        <!-- 评论框end -->

        <!-- 热门评论 -->
        <div class="hot-df-title" style="display: none;">热门评论</div>
        <div class="feedback-list" id="js-feedback-hot-list-wrap" style="display: none;">
            <p class="feedback-loading">
            评论加载中...
            </p>
        </div>
        <!-- 评论 -->
        <div id="all_comments" class="df-title">全部评论<span class="comment-num"><i></i></span></div>
        <div class="feedback-list" id="js-feedback-list-wrap">
        <div id="js-feedback-list">
        {{--评论数据循环开始--}}
            @foreach($ping_data as $key=>$val)
            <div class="comment-box">
                <div class="comment clearfix">
                    <div class="feed-author l">
                        <a href=""><img width="40" alt="{{$val['user_name']}}" src="{{$val['user_filedir']}}"></a>
                        <a target="_blank" href="#" class="nick">{{$val['user_name']}}</a>
                        <span class="com-floor r">{{$key+1}}F</span>
                    </div>
                    <div class="feed-list-content">
                        <p></p>
                        <p>{{$val['ap_con']}}</p>
                        <p></p>
                        <div class="comment-footer">
                            <span class="feed-list-times"> {{$val['ap_addtime']}}　　评论</span>
                            <span data-username="qq_青枣工作室_0" data-uid="1938237" data-commentid="23493" class="reply-btn" onclick="reply(<?= $val['ap_id']?>)" >回复</span>
                            <span data-username="qq_青枣工作室_0" data-uid="1938237" data-commentid="23493" class="agree-with r">
                                <b id="z_{{$val['ap_id']}}" onclick="likes({{$val['ap_id']}})">
                                    <?php
                                    $arr_id=explode(',',$val['allid']);
                                    ?>
                                    <?php if(in_array(Session::get('uid'),$arr_id)){
                                            echo '已点赞';
                                        }else{
                                            echo '点赞';
                                        }
                                    ?>
                                </b>
                                <em id="znum_{{$val['ap_id']}}">{{$val['count']}}</em>
                            </span>
                        </div>
                    </div>
                </div>
                    @if(isset($val['huifu']))
                    <div style="margin-left: 60px;">
                        @foreach($val['huifu'] as $vv)
                            <img width="40" alt="{{$vv['user_name']}}" src="<?php if($vv['user_filedir']){ echo $vv['user_filedir'];}else{ echo "/images/unknow-40.png"; }?>">
                            <span style="color: red">{{$vv['user_name']}}</span>:&nbsp;&nbsp;
                            <?=$vv['ap_cont']?>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?=$vv['article_addtime'] ?><br><br>
                        @endforeach
                        </div>
                    @endif
                <div class="reply-box" id="tr_<?= $val['ap_id']?>"></div>
            </div>
            {{--评论数据循环结束--}}
            @endforeach
        </div>
        </div>
        <!-- 分页页码  -->
        <div class="qa-comment-page" style="display: none;"></div>
    </div>
</div><!-- 左侧end -->

<div class="detail-right r"><!-- 右侧start -->
    <!-- 作者信息 -->
        <div class="aside-author">
        <div class="p clearfix" style="margin-left: 10px;">
            <a href="#" class="l" title="{{$arr['user_name']}}" target="_blank">
                <img  width="170"  height="170" src="{{$arr['user_filedir'] or "images/unknow-160.png"}}">
            </a>
        </div>
            <a class="nick" href="#" title="{{$arr['user_name']}}" target="_blank">{{$arr['user_name']}}</a>
            <span class="user-job"></span>
            <span class="user-desc">{{$arr['user_aboutme']}}</span>
        <div class="btn-box clearfix">
            <a href="#" target="_blank" class="article-num r-bor l">
                <span>{{$sum_yulan[0]['count(*)']}}</span>篇文章
            </a>
            <a href="#" target="_blank" class="article-recom l">
                <span>{{$sum_yulan[0]['sum(brows)']}}</span>浏览
            </a>
        </div>
    </div>
        <!-- 作者信息end -->

    <!-- 作者热门文章 制作人::王鹏飞-->
    <div class="other-article">
        <h2>作者的热门文章</h2>
        <ul>
            @foreach($hot as $k=>$v)
                <li>
                    <a href="{{url("fangfa?id=$v[a_id]")}}" title="{{$v['a_title']}}"><h3>{{$v["a_title"]}}</h3></a>
                    <p><?php echo mb_substr($v['a_con'],0,100);?></p>
                    <div class="show-box clearfix">
                        <span class="spacer l">{{$v["brows"]}}浏览</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- 作者热门文章end -->

    <!-- 广告 -->
                    <!-- 广告end -->
  
</div><!-- 右侧end -->

<!-- 文章目录 -->
<!-- 文章目录end -->


</div><!--opus-wrap end-->

<div id="main">

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



<script type="text/javascript" charset="utf-8" src="js/ueditor.final.min.js"></script>

<!--script-->
<script src="/js/ssologin.js"></script>
<script type="text/javascript" src="/js/sea.js"></script>
<script type="text/javascript" src="/js/sea_config.js?v=201604211612"></script>

<a href="#login-modal" id="" data-category="UserAccount" data-action="login" data-toggle="modal" class="opp">
<!--script-->
<script src="/js/jquery-1.9.1.min.js"></script>
      <script>
         function cons()
         {
            var con1=$('#con1').val();
             if(con1!=""){
                 var aid=$('#aid').val();
                 $.ajax({
                     type: "POST",
                     url: "{{URL('wping')}}",
                     data: "ap_con="+con1+"&a_id="+aid,
                     success: function(msg){
                         var obj=eval("("+msg+")");
                         if(obj['error']){
                             alert("评论成功");
                             location.reload();
                         }else{
                             alert("评论异常");
                         }
                     }
                 });
             }else{
                 alert('内容不能为空')
             }
         }
          //点赞
         //(评论的id)
          function likes(ap_id){
              //获取这篇文章的id
              var a_id=$("#a_id").val();
             var ap_id=ap_id;
              var ap_zannum=$("#znum_"+ap_id).html();
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  },
                  url:"zanping",
                  type:"post",
                  datatype:"json"
              });
              $.ajax({
                  data:{
                      ap_id:ap_id
                  },success:function(data){
                      var obj=eval("("+data+")");
                      /*if(obj['error']!=1){
                          location.href("fangfa?id="+a_id);
                      }*/

                      if(obj['msg']==0){
                         // $("#znum_"+ap_id).html("obj['num']");
                          $("#z_"+ap_id).html("已赞");
                          $("#znum_"+ap_id).html(parseInt(ap_zannum)+1);
                      }else{
                          //$("#znum_"+ap_id).html("obj['num']");
                          $("#z_"+ap_id).html("点赞");
                          $("#znum_"+ap_id).html(ap_zannum-1);
                      }
                  }
              })
          }
         function reply(ap_id){
             $(".reply-box").html('');
             $("#tr_"+ap_id).html("<textarea style='width: 690px;height: 100px;' placeholder='写下你的回复...' id='a_ping'></textarea>&nbsp;<a href='javascript:void(0)' onclick='a_ping()' style='font-size: 20px;color: red;background-color: #ffffff'>回复楼主<a>");
         }
         function a_ping(){
             var a_ping = $("#a_ping").val();
             var a_id=$("#a_ping").parent().attr('id');
             var articleid = $("#aid").val()
             //alert(a_id);
             if(a_ping == ''){
                 alert('请输入回复内容');
             }else{
                 $.ajax({
                     type: "POST",
                     url: "a_ping",
                     data:{
                         ping:a_ping,
                         ap_id:a_id,
                         articleid:articleid
                     },
                     success: function(msg){
                         alert('回复成功');
                         $(".reply-box").html('');
                         $("#js-feedback-list").html(msg)
                     }
                 });
             }
         }
         $(function(){
             $(".collect").click(function(){
                 var a_id=$(this).attr('id');
                 $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                     },
                     url:"{{url('collect')}}",
                     type:"post",
                     datatype:"json"
                 });
                 $.ajax({
                     data:{
                         a_id:a_id
                     },success:function(data){
                         var obj=eval("("+data+")");
                         if(obj['msg']=='has'){
                             alert("您已收藏");
                         }else if(obj['msg']=='yes'){
                             alert('收藏成功');
                             $(".collect").html("已收藏");
                         }else if(obj['msg']=='not login') {
                             alert("请先登录")
                             $(".opp").click()
                         }else{
                             alert("收藏失败");
                         }
                     }
                 })
             })
                //为 文章点赞
             $("#clickzan").click(function(){
                 var a_id=$(".collect").attr('id');
                 $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                     },
                     url:"{{url('zan')}}",
                     type:"post",
                     datatype:"json"
                 });
                 $.ajax({
                     data:{
                         a_id:a_id
                     },success:function(data){
                         //alert(data);
                         var obj=eval("("+data+")");
                         if(obj['msg']=='queryok'){
                             alert('点赞成功');
                             location.reload();
                         }else if(obj['msg']=='not login'){
                             alert("请先登录")
                             $(".opp").click()
                         }else{
                             alert('您已点赞');
                         }
                     }
                 })
             })

         })
      </script>

<div style="display: none">
</div>
</body>
</html>
