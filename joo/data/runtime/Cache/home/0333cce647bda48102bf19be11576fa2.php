<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
    <meta charset="utf-8" />
<title><?php echo ($page_seo["title"]); ?> - JOO</title>
<meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" />
<meta name="description" content="<?php echo ($page_seo["description"]); ?>" />
<!--css file="__STATIC__/css/default/base.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/default/style.css" />
<css file="__STATIC__/css/default/content.css" /-->
<link rel="stylesheet" type="text/css" href="__STATIC__/css/default/css.css" />
<script src="__STATIC__/js/jquery/jquery.js"></script>
<script src="__STATIC__/js/message.js"></script>

    <!--css file="__STATIC__/css/default/user.css" /-->
</head>
<body>
<!--头部开始-->
<div class="header">
        <div class="header_cont">
            <div class="logo"><a title="<?php echo C('pin_site_name');?>" href="<?php echo U('index/index');?>"></a></div>
            <ul class="nav">
                <?php $tag_nav_class = new navTag;$data = $tag_nav_class->lists(array('type'=>'lists','style'=>'main','cache'=>'0','return'=>'data',)); if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                	<a href="<?php echo ($val["link"]); ?>" <?php if($val["target"] == 1): ?>target="_blank"<?php endif; ?>><?php echo ($val["name"]); ?></a><span></span>
                    <ul class="subnav">
                    	<li><a href="#">推按</a></li>
                        <li><a href="#">热度排行</a></li>
                        <li><a href="#">心情日志</a></li>
                        <li><a href="#">走走</a></li>
                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <pin:nav>
            </ul>
            <ul class="nav rightnav">
                <li>
                    <a href="#" class="topaddbtn">添加</a>
                    <ul class="subnav">
                        <li><a href="<?php echo U('upload/index');?>">新照片</a></li>
                        <li><a href="#">新专辑</a></li>
                        <li><a href="#">新关注</a></li>
                    </ul>
                </li>
                <?php if(!empty($visitor)): ?><li>
                        <a href="<?php echo U('space/index');?>" class="topusrbtn clearfix"><b><img class="mb_avt r3" src="<?php echo avatar($visitor['id'], 24);?>"></b><span><?php echo ($visitor["username"]); ?></span></a>
                        <ul class="subnav rnav">
                            <li><a href="<?php echo U('space/index');?>">照片</a></li>
                            <li><a href="<?php echo U('space/album');?>">专辑</a></li>
                            <li><a href="<?php echo U('space/index');?>">收藏</a></li>
                            <li><a href="<?php echo U('space/index');?>">关注</a></li>
                            <li><a href="<?php echo U('space/index');?>">粉丝</a></li>
                            <li class="navline"></li>
                            <li><a href="#">设置</a></li>
                            <li><a href="<?php echo U('user/logout');?>">退出</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="#" class="topusrbtn clearfix"><b><img src="temp/avatar.jpg" /></b><span>您好,游客</span></a>
                        <ul class="subnav tlogin">
                            <li>
                                <form id="J_login_form" action="<?php echo U('user/login');?>" method="post">
                                <div>
                                    <p><input type="text" name="username" id="J_name" class="ttext"  placeholder="用户名"/></p>
                                    <p><input type="password" name="password" id="J_pass" class="ttext" placeholder="密码" /></p>
                                    <p style="text-align:right"><input type="submit" class="btngreen" value="登录" /></p>
                                    <input type="hidden" name="ret_url" value="<?php echo U('index/index');?>" />
                                </div>
                                </form>
                            </li>
                            <li class="navline"></li>
                            <li class="reg">
                                <p style="text-align:right">还没有JOO账号?<a href="<?php echo U('user/register');?>">创建一个</a></p>
                            </li>
                        </ul>
                    </li>
                    <!--li class="me"><a href="<?php echo U('user/register');?>" class="register_btn"><?php echo L('register_now');?></a></li--><?php endif; ?>
                <!--li><a href="#">摄影师</a></li>
                <li><a href="#">展会</a></li-->
            </ul>
            <div class="tsearch">
            	<input type="text" class="headsearch" />
            </div>
        </div>
    </div>





<!--div class="header_wrap pt10">
    <div id="J_m_head" class="m_head clearfix">
        <div class="head_logo fl"><a href="__ROOT__/" class="logo_b fl" title="<?php echo C('pin_site_name');?>"><?php echo C('pin_site_name');?></a></div>
        <div class="head_user fr">
            <?php if(!empty($visitor)): ?><ul class="head_user_op">
                <li class="mr10"> 
                    <a class="J_shareitem_btn share_btn" href="javascript:;" title="<?php echo L('share');?>"><?php echo L('share');?></a>
                </li>
                <li class="J_down_menu_box mb_info pos_r">
                    <a href="<?php echo U('space/index', array('uid'=>$visitor['id']));?>" class="mb_name">
                        <img class="mb_avt r3" src="<?php echo avatar($visitor['id'], 24);?>">
                        <?php echo ($visitor["username"]); ?>
                    </a>
                    <ul class="J_down_menu s_m pos_a">
                        <li><a href="<?php echo U('space/index');?>"><?php echo L('cover');?></a></li>
                        <li><a href="<?php echo U('user/index');?>"><?php echo L('personal_settings');?></a></li>
                        <li><a href="<?php echo U('user/bind');?>"><?php echo L('user_bind');?></a></li>
                        <li><a href="<?php echo U('user/logout');?>"><?php echo L('logout');?></a></li>
                    </ul>
                </li>
                <li><a class="libg feed" href="<?php echo U('space/me');?>"><?php echo L('feed');?></a></li>
                <li><a class="libg album" href="<?php echo U('space/album');?>"><?php echo L('album');?></a></li>
                <li><a class="libg like" href="<?php echo U('space/like');?>"><?php echo L('like');?></a></li>
                <li class="J_down_menu_box my_shotcuts pos_r">
                    <a class="libg msg" href="javascript:;"><?php echo L('message');?><span id="J_msgtip"></span></a>
                    <ul class="J_down_menu s_m n_m pos_a">
                        <li><a href="<?php echo U('space/atme');?>"><?php echo L('talk');?><span id="J_atme"></span></a></li>
                        <li><a href="<?php echo U('message/index');?>"><?php echo L('my_msg');?><span id="J_msg"></span></a></li>
                        <li><a href="<?php echo U('message/system');?>"><?php echo L('system_msg');?><span id="J_system"></span></a></li>
                        <li><a href="<?php echo U('space/fans');?>"><?php echo L('my_fans');?><span id="J_fans"></span></a></li>
                    </ul>
                </li>
            </ul>
            <?php else: ?>
            <ul class="login_mod">
                <li class="local fl">
                    <a href="<?php echo U('user/register');?>"><?php echo L('register');?></a>
                    <a href="<?php echo U('user/login');?>"><?php echo L('login');?></a>
                </li>
                <li class="other_login fl">
                    <?php if(is_array($oauth_list)): $i = 0; $__LIST__ = $oauth_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('oauth/index', array('mod'=>$val['code']));?>" class="login_bg weibo_login"><img src="__STATIC__/images/oauth/<?php echo ($val["code"]); ?>/icon.png" /><?php echo ($val["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
            </ul><?php endif; ?>
        </div>
    </div>
    <div id="J_m_nav" class="clearfix">
        <ul class="nav_list fl">
            <li <?php if($nav_curr == 'index'): ?>class="current"<?php endif; ?>><a href="__ROOT__/"><?php echo L('index_page');?></a></li>

            <pin:nav type="lists" style="main">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="split <?php if($nav_curr == $val['alias']): ?>current<?php endif; ?>"><a href="<?php echo ($val["link"]); ?>" <?php if($val["target"] == 1): ?>target="_blank"<?php endif; ?>><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li class="top_search">
                <form action="<?php echo U('book/search');?>" method="get" target="_blank">
                <input type="hidden" name="m" value="search">
                <input type="text" autocomplete="off" def-val="<?php echo C('pin_default_keyword');?>" value="<?php echo C('pin_default_keyword');?>" class="ts_txt fl" name="q">
                <input type="submit" class="ts_btn" value="<?php echo L('search');?>">
                </form>
            </li>
        </ul>
    </div>
</div-->

<!--设置头像的弹窗-->
<div class="lightbox" style="display:none;">
    <div class="lbbox" style="width:500px;">
        <b class="closelightbox"></b>
        <h2>上传您的头像</h2>
        <div class="upavatar clearfix" id="altContent"></div>

        <script type="text/javascript"
        src="http://images1.jyimg.com/w4/register/j/swfobject.js"></script>
        <script type="text/javascript">

            function uploadevent(status){
                status += '';
                switch(status){

                    case '1':
                        alert('修改成功！!');
                        var time = new Date().getTime();
                        //document.getElementById('avatar_priview').innerHTML = "<img src='__APP__/Avatar/user_avatar/uid/{{$_SESSION['uid']}}/'/>";
                        // $('.i_avatar').attr('src', "__APP__/Avatar/user_avatar/uid/{{$_SESSION['uid']}}/");
                        $.ajax({
                            url: "__APP__/Avatar/user_avatar/uid/{{$_SESSION['uid']}}/",
                            success: function(){
                                window.location = location;
                                //document.getElementById('avatar_priview').innerHTML = "Avatar Priview: <img src='__APP__/Avatar/user_avatar/uid/{{$_SESSION['uid']}}/'/>";
                            }
                        });
					
                        break;

                    case '2':
                        if(confirm('js call upload')){
                            return 1;
                        }else{
                            return 0;
                        }
                        break;

                    case '-1':
                        alert('cancel!');
                        window.location.href = "#";
                        break;
                    case '-2':
                        alert('upload failed!');
                        window.location.href = "#";
                        break;

                    default:
                        alert(typeof(status) + ' ' + status);
                } 
            }

            var flashvars = {
                "jsfunc":"uploadevent",
                "imgUrl":"http://i3.sinaimg.cn/lx/news/p/2009/0717/U2075P8T1D890333F914DT20090717103223.jpg",
                "pid":"75642723",
                "uploadSrc":true,
                "showBrow":true,
                "showCame":true,
                "uploadUrl":"__APP__/Avatar/saveavater/action/uploadavatar",
                "pSize": "300|300|120|120|80|80|45|45"
            };

            var params = {
                menu: "false",
                scale: "noScale",
                allowFullscreen: "true",
                allowScriptAccess: "always",
                wmode:"transparent",
                bgcolor: "#FFFFFF"
            };

            var attributes = {
                id:"FaustCplus"
            };

            swfobject.embedSWF("__STATIC__/FaustCplus/FaustCplus.swf", "altContent", "650", "500", "9.0.0", "expressInstall.swf", flashvars, params, attributes);

        </script>

    </div>
</div>

<div class="content">
    <div class="settings clearfix">
        <div class="set_sidebar">
    <dl>
        <?php if(is_array($user_menu_list)): $i = 0; $__LIST__ = $user_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><dt class="<?php echo ($key); ?>"><a href="#"><?php echo ($menu["text"]); ?></a></dt>
            <?php if(is_array($menu['submenu'])): $i = 0; $__LIST__ = $menu['submenu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$smenu): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo ($smenu["url"]); ?>" <?php if($user_menu_curr == $key): ?>class="c"<?php endif; ?>><?php echo ($smenu["text"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
        <dt><a href="#">认证信息</a></dt>
        <dd></dd>
        <dd></dd>
        <dd></dd>
        <dd></dd>
        <dt><a href="#">账户信息</a></dt>

    </dl>
</div>


        <div class="set_content">
            <div>
                <div class="settitle clearfix"><h3><?php echo L('base_info');?></h3><span></span></div>
                <div class="arrwhite"></div>
                <div class="cardcontent">
                    <div class="myinfo">
                        <div class="myavartar clearfix">
                            <form id="J_basic_form" action="<?php echo U('user/index');?>" method="post">
                            <h3 class="setobj"><span><?php echo L('change_avatar');?></span></h3>
                            <div class="myavatarimg">
                                <img src="<?php echo avatar($info['id'], 100);?>" />
                                <a href="#" class="buttongray"><?php echo L('change_avatar');?></a>
                            </div>
                            <h3 class="setobj"><span>其他信息</span></h3>

                            <div class="setbox mail">
                                <h2><?php echo L('email');?>：</h2>
                                <p><input type="text" name="email" class="setinput" value="<?php echo ($info["email"]); ?>" /></p>
                            </div>
                            <div class="setbox person">
                                <h2><?php echo L('username');?>：</h2>
                                <p><b><?php echo ($info["username"]); ?></b></p>
                            </div>
                            <div class="setbox person">
                                <h2><?php echo L('gender');?>：</h2>
                                <p>
                                    <input name="gender" value="0" type="radio" <?php if($info['gender'] == '0'): ?>checked<?php endif; ?>>&nbsp;<?php echo L('female');?>
                                    <input name="gender" value="1" type="radio" <?php if($info['gender'] == '1'): ?>checked<?php endif; ?>>&nbsp;<?php echo L('male');?>
                                </p>
                            </div>
                            <div class="setbox person clearfix">
                                <h2><?php echo L('birthday');?>：</h2>
                                <div class="posi"><select><option>2009</option></select><span></span></div>
                                <div class="posi"><select><option>08</option></select><span></span></div>
                                <div class="posi"><select><option>29</option></select><span></span></div>
                            </div>
                            <div class="setbox person">
                                <h2><?php echo L('my_intro');?>：</h2>
                                <p><textarea name="intro" rows="10" placeholder="请输入自我介绍" class="gray_text"><?php echo ($info["intro"]); ?></textarea></p>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="btndiv">
                    <a href="#" class="btngreen">保存 修改</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--主部结束-->
<!-- unity footer -->
<div class="clear"></div>
<div id="footercontainer">
	<div id="footer" class="clearfix">
        <div class="fle">&copy;Copyright 2013 <a href="__ROOT__/" class="tdu clr6" target="_blank"><?php echo C('pin_site_name');?></a> (<a href="http://www.miibeian.gov.cn" class="tdu clr6" target="_blank"><?php echo C('pin_site_icp');?></a>)<?php echo C('pin_statistics_code');?>
        </div>
        <ul class="navi">
            <!--导航-->
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($val["link"]); ?>" <?php if($val["target"] == 1): ?>target="_blank"<?php endif; ?>><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--关于-->
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('aboutus/index', array('id'=>$val['id']));?>" target="_blank"><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--友情链接-->
            <li><a href="<?php echo U('aboutus/flink');?>" target="_blank"><?php echo L('flink');?></a></li>
        </ul>
        <div class="clear"></div>
        <!--ul class="navi">
            <?php echo R('advert/index', array(8), 'Widget');?>
        </ul-->
		<div class="clear"></div>
	</div>
</div>
<!-- end unity footer -->
<div id="J_returntop" class="return_top"></div>

<script>
var PINER = {
    root: "__ROOT__",
    uid: "<?php echo $visitor['id'];?>", 
    async_sendmail: "<?php echo $async_sendmail;?>",
    config: {
        wall_distance: "<?php echo C('pin_wall_distance');?>",
        wall_spage_max: "<?php echo C('pin_wall_spage_max');?>"
    },
    //URL
    url: {}
};
//语言项目
var lang = {};
<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
</script>
<?php $tag_load_class = new loadTag;$data = $tag_load_class->js(array('type'=>'js','href'=>'__STATIC__/js/jquery/plugins/jquery.tools.min.js,__STATIC__/js/jquery/plugins/jquery.masonry.js,__STATIC__/js/jquery/plugins/formvalidator.js,__STATIC__/js/fileuploader.js,__STATIC__/js/pinphp.js,__STATIC__/js/front.js,__STATIC__/js/dialog.js,__STATIC__/js/wall.js,__STATIC__/js/item.js,__STATIC__/js/user.js,__STATIC__/js/album.js','cache'=>'0','return'=>'data',));?>

<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script src="__STATIC__/js/calendar/calendar.js"></script>
<script src="__STATIC__/js/setting.js"></script>
<script src="__STATIC__/js/minicity.js"></script>
<script>
    $(function(){
        $.minicity( "#J_province", "#J_city", "<?php echo $info['province'];?>", "<?php echo $info['city'];?>");
    });
</script>
</body>
</html>