;/*!/common/widgets/header_c/modules/emailvalid/main.js*/
define("common/widgets/header_c/modules/emailvalid/main",["require","exports","module","dep/jquery-colorbox/jquery.colorbox"],function(require){function c(c){return c.getFullYear().toString()+c.getMonth().toString()+c.getDate().toString()}require("dep/jquery-colorbox/jquery.colorbox"),$("#resend").size()>0&&$("#resend").click(function(){$.ajax({type:"POST",url:GLOBAL_DOMAIN.ctx+"/user/resendActivatedMail"}).done(function(c){c.success?$.colorbox({inline:!0,href:"#resend_success",title:"验证邮件发送成功"}):alert(c.msg)})}),$("#notActive").click(function(){$("#remindActive").hide();var a=new Date;localStorage.setItem("timeStr",c(a))});var a=new Date,g=c(a);localStorage.getItem("timeStr")!==g&&(localStorage.removeItem("timeStr"),$("#remindActive").show()),$(".verify").click(function(){location.href=$(this).attr("data-url")})});
;/*!/common/widgets/header_c/layout/main.js*/
define("common/widgets/header_c/layout/main",["require","exports","module"],function(){});
;/*!/common/widgets/footer_c/modules/feedback/feedback.js*/
define("common/widgets/footer_c/modules/feedback/feedback",["require","exports","module","dep/jquery.cookie/jquery.cookie","common/widgets/common/userinfo"],function(require){require("dep/jquery.cookie/jquery.cookie");var a=$("#feedback-con"),c=$(".pfb-close"),h=$("#feedback-icon"),b=$("#product-fb"),k=$(".ensure"),v=($("#feedback-icon .error"),$("#pfbInputTip")),g={email:"",id:"",usertoken:$.cookie("user_trace_token")||"",hide:function(a){a.fadeOut()},show:function(a){a.fadeIn()},setCountdown:function(a,c){var h=this,b=setTimeout(function(){0==a&&(clearTimeout(b),c.addClass("dn")),h.setCountdown(a-1,c)},1e3)},submit:function(c){var h=this,b=$.trim(c.find("textarea").val()),k=b.length,v=$.trim(c.find("input").val()),C=document.URL,w=/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/,T=!1,y=$("#feedback-con .error"),j=v.length,i=y.find("i"),I=!0;(""==b||k>200)&&(y.removeClass("dn").find("span").text("你还没填任何反馈呢"),i.addClass("txt"),h.setCountdown(3,y),I=!1),""!=v&&(T=w.test(v)),T||""==v||(y.removeClass("dn").find("span").text("请输入有效的邮箱地址"),i.hasClass("txt")&&i.removeClass("txt"),h.setCountdown(3,y),I=!1),T&&j>100&&(y.removeClass("dn").find("span").text("请输入100字以内的邮箱地址"),i.hasClass("txt")&&i.removeClass("txt"),h.setCountdown(3,y),I=!1),I&&$.ajax({url:"http://service.lagou.com/feedback",type:"POST",data:{userId:g.usertoken,content:b,loginEmail:g.email,realUserId:g.id,feedbackEmail:v,feedbackPage:C},dataType:"jsonp",jsonp:"callback"}).done(function(c){c.success?(g.hide(a),$("#product-fk .fk-suc").removeClass("dn"),h.setCountdown(3,$("#product-fk .fk-suc"))):alert(c.msg)})},check:function(){b.find("input").val("").end().find("textarea").val(""),v.text("0/200"),k.removeClass("ensure-green"),$.ajax({url:"http://service.lagou.com/feedback/check",type:"POST",data:{loginEmail:g.email,userId:g.usertoken},dataType:"jsonp",jsonp:"callback"}).done(function(c){var h=$("#feedback-icon .fk-limit");c.success?g.show(a):(h.removeClass("dn"),g.setCountdown(3,h))})}},C=require("common/widgets/common/userinfo").getUserinfo;h.click(function(){C(function(a){a&&(g.email=a.email||"",g.id=a.id||""),g.check()})}),c.click(function(){g.hide(a)}),k.click(function(){g.submit(b)});var w=$("#popOnlineService");w.on("click",function(){g.hide(a)});var T=function(a){var c=$(".pfb-pho"),h=$("#product-fb textarea");switch(a){case 0:c.attr("class","pfb-pho cust0"),h.attr("placeholder","我是拉勾的产品经理CC，把你遇到的问题，或是想要的功能告诉我吧（200字以内）");break;case 1:c.attr("class","pfb-pho cust1"),h.attr("placeholder","我是拉勾的产品经理Luke，把你遇到的问题，或是想要的功能告诉我吧（200字以内）");break;case 2:c.attr("class","pfb-pho cust2"),h.attr("placeholder","我是拉勾的产品经理Mika，把你遇到的问题，或是想要的功能告诉我吧（200字以内）");break;case 3:c.attr("class","pfb-pho cust3"),h.attr("placeholder","我是拉勾的产品经理Philip，把你遇到的问题，或是想要的功能告诉我吧（200字以内）");break;case 4:c.attr("class","pfb-pho cust4"),h.attr("placeholder","我是拉勾的产品经理Roc，把你遇到的问题，或是想要的功能告诉我吧（200字以内）");break;case 5:c.attr("class","pfb-pho cust5"),h.attr("placeholder","我是拉勾的产品经理Shae，把你遇到的问题，或是想要的功能告诉我吧（200字以内）");break;case 6:c.attr("class","pfb-pho cust6"),h.attr("placeholder","我是拉勾的产品经理Tess，把你遇到的问题，或是想要的功能告诉我吧（200字以内）");break;default:c.attr("class","pfb-pho cust0"),h.attr("placeholder","我是拉勾的产品经理CC，把你遇到的问题，或是想要的功能告诉我吧（200字以内）")}},y=function(a,c){var h=new Date(a),b=(new Date).getTime(),k=(b-h)/864e5,v=Math.ceil(k/7),g=v%c;T(g)};y("2016-07-04 00:00:00",7),String.prototype.realLength=function(){return this.replace(/[^\x00-\xff]/g,"**").length},String.prototype.realSubstring=function(n){if(this.realLength()<=n)return this;for(var m=Math.floor(n/2),i=m;i<this.length;i++)if(this.substr(0,i).realLength()>=n)return this.substr(0,i);return this},$("#pfbTextarea").on("keyup input paste",function(){var a=$(this),c=a.val().realLength();return c>0?k.addClass("ensure-green"):k.removeClass("ensure-green"),400==c&&/^[a-zA-Z]*/.test(a.val().substr(199,2))&&v.hasClass("red")?(a.val(a.val().realSubstring(399)),!1):c>=399?(a.val(a.val().realSubstring(400)),v.text("200/200").addClass("red"),!1):void v.text(Math.ceil(c/2)+"/200").removeClass("red")});var j=function(a,c,h){var po=parseInt(a.css("padding-top"))+parseInt(a.css("padding-bottom")),b=parseInt(a.css("line-height")),k=b*c;a.height(k);var v=a[0].scrollHeight;v-po>=b*h&&(v=k+b*(h-c)+po),a.height(v-po)},I=function(a,c,h,b){a.bind("input propertychange",function(e){j($(this),c,h),b&&b(e)}),j(a,c,h)};I($("#pfbTextarea"),4,10),$("#pfbTextarea").on("focus",function(){$("#pfbInputTip").addClass("focus")}),$("#pfbTextarea").on("blur",function(){$("#pfbInputTip").removeClass("focus")})});
;/*!/common/widgets/footer_c/layout/main.js*/
define("common/widgets/footer_c/layout/main",["require","exports","module"],function(){function c(){$("#backtop").css("background-position-x","-28px"),$("html, body").animate({scrollTop:0},1e3,function(){$("#backtop").css("background-position-x","0")})}function a(c){$(window).height()-c>$(document.body).height()?$("#footer").addClass("footer_fix"):$("#footer").removeClass("footer_fix")}$(".footer_app, .footer_qr").hover(function(){$("img",this).stop().fadeIn(200)},function(){$("img",this).stop().fadeOut(200)}),$(window).scroll(function(){(document.documentElement.scrollTop||document.body.scrollTop)>0?$("#backtop").show():$("#backtop").hide()}),$("#backtop").click(function(){c()}),a(0),$(window).resize(function(){a($("#footer").hasClass("footer_fix")?68:0)}),$(document).ready(function(){$("img[data-delay-src]").each(function(){var c=$(this),a=(c.attr("data-delay-src")||"").replace(/https?\:/i,document.location.protocol);c.attr("src",a.replace("www.lagou.com",window.GLOBAL_CDN_DOMAIN))})})});