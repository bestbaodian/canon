<html>
<head>
    <meta charset="utf-8">
    <title>
        公司试题
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta property="qc:admins" content="77103107776157736375" />
    <meta property="wb:webmaster" content="c4f857219bfae3cb" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta http-equiv="Cache-Control" content="no-transform " />

    <meta name="Keywords" content="" />

    <link rel="stylesheet" href="css/d79d81e9ab144c28aae8b073106e6881.css" type="text/css" />
    <link rel="stylesheet" href="css/nowcoder-ui.css">
</head>
@extends('layouts.master')
@section('sidebar')
@parent

<body>
	   <div style="width:72%; height:80%; background:#fff; border:1px solid #ccc; margin-left:15%; margin-top:10px; margin-bottom:5px;">




		<div style="width:975px; height:465px; margin-top:20px;">
           <span><?php echo $arr['g_name'] ?></span>
            <div>
                <img src="<?php echo $arr['g_dir'] ?>" width="350px" height="450px"/>
            </div>
       </div>
		</div>
	   </div>

	   <script src="js/jquery-1.8.3.min.js"></script>
	   <script>
	   $(function(){
	   	$("#sel_hide").hide();
	   })
	   $(document).on("click","#img",function(){
	   	$("#sel_hide").show();
	   })
	   </script>
</body>
    @endsection
</html>
