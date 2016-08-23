<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',"IndexController@index");
Route::get('index',"IndexController@index");
Route::get('main',"IndexController@layouts");

Route::get('login', 'LoginController@login');
Route::get('out', 'LoginController@out');
Route::post('name', 'LoginController@name');
Route::post('email', 'LoginController@email');
Route::post('name_pwd','LoginController@name_pwd');
Route::post('email_pwd','LoginController@email_pwd');
Route::post('name_deng', 'LoginController@name_deng');
Route::post('email_deng','LoginController@email_deng');
//第三方登陆--qq登陆
Route::get('qq_login', 'LoginController@qq_login');
Route::get('Ic',"IcController@Ic");
//个人中心
Route::get('user/setprofile', 'UserController@setprofile');
Route::get('user/setavator', 'UserController@setavator');
Route::get('user/setphone', 'UserController@setphone');
Route::get('user/setverifyemail', 'UserController@setverifyemail');
Route::get('user/setresetpwd', 'UserController@setresetpwd');
Route::get('user/setbindsns', 'UserController@setbindsns');


//头像上传
Route::post('postpic', 'UserController@postpic');

//修改用户个人中心
Route::get('user/getprovince', 'UserController@getprovince');

//修改个人资料
Route::post('user/upd_profile', 'UserController@updprofile');

//修改密码
Route::post('user/upd_pwd', 'UserController@updpwd');
Route::post('user/check_pwd', 'UserController@checkpwd');
//个人中心
Route::get('sms/messages', 'SmsController@messages');
Route::get('sms/messagesone', 'SmsController@messagesone');
Route::get('sms/messagestwo', 'SmsController@messagestwo');
Route::get('sms/notices', 'SmsController@notices');
Route::get('friend/friendlist', 'FriendController@friendlist');
//用户签到
Route::get("qiandao","UserController@qiandao");
/*
 * 用户收藏
 */
//我的收藏
Route::get('user/my_house', 'UserController@my_house');
//我的收藏->收藏的文章
Route::get('user/my_house_article', 'UserController@my_house_article');
//我的评价
Route::get('user/my_ping', 'UserController@my_ping');

//加载手机验证页面
Route::get('user/setphonestep', 'UserController@setphonestep');
//手机号绑定
Route::get('user/bang', 'UserController@bang');
//手机号绑定验证码验证
Route::post('user/yanzheng', 'UserController@yanzheng');

//显示验证邮箱页面
Route::get('user/setbindemail','UserController@bangemail');

//发送邮箱方法
Route::post('user/send_email','UserController@send_email');
//验证* 验证码是否正确
Route::post('user/check_code','UserController@check_code');
//提交验证
Route::post('user/sub_code','UserController@sub_code');
/*
 * 方法模块
 * */
//给评论点赞路由
Route::post('zanping','ArticleController@zp');
//文章瀑布流
Route::post('a_ping', 'ArticleController@a_ping');
//文章收藏
Route::post('collect', 'ArticleController@collect_article');
/*
 * 猿问开始
 */
//猿问首页
Route::get('wenda', 'WendaController@wenda');
//我要提问
Route::get('save', 'WendaController@save');
//提交提问
Route::post('tiwen', 'WendaController@tiwen');
//点击标题后进入的详情页面
Route::get('detail', 'WendaController@detail');
//提问之后进行显示出来
Route::get('guanzhu', 'WendaController@guanzhu');
//显示出关注的那些类型
Route::get('follow', 'WendaController@follow');

Route::post('hui', 'WendaController@hui');
//点赞
Route::get('zid', 'WendaController@zid');

Route::get("agree","WendaController@agree");

//答题 最新问题
Route::get('bestnew', 'WendaController@bestnew');

//答题 等待回答
Route::get('waitreply', 'WendaController@waitreply');


/*
 * 猿问结束
 */

/*
 * 试题开始
 */
//试题首页
Route::get('shiti', 'CourseController@course');
//试题搜索
Route::post('sou', 'CourseController@sou');
Route::get('s', 'CourseController@s');
Route::post('zhuanye', 'CourseController@zhuanye');
Route::get('xiang', 'CourseController@xiang');
Route::post('contents', 'CourseController@contents');
Route::get('ping', 'CourseController@ping');
Route::post('state', 'CourseController@state');

Route::post('pinglun_shiti','CourseController@pinglun_shiti');//试题评论
/*
 * 试题结束
 */

//文章
Route::get('article', 'ArticleController@article');
Route::get('publish', 'ArticleController@publish');
Route::post('add', 'ArticleController@add');
Route::any('zan', 'ArticleController@zan');
Route::post('type', 'ArticleController@type');
Route::get('fangfa', 'ArticleController@wxiang');
Route::post('wping', 'ArticleController@wping');
Route::post('types', 'ArticleController@types');
//招聘
Route::get('program', 'ProgramController@program');
Route::get('etc', 'ProgramController@etc');
Route::get('noetc', 'ProgramController@noetc');
Route::get('all', 'ProgramController@all');
Route::get('etc_sel', 'ProgramController@etc_sel');//查看详情
Route::get('position', 'ProgramController@position');
//注册
//Route::post('register', 'CommonController@register');
Route::post('reg','LoginController@reg');
Route::get('register','LoginController@register');
//登陆
Route::post('login', 'CommonController@login');
//公司试题
Route::get('company', 'CompanyController@index');
Route::get('college','CompanyController@college');
Route::get('college_x','CompanyController@college_x');
Route::get('college_exam','CompanyController@college_exam');
