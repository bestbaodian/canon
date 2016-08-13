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
})

