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