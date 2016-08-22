<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IT技术文章-面试宝典</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375" />
    <meta property="wb:webmaster" content="c4f857219bfae3cb" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta name="Keywords" content="" />
    <meta name="Description" content="面试宝典为IT专业技术人员提供最新的文章信息,包括PHP,JAVA,C语言,MySql,DB2等相关文章,更多IT技术资讯、原创内容、开源代码尽在慕课社区" />

    <script type="text/javascript">


        var OP_CONFIG={"module":"article","page":"index"};
        var isLogin = 0;
        var is_choice = "";
        var seajsTimestamp="v=201603251711";

    </script>



    <link rel="stylesheet" href="css/3dd38c5eb19043548362b1f191b56a92.css" type="text/css" />
</head>
<body >

@extends('layouts.master')
@section('sidebar')
    @parent

    <div id="main">

    <div class="container clearfix">
        <div class="article-left l">

            <ul class="article-tab clearfix">
                <li  class="<?=(!isset($_GET['at_id'])||$_GET['at_id']==0)?'tabactive':''?>" >
                    <a data-id="0" id="type1" value="0" href="{{URL('article')}}">全部</a>
                </li>
                <?php foreach($at_type as $k=>$v){?>
                <li  class="<?=(isset($_GET['at_id'])&&$_GET['at_id']==$v['at_id'])?'tabactive':''?>">
                    <a data-id="105"  id="type" href="{{URL('article?at_id')}}=<?php echo $v['at_id']?>" value="<?php echo $v['at_type']?>"><?php echo $v['at_type']?></a>
                </li>

                <?php }?>
            </ul>
            <div class="article-tool-bar clearfix">
                <div class="tool-left l">
                    <a href="{{url("article?new=0")}}" class="sort-item active">最新</a>
                    <a href="{{url("article?top=1")}}" class="sort-item ">热门</a>
                </div>
            </div>
            <div id="lie">
            <?php foreach($article as $k=>$v){?>
            <div class="article-lwrap ">
                <!-- text -->
                <input type="hidden" id="a_id" value="{{$v['a_id']}}">
                <div class="">
                    <h3 class="item-title">
                        <a href="{{URL('fangfa?id=')}}{{$v['a_id']}}" target="_self" class="title-detail">{{$v['a_title']}}</a>
                    </h3>
                    <p class="item-bd"><?php echo mb_substr($v['a_con'],0,100);?>...<p>
                    <div class="item-btm clearfix">
                        <ul class="l left-info">
                            <li class="hd-pic">
                                <a class="publisher-hd" href="#" target="_blank">
                                    <img src="" alt="" width="20" height="20" />
                                </a>
                                <a class="publisher-name" href="#" target="_blank">用户:{{$v['user_name']}}</a>
                            </li>
                            <li class="now-tag">
                                <a class="item-tag" href="#" target="_blank">{{$v['at_type']}}</a>
                            </li>
                            <li class="pass-time"><span>{{$v['a_addtime']}}</span></li>
                            <li class="pass-time"><span>{{$v['brows']}}浏览</span></li>
                        </ul>
                        <div class="r right-info">
                            <div class="favorite l" id="zan" value="{{$v['a_id']}}">
                                <img src="images/zan.jpg"  class="zan" width="15" height="20">

                                <em id="{{$v['a_id']}}" class="zans">点赞
                                    {{$v['a_num']}}
                                </em>
                                <input type="hidden" id="user" value="<?php echo Session::get('username');?>">


                            </div>
                            <div class="item-judge l">
                                <i class="icon sns-comment"></i><a href="{{URL('fangfa?id=')}}<?php echo $v['a_id']?>"><em>评论 <?php echo $v['a_pingnum'];?></em></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>

        </div>
            <ul id="fenye"><li>{{ $article->links()}}</li></ul>
        </div>
        <div class="article-right r">
            <!-- 写文章 -->


            <div class="new-ques">
                <a class="write-ques" href="publish">写文章</a>
                <div class="ques-bd">
            </div>
                </div>

            <!-- 推荐文章 -->
            <div class="remon-page">
                <h2 class="panel-hd">推荐文章</h2>
                <div class="remon-main">
                    <ul>
                        @foreach($arr as $k=>$v)
                            <li>
                                <h3 class="remon-title">
                                    <a href="{{URL("fangfa?id=$v[a_id]")}}" class="title-detail">{{$v["a_title"]}}</a>
                                </h3>
                                <p class="remon-bd"><?php echo mb_substr($v['a_con'],0,100);?></p>
                                <div class="arti-info clearfix">
                                    <ul>
                                        <li class="hd-pic">
                                            <a class="publisher-hd" href="#" target="_blank">
                                                <img src="" alt="" width="20" height="20" />
                                            </a>
                                            <a class="publisher-name" href="#" target="_blank">{{$v["user_name"]}}</a>
                                        </li>
                                        <li class="now-tag">
                                            <a class="item-tag" href="#" target="_blank">{{$v["at_type"]}}</a>
                                        </li>
                                        <li class="now-tag">
                                            <span class="viewed-num">{{$v["brows"]}}浏览</span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- 一周达人 -->
            <div class="weekly-rank">
                <h2 class="panel-hd">达人排行榜</h2>
                <div class="article-weekly clearfix">
                    <ol class="weekly-top">
                        @foreach($daren as $key=>$vv)
                        <li>
                            <a href="#" class="l hot-head" target="_blank" title="">
                                <img src="
                                <?php if($vv['user_filedir']==""){
                                        echo "/images/unknow-40.png";
                                    }else{
                                        echo $vv['user_filedir'];
                                }?>
                                " alt="" width="40" height="40" />
                            </a>
                            <a href="#" target="_blank" class="hot-name">{{$vv['user_name']}}</a>

                            <i class="rank-num weektop-first">{{$key+1}}</i>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>

</div>


<div id="J_GotoTop" class="elevator">
    <a class="elevator-weixin" href="javascript:;">
        <div class="elevator-weixin-box">
        </div>
    </a>
    <a class="elevator-msg" href="#" target="_blank" id="feedBack"></a>
    <a class="elevator-app" href="#" >
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
    <script src="js/jquery-1.9.1.min.js"></script>
    <script>
  //点赞
  //鼠标移上显示小手
  $('.zans').mousemove(function()
  {
    $(this).css('cursor','pointer');
  })

//点赞事件
 $(document).on('click',".zans",function(){
    var user1=$('#user').val();
    //判断用户是否登录
    if(user1=="")
    {
        alert("请先登录");
        location.href="{{URL('index')}}";
    }
    else
    {
        var ids=$(this).attr('id');
    //alert(ids);die;
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{URL('zan')}}",
            type:"GET"
        });
    $.ajax({
       data: "ids="+ids,
       success: function(data){
        //alert(msg);
           var obj=eval("("+data+")");
           if(obj['msg']==1){
               alert("您已经点过赞了哦");
           }else{
               alert('点赞成功');
               location.href="{{URL('article')}}";
           }
           /* if(msg==1)
            {
                alert("您已经点过赞了哦");
            }
            else
            {
               alert('点赞成功');
               location.href="{{URL('article')}}";
            }*/
        }
      });
    }
 })


        $(document).on("click","#type",function(){
           var type=$(this).attr("value")
            $.post('type',{
                type:type
            },function(data){
               //alert(data)
                $("#lie").html(data)
            })
        })

    </script>
</div>
</body>
@endsection
</html>
<style>
    #fenye li{
        list-style: none;
        float: left;
        margin-top: 20px;
        margin-left: 30px;
        font-size: 18px;
        color: #ff998c;
    }
</style>

