<div class="setting-left l">
    <ul class="wrap-boxes">
        <li>
            <a href="{{url("/user/setprofile")}}" >个人资料</a>
        </li>
        <li >
            <a href="{{url('/user/setavator')}}">头像设置</a>
        </li>

        <li >
            @if($user[0]['user_phone_status'] == 1)
                <a href="{{url("user/setphonestep")}}">手机设置</a>
                <span class='unbound'>已绑定</span>
            @else
                <a href="{{url('/user/setphone')}}">手机设置</a>
                <span class='unbound'>未绑定</span>
            @endif
        </li>
        <li >
            @if($user[0]['user_email_status'] == 1)
                <a href="{{url("user/setbindemail")}}">邮箱验证</a>
                <span class='unbound'>已绑定</span>
            @else
                <a href="{{url('user/setverifyemail')}}">邮箱验证</a>
                <span class='unbound'>未绑定</span>
            @endif
        </li>
        <li >
            <a href="{{url('/user/setresetpwd')}}">修改密码</a>
        </li>
        <li >

            <a no-pjajx href="{{url("user/my_house")}}">我的收藏</a>
        </li>
    </ul>
</div>
<script>
    $('.wrap-boxes li a').each(function(){
        //alert($(this).attr('href'))
        if($(this).attr('href') =="<?php $re=Request::url();
        echo $re; ?>"){
            $(this).addClass("onactive");
            $(this).parent().addClass("active")
        }
    })
</script>