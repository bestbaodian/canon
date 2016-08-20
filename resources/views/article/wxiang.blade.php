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
<meta name="Description" content=""/>
<script type="text/javascript">
var OP_CONFIG={"module":"article","page":"details","userInfo":{"uid":"3071208","nickname":"\u51e4\u9896","head":"http:\/\/img.mukewang.com\/images\/unknow-80.png","usertype":"1","roleid":0}};
var isLogin = 1;
var is_choice = "";
var seajsTimestamp="v=201604211612";
</script>
<script>
var pageInfo = {
    id: "7997"
}
var user = {
    uid : "3071208",
    img : "http://img.mukewang.com/images/unknow-160.png",
    nickname : "凤颖"
}
var authorUid = {
    uid : '2788726'
}
</script>
<link rel="stylesheet" href="css/common-less.css" type="text/css" />
<link rel="stylesheet" href="css/detail-less.css?v=1463035000" type="text/css" />
</head>
<body >
@extends('layouts.master')
@section('sidebar')
    @parent


<script>
var isLogin=1
</script>
<div class="opus-wrap clearfix">

<div class="detail-left l">
    <!-- 面包屑 -->
    <div class="detail-path">
        <a href="/article">手记</a> \
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
            <p><?php echo $arr['a_con']?></p>
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
                    <span class="praise l">推荐</span>
                </span>
                <var class="cutoff l">|</var>
                <span class="praise-num">7</span>
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
                    <span class="BSHARE_COUNT bshare-share-count">0</span>
                    </div>
                    <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>

                       

                    </li>
                </ul>
            </div>
            <!-- 分享end -->
            <!-- 收藏&举报 -->
            <div class="r-box r">
                                                                    <span id="js-follow" data-id="7997" class="dc-follow l">
                        <span>收藏</span>
                    </span>
                                                            </div>
            <!-- 收藏&举报end -->

        </div>
    </div>
    <!-- 文章详情end -->
  
    <!-- 相关阅读 -->
{{--<div class="react-article">--}}
        {{--<h2>相关阅读</h2><ul><li><a title="前端开发的七宗罪" href="/article/1277"><h3>前端开发的七宗罪</h3></a>                                    <p>前端开发在最近几年逐渐走红，越来越多的开发者加入前端开发队伍。但前端在大学中没有课程体系，而且知识也在不断更新着。大家对它的认识也各不相同。博主有过技术经理，项目经理，面试官，前端开发的经历，参与过较...</p></li><li><a title="【慕星人独白】在一个急躁的心理状态下，怎样正常的生活" href="/article/4485"><h3>【慕星人独白】在一个急躁的心理状态下，怎样正常的生活</h3></a></li><li><a title="【特别推荐】一枚应届生对近来前端界流派之争的一点思考" href="/article/4533"><h3>【特别推荐】一枚应届生对近来前端界流派之争的一点思考</h3></a></li><li><a title="Node.js 给前端带来了什么？" href="/article/7443"><h3>Node.js 给前端带来了什么？</h3></a></li><li><a title="2016 年后 Web开发趋势是什么" href="/article/7913"><h3>2016 年后 Web开发趋势是什么</h3></a></li></ul>--}}
    {{--</div>--}}
    <!-- 相关阅读end -->





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
                        <span class="com-floor r">1F</span>
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
            <a href="#" class="l" title="{{$aping[0]['user_name']}}" target="_blank">
                <img  src="{{$aping[0]['user_filedir']}}">
            </a>
        </div>
            <a class="nick" href="#" title="{{$aping[0]['user_name']}}" target="_blank">{{$aping[0]['user_name']}}</a>
            <span class="user-job"></span>
            <span class="user-desc">{{$aping[0]['user_aboutme']}}</span>
        <div class="btn-box clearfix">
            <a href="/u/2788726/articles" target="_blank" class="article-num r-bor l">
                <span>{{$sum_yulan[0]['count(*)']}}</span>篇文章
            </a>
            <a href="/u/2788726/articles?type=praise" target="_blank" class="article-recom l">
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
      </script>
<div style="display: none">
</div>
</body>
</html>
