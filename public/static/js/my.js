$(function(){
    //验证用户名不能为空
    var flag=false;
    $('#username').blur(function(){
        // alert(123);
        var username=$(this).val();
        if(username=='') {
            $('#name_sp').html('用户名不能空');
            //alert(123);
            flag=true;
            return flag;
        }else{
            $('#name_sp').html('');
            // alert(456);
            return flag;
        }
    })
    //验证邮箱格式是否正确
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
            $("#email_sp").html('邮箱格式不正确')
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
            $("#phone_sp").html('手机号格式不正确');
            return phoneflag;
        }
    })
    //验证手机号邮箱格式
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
            $("#sp_name").html('<font color="#f00">×</font>')
        }
    })
    //验证密码
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
    //登录点击按钮
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
                            location.href='index';
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
                            location.href='index';
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
    //验证注册
    $("#butt").click(function(){
        var name = $("input[name=user_name]").val();
        var user_pwd = $("input[name=user_pwd]").val();
        var user_email = $("input[name=user_email]").val();
        var user_phone = $("input[name=user_phone]").val();
        var reg = /^1\d{10}$/;
        var email_reg = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

        if (reg.test(user_phone) && email_reg.test(user_email))
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"reg",
                type:"post"
            })
            $.ajax({
                data:{
                    user_name:name,
                    user_pwd:user_pwd,
                    user_email:user_email,
                    user_phone:user_phone
                },success:function(data){
                    if(data == "true"){
                        location.href="index"
                    }else{
                        var dataObj=eval("("+data+")")
                        $("#check_reg").html(dataObj.translation).show(1).delay(2000).hide(1)
                    }
                }
            })
        }
        else
        {
            alert('手机号,邮箱必须填写');
        }

    })
    //保存修改个人资料
    $("#profile-submit").click(function(){
        var nickname = $("input[name=nickname]").val();
        var job = $("select[name=job]").val();
        var sex = $(":radio:checked").val()
        var aboutme = $("textarea[name=aboutme]").val();
        //省市区
        //var sheng=$("#province-select1").val();
        var sheng = $("#province-select1").val();
        var cheng = $("#city-select1").val();
        var qu = $("#area-select").val();
        //点击保存修改数据库
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"upd_profile",
            type:"post",
            datatype:"json"
        });
        $.ajax({

            data:{
                user_name:nickname,
                job:job,
                sex:sex,
                aboutme:aboutme,
                sheng:sheng,
                cheng:cheng,
                qu:qu
            },success:function(data){
                var obj=eval('('+data+')')
               if(obj['msg'] == "ok"){
                    alert("保存成功");
                   location.reload()
               }else{
                   alert(obj['translation'])
               }
            }
        })

    })
})