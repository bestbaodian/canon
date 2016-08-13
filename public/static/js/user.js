$(function(){
    $("#profile-submit").click(function(){
        var nickname = $("input[name=nickname]").val();
        var job = $("input[name=job]").val();
        var sex = $("input[name=sex]").val();
        var aboutme = $("input[name=aboutme]").val();
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
            type:"post"
        });
        $.ajax({
            data:{
                nickname:nickname,
                job:job,
                sex:sex,
                aboutme:aboutme,
                sheng:sheng,
                cheng:cheng,
                qu:qu
            },success:function(data){
                alert(data);
            }
        })
    })
})

