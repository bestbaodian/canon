$(function(){
    //用户个人中心三级联动
    $("#province-select1").change(function(){
        $('#city-select1').text('').append("<option value='0'>选择城市</option>");
        $('#area-select').text('').append("<option value='0'>选择区县 </option>");
        var id=$(this).val();
        if(id!=0){
            $.get('getprovince', 'id=' + id, function (data) {
                var str="";
                var $c = $("#city-select1"),
                    d = data,
                    len = d.length,
                    i = 0;
                //$c.append("<option value='0'>选择区县 </option>");
                for (; i < len; i++) {
                    $c.append("<option value=" + d[i].region_id + " >" + d[i].region_name + " </option>");
                }
            },'json')
        }
    })
    //城市两级联动
    $("#city-select1").change(function(){
        //$('#city-select').text('').append("<option value='0'>选择城市</option>");
        $('#area-select').text('').append("<option value='0'>选择区县 </option>");
        var id=$(this).val();
        if(id!=0){
            $.get('getprovince', 'id=' + id, function (data) {
                var str="";
                var $c = $("#area-select"),
                    d = data,
                    len = d.length,
                    i = 0;
                //$c.append("<option value='0'>选择区县 </option>");
                for (; i < len; i++) {
                    $c.append("<option value=" + d[i].region_id + " >" + d[i].region_name + " </option>");
                }
            },'json')
        }
    })
    //输入密码 失去焦点  判断是否正确
    $("#pwd_blur").blur(function(){
        var oldpwd = $("input[name=oldpwd]").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"check_pwd",
            type:"post",
            datatype:"json"
        });
        $.ajax({
            data:{
                oldpwd:oldpwd
            },success:function(data){
               var obj=eval("("+data+")");
                //alert(obj['error']);
                if(obj['error']==0){
                    $("#ch_pwd").html("<font color='green'>√</font>");
                }else{
                    $("#ch_pwd").html("<font color='red'>×</font>");
                }
            }
        })
    })
    //输入新密码
    $("#newpass").blur(function(){
        var newpass = $("input[name=newpass]").val();
        var oldpwd = $("input[name=oldpwd]").val();
        if(newpass!=""){
            if(newpass!=oldpwd){
                $("#ch_pwd1").html("<font color='green'>√</font>");
            }else{
                alert("新密码不能和原密码相同");
            }
        }else{
            $("#ch_pwd1").html("<font color='red'>×</font>");
        }
    })
    //确认密码
    $("#confirm").blur(function(){
        var newpass = $("input[name=newpass]").val();
        var confirm = $("input[name=confirm]").val();
        if(confirm!=newpass && confirm==""){
            $("#ch_pwd2").html("<font color='red'>×</font>");
        }else{
            $("#ch_pwd2").html("<font color='green'>√</font>");
        }
    })
    //修改密码
    $("#resetpwd-btn-save").click(function(){
        var newpass = $("input[name=newpass]").val();

        var ch_pwd=$("#ch_pwd").html();
        var ch_pwd1=$("#ch_pwd1").html();
        var ch_pwd2=$("#ch_pwd2").html();
        if(ch_pwd=='<font color="green">√</font>' && ch_pwd1=='<font color="green">√</font>' && ch_pwd2=='<font color="green">√</font>'){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"upd_pwd",
                type:"post",
                datatype:"json"
            });
            $.ajax({
                data:{
                    newpass:newpass
                },success:function(data){
                    var obj=eval("("+data+")");
                    if(obj['error']==0){
                        var url=$("input[name=url]").val();
                        alert("修改成功,请重新登陆");
                        location.href=url;
                    }else{
                        alert("修改失败")
                    }
                }
            })
        }

    })

})


