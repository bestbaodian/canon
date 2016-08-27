<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>面试宝典-提问</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<meta property="qc:admins" content="77103107776157736375">
<meta property="wb:webmaster" content="c4f857219bfae3cb">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Cache-Control" content="no-transform ">
    <meta name="keywords" content="面试宝典网，面试宝典官网，mbaodian，移动开发，IT技能培训，免费编程视频，php开发教程，web前端开发，在线编程学习，html5视频教程，css教程，ios开发培训，安卓开发教程" />
    <meta name="description" content="面试宝典是学习编程最简单的免费平台。面试宝典提供了丰富的移动端开发、php开发、web前端、html5教程以及css3视频教程等课程资源。它富有交互性及趣味性，并且你可以和朋友一起编程。" />
    <link rel="stylesheet" href="../css/ahx.css" type="text/css">
    <script src="../js/jquery.js" async="" charset="utf-8"></script>
    <script src="../js/string.js" async="" charset="utf-8"></script>
    <script src="../js/socket.js" async="" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="../css/ueditorhx.css">
    <script defer="defer" type="text/javascript" src="../js/codemirror.js">
    </script><link href="../css/codemirrorhx.css" type="text/css" rel="stylesheet">
    <script defer="defer" type="text/javascript" src="../js/ZeroClipboard.js"></script>
    <link rel="stylesheet" href="../js/assets/design/css/trumbowyg.css">
    <script src="../js/assets/jquery.min.js"></script>
    <script src="../js/assets/plugins/base64/trumbowyg.base64.js"></script>
    </head>
<body style="background:#fff;">

@extends('layouts.master')
@section('sidebar')
@parent


<div style="" id="main">

<div style="" class="container clearfix">
    <div style="" class="l bbs-main">
      <div style="" class="sucesspage">
        <h2 class="new-save-title">提问标题</h2>
        <div style="" id="js-inputques" class="inputques">
               <div class="quesdetail clearfix">
                  <span class="ques-label first-label">*</span>
                  <div class="question-area">
                    <input id="t_title" class="ipt autocomplete" maxlength="255" name="title" placeholder="请一句话说明你的问题，以问号结尾" type="text">
                    <p class="errortip"></p>
                    <dl style="display: none;" class="send-area-result"></dl>
                  </div>
               </div>
                <div style="" class="quesdetail mbottom">


                 <script src="js/jquery-1.9.1.js"></script>
                 <body>
                <textarea id="content" name="t_content" style="margin-left:29px; width: 810px;height: 260px;" row="5" col="6" onkeyup="fun1()"></textarea>
                <span id="c_content"></span>
                    
                </body>
                </div>
                <div class="mbottom">
                    <br>
                <h4 class="new-save-title">所属学院:</h4>
                <br>
                  <div id="tag-title" class="new-tags ques-tag defaultbox">
                    
                    <div id="js-tags" class="taglist clearfix">
                      
                <select name="pro" id="pro" class="select">
                    <option value="0">请选择</option>
                        @foreach($pro as $k=>$v)
                            <option value="<?php echo $v['d_id'];?>"><?php echo $v['d_name']?></option>
                        @endforeach
                </select>  
                   </div>
                    
                  </div>
               </div>
        </div>
        <div class="verify-box clearfix">
          <span class="ques-label l">_</span>
          <div class="verify-code"></div>
        </div>
        <div class="saveques-bottom">
<!--          <a href="javascript:void(0)" id="ques-submit-btn" class="btn btn-red link-btn publishbtn" >发布提问</a>-->
                <a href="javascript:void(0)" id="ques-submit-btn" style="background-color: rgba(247, 179, 146, 0.87)" class="aaaa" >发布提问</a>
          <p class="global-errortip js-global-error"></p>
        </div>
        <script>
               function fun1(){  
                var content=document.getElementById("content").value;  
                var len=content.length;  
                if(len<=100){  
                    document.getElementById("c_content").innerHTML="你还可以输入"+(100-len)+"个字";  
                }else{  
                    document.getElementById("content").innerHTML=content.substr(0,10);  
                    document.getElementById("c_content").innerHTML="你不可以输入了";  
                }  
        }  
        </script>
        <script>
            $(function(){
                $(document).on('click',".aaaa",function(){
                    var title=$("#t_title").val();
                    var content=UE.getEditor('content').execCommand( "getlocaldata" );
                    var pro=$("#pro").val();
                    if(pro==0){
                        alert('所属学院不能为空');die;
                      }
                         $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                },
                                url:"tiwen",
                                type:"post"
                            });
                                   $.ajax({
                                    data:{
                                      title:title,
                                      content:content,
                                      pro:pro
                                    },
                                    success:function(data){
                                      //$("#list").html(data)
                                      //alert(data);
                                      if(data==1){
                                          location.href='wenda';
                                      }
                                    }
                                  })
                })
            })
        </script>
      </div>
     </div>
    <div class="r bbs-slide">
      <div class="panel bbs-sendques">
        <div class="panel-body">
          <h1>提问注意事项</h1>
          <dl>
            <dd>1、大家每天可以免费提出问题</dd>
            <dd>2、您是来解决问题？请先搜索是否已经有同类问题吧。这样您就省心少打字。</dd>
            <dd>3、没找到是么？就在发问题时精确描述你的问题，不要写与问题无关的内容哟；</dd>
            <dd>4、更热衷于解达您想要的答案。能引起思考和讨论的知识性问题；</dd>
            <dt>问答禁止这些提问</dt>
            <dd>1、禁止发布求职、交易、推广、广告类与问答无关信息将一律清理。</dd>
            <dd>2、尽可能详细描述您的问题，如标题与内容不符，或与问答无关的信息将被删除扣分。</dd>
            <dd>3、问答刷屏用户一律冻结帐号</dd>
          </dl>
        </div>
      </div>
    </div>
    <!-- error-pop -->
    <div class="pop-tips-layer"></div>
</div>
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



<script type="text/javascript" src="js/sea.js"></script>
<script type="text/javascript" src="js/sea_config.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ueditor_002.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ueditor.js"> </script>
<script type="text/javascript" charset="utf-8" src="js/zh-cn.js"></script>

<div style="display: none">
</div>
<script type="text/javascript" charset="utf-8" src="baidu/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="baidu/ueditor.all.min.js"> </script>
<script type="text/javascript">
    var ue = UE.getEditor('content');
</script>
@endsection




















