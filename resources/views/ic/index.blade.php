<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IT技术文章-面试宝典</title>
    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
    <link rel="stylesheet" href="css/ic.css" />
    <link rel="stylesheet" href="css/detail-less.css?v=1463035000" type="text/css" />
    <link href="time/css/timeline.css" rel="stylesheet" type="text/css" />
    <style>

    </style>
</head>
<body>
@extends('layouts.master')
@section('sidebar')
    @parent
    <div id="mai">
        <div id="left">
            <div class="detail-right r"><!-- 右侧start -->
                <!-- 作者信息 -->
                <div class="aside-author">
                    <div class="p clearfix">
                        <a href="#" class="l" title="{{$user['u_name']}}" target="_blank">
                            <img src="
                            @if(isset($user['user_filedir']))
                                {{$user['user_filedir']}}
                            @else
                                    images/unknow-160.png
                            @endif">
                        </a>
                    </div>
                    <a class="nick" href="/u/2788726/articles" title="{{$user['u_name']}}" target="_blank">
                        {{$user['u_name']}}
                    </a>
                    <span class="user-job">{{$user['c_career']}}<a href="{{"/user/interview"}}" class="article-num">
                                面试安排 (<b>{{count($arr)}}</b>)
                            </a>
                    </span>

                </div>
                <!-- 作者信息end -->
                <?php if(!empty($arr)){?>
                <section id="cd-timeline" class="cd-container">
                    @foreach($arr as $v)
                        <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-picture">
                                <img src="time/images/cd-icon-location.svg" alt="Picture">
                            </div><!-- cd-timeline-img -->
                            <div class="cd-timeline-content">
                                <p>{{$v['company']}}</p>
                                <span class="cd-date">{{$v['time']}}　</span>
                            </div> <!-- cd-timeline-content -->
                        </div> <!-- cd-timeline-block -->
                    @endforeach
                </section>
                <? }?>
            </div>
        </div>
        <div id="mid">
            @if(count($ic)>0)
                <button id="lb" style="cursor:pointer;background-color: #fcb6ff;" title="列表">列表</button>
                <button id="sjz" disabled="disabled" title="时间轴">时间轴</button>
                <section id="cd-timeline" class="cd-container">
                    @foreach($ic as $v)
                        <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-picture">
                                <img src="time/images/cd-icon-location.svg" alt="Picture">
                            </div><!-- cd-timeline-img -->
                            <div class="cd-timeline-content">
                                <h5>{{$v['u_name']}}：</h5>
                                <p>{{$v['company']}}</p>
                                <span style="float: right">--{{$v['c_name']}}{{$v['c_class']}}班</span>
                                <span class="cd-date">　{{$v['times']}}　</span>
                            </div> <!-- cd-timeline-content -->
                        </div> <!-- cd-timeline-block -->
                    @endforeach
                </section>
                <table>
                    <tr>
                        <th>姓名</th>
                        <th>班级</th>
                        <th>面试公司</th>
                        <th>面试时间</th>
                    </tr>
                    @foreach($ic as $v)
                        <tr>
                            <td>{{$v['u_name']}}</td>
                            <td>{{$v['c_name']}}{{$v['c_class']}}班</td>
                            <td>{{$v['company']}}</td>
                            <td>{{$v['times']}}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <style>
                    #mid{
                        text-align: center;
                        height: 500px;
                        line-height: 500px;
                    }
                </style>
                暂无信息
            @endif
        </div>
        <div id="right">
            <input type="text" id="datetimepicker3"/>
        </div>
    </div>
</body>
@endsection
<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="time/js/modernizr.js"></script>
<script>
    var $1=$;
</script>
<script type="text/javascript">
    $1(function(){
        var index=1;
        $1('#datetimepicker3').datetimepicker({
            inline:true,
            timepicker:false
        });
        $1(document).on('click','.xdsoft_date',function(){
            var day=$1(this).attr('data-date');
            var month=parseInt($1(this).attr('data-month'))+1;
            var year=$1(this).attr('data-year');
//            location.href='Ic?y='+year+'&m='+month+'&d='+day;
            $1.post('mid',{year:year,mouth:month,date:day},function(data){
                if(data!=0){
                    $1('#mid').html(data).css({'text-align': '','height': '','line-height': ''});
                    if(index==2){
                        $1('#mid table').css('display','block');
                        $1('#mid #cd-timeline').css('display','none');
                        $1('#mid button').eq(0).css({cursor:'auto','background-color': '#fff'})
                                .attr('disabled',true).siblings('button')
                                .css({cursor:'pointer','background-color': '#fcb6ff'})
                                .removeAttr('disabled');
                    }
                }else{
                    $1('#mid').html('暂无信息').css({'text-align': 'center','height': '500px','line-height': '500px'})
                }

            })
        });
        var $timeline_block = $1('.cd-timeline-block');
        //hide timeline blocks which are outside the viewport
        $timeline_block.each(function(){
            if($1(this).offset().top > $1(window).scrollTop()+$1(window).height()*0.75) {
                $1(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
            }
        });
        //on scolling, show/animate timeline blocks when enter the viewport
        $1(window).on('scroll', function(){
            $timeline_block.each(function(){
                if( $1(this).offset().top <= $1(window).scrollTop()+$1(window).height()*0.75 && $1(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
                    $1(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
                }
            });
        });
        $1(document).on('click','#mid button',function(){
            $(this).css({cursor:'auto','background-color': '#fff'})
                    .attr('disabled',true).siblings('button')
                    .css({cursor:'pointer','background-color': '#fcb6ff'})
                    .removeAttr('disabled');
            var val=$(this).attr('title');
            if(val=='列表'){
                $('#mid table').css('display','block')
                $('#mid #cd-timeline').css('display','none')
                index=2;
            }else{
                $('#mid table').css('display','none')
                $('#mid #cd-timeline').css('display','block')
                index=1
            }
        })
    });
</script>
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