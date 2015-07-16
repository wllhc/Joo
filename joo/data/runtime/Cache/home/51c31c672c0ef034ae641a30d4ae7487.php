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

    <link rel="stylesheet" type="text/css" href="__STATIC__/css/default/space.css" />
</head>

<body>
    <div class="wrap">
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

        
        <div class="content">
            <div class="picture">
                <h1 class="picturetitle clearfix"><?php echo ($item["title"]); ?></h1>
                <div class="clearfix">
                    <div class="picture_side">
                        <div class="thepicture">
                            <img alt="<?php echo ($item["title"]); ?>" class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($img_list[0]['url'], '_b'), 'item'));?>" jqimg="<?php echo attach($img_list[0]['url'], 'item');?>">
                            <!--volist name="img_list" id="img">
                            <li data-url="<?php echo attach(get_thumb($img['url'], '_b'), 'item');?>" <?php if($i == 1): ?>class="active"<?php endif; ?>><img alt="<?php echo ($item["title"]); ?>" class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($img['url'], '_s'), 'item'));?>"></li>
                            </volist-->
                        </div>
                        <div class="buy_share clearfix">
                            <div class="btnleft">
                                <a href="<?php echo U('Pay/pay', array('item'=>$item['id']));?>" class="btn_blue buybtn">购买</a>
                                <a href="<?php echo U('Pay/pay', array('item'=>$item['id']));?>" class="btn_blue downbtn">下载</a>
                            </div>
                            <div class="shareright"></div>
                        </div>
                        <div class="picture_comments">
                            <div class="comment clearfix">
                                <div class="comment_avatar">
                                    <a href="<?php echo U('space/index', array('uid'=>$item['uid']));?>" target="_blank"><img alt="<?php echo ($item["uname"]); ?>" class="J_card fl r3" src="<?php echo avatar($item['uid'], 48);?>" data-uid="<?php echo ($item["uid"]); ?>" width="50" height="50" /></a>
                                </div>
                                <div class="comment_say">
                                    <textarea id="J_cmt_content" name="content" class="pub_content" placeholder="<?php echo L('item_cmt_def');?>"></textarea>
                                    <div class="comment_go clearfix">
                                        <a href="javascript:;" id="J_cmt_submit" class="btn_blue gobtn submit r3 fr">发表评论</a>
                                    </div>
                                </div>                            
                            </div>
                            <div class="comment_showbox">
                                <?php if(is_array($cmt_list)): $i = 0; $__LIST__ = $cmt_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="comment_show clearfix">
                                    <div class="comment_avatar">
                                        <a href="<?php echo U('space/index', array('uid'=>$val['uid']));?>" target="_blank"><img src="<?php echo avatar($val['uid'], 48);?>" class="J_card avt" data-uid="<?php echo ($val["uid"]); ?>" /></a>
                                    </div>
                                    <div class="comment_body">
                                        <div class="comment_attrib">
                                            <a href="<?php echo U('space/index', array('uid'=>$val['uid']));?>" class="J_card n" data-uid="<?php echo ($val["uid"]); ?>" target="_blank"><?php echo ($val["uname"]); ?></a>
                                            <span><?php echo (fdate($val["add_time"])); ?></span>
                                        </div>
                                        <div class="comment_text"><?php echo ($val["info"]); ?></div>
                                    </div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="comment_show clearfix">
                                    <div class="comment_avatar">
                                        <a href="#"><img src="temp/avatar.jpg" /></a>
                                    </div>
                                    <div class="comment_body">
                                        <div class="comment_attrib"><a href="#">李鹏飞</a><span>3天前</span></div>
                                        <div class="comment_text">
                                            发表评论的那啥
                                        </div>
                                    </div>
                                </div>
                                <div id="J_cmt_page" class="page_bar"><?php echo ($page_bar); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="info_side">
                        <div class="rightcard clearfix">
                            <div class="avatar">
                                <a href="<?php echo U('space/index', array('uid'=>$item['uid']));?>" target="_blank"><img alt="<?php echo ($item["uname"]); ?>" class="J_card fl r3" src="<?php echo avatar($item['uid'], 48);?>" data-uid="<?php echo ($item["uid"]); ?>" width="100" height="100" /></a>
                            </div>
                            <div class="card_user">
                                <a href="<?php echo U('space/index', array('uid'=>$item['uid']));?>" class="J_card n uname" data-uid="<?php echo ($item["uid"]); ?>" target="_blank"><?php echo ($item["uname"]); ?></a><br>
                                <a href="#" class="btn_blue followbtn">关 注</a>
                            </div>
                        </div>

                        <div class="rightcard cardnum clearfix">
                            <h1>98.5</h1>
                            <ul>
                                <li class="views"><strong>1100</strong><span>浏览</span></li>
                                <li class="votes"><strong>1550</strong><span>投票</span></li>
                                <li class="fav"><strong><?php echo ($item["likes"]); ?></strong><span>喜欢</span></li>
                            </ul>
                            <div class="clear"></div>
                            <div class="historical clearfix">
                                <h2>99.8</h2>
                                <div class="highnum">
                                    最高脉冲<br /><strong>2012 02 05</strong>
                                </div>
                            </div>
                            <div class="divider"> </div>
                        </div>

                        <div class="rightcard clearfix">
                            <a href="#" class="button like"><span></span>赞一个</a>
                            <a href="#" class="button liked" style="display:none"><span></span>已赞过</a>
                            <a href="#" class="button ifav" style="display:none"><span></span>收藏</a>
                            <a href="javascript:;" class="J_likeitem like_btn button ifaved" data-id="<?php echo ($item["id"]); ?>"><span></span>已收藏</a>
                        </div>

                        <!--该用户更多照片-->
                        <div class="more_picture">
                            <div class="more_picture_box" id="more_picture_box">
                                <a href="javascript:" onClick="gItem.slide('more_picture', 'left', 50);" class="set_pre" title="上一页"><span></span></a>	
                                <table class="morep_tab" id="more_picture" style="left:0px;">
                                    <tr>
                                        <?php if(!empty($maylike_list)): if(is_array($maylike_list)): $i = 0; $__LIST__ = $maylike_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mval): $mod = ($i % 2 );++$i; if(is_array($mval['list'])): $i = 0; $__LIST__ = $mval['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mitem): $mod = ($i % 2 );++$i;?><td><a href="<?php echo U('item/index', array('id'=>$mitem['id']));?>"><img class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($mitem['img'], '_m'), 'item'));?>" alt="<?php echo ($mitem["title"]); ?>"></a></td><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>

                                        
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                    </tr>
                                </table>
                                <a href="javascript:" onClick="gItem.slide('more_picture', 'right', 50)" class="set_next" title="下一页"><span></span></a>
                            </div>                        
                        </div>

                        <!--猜你喜欢-->
                        <div class="more_picture">
                            <div class="more_picture_box">
                                <a href="#" class="set_pre" title="上一页"><span></span></a>	
                                <table class="morep_tab" style="left:px;">
                                    <tr>
                                        <?php if(!empty($maylike_list)): if(is_array($maylike_list)): $i = 0; $__LIST__ = $maylike_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mval): $mod = ($i % 2 );++$i; if(is_array($mval['list'])): $i = 0; $__LIST__ = $mval['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mitem): $mod = ($i % 2 );++$i;?><td><a href="<?php echo U('item/index', array('id'=>$mitem['id']));?>"><img class="J_decode_img" data-uri="<?php echo base64_encode(attach(get_thumb($mitem['img'], '_m'), 'item'));?>" alt="<?php echo ($mitem["title"]); ?>"></a></td><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>

                                        
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                        <td><a href="#"><img src="temp/avatar.jpg" /></a></td>
                                    </tr>
                                </table>
                                <a href="#" class="set_next" title="下一页"><span></span></a>
                            </div>                        
                        </div>

                        <div class="rightcard clearfix">
                            <?php if(!empty($item['tag_list'])): ?><div class="tags clearfix">
                                    <?php if(is_array($item['tag_list'])): $i = 0; $__LIST__ = $item['tag_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="<?php echo U('book/index', array('tag'=>urlencode($tag)));?>" target="_blank"><?php echo ($tag); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div><?php endif; ?>
                            <div class="pictureinfo">
                                <table class="pinfo">
                                    <tr>
                                        <th class="pcam">相机</th>
                                        <td>NIKON D7000</td>
                                    </tr>
                                    <tr>
                                        <th class="pcl">镜头</th>
                                        <td>17-40</td>
                                    </tr>
                                    <tr>   
                                        <th class="pfl">焦距</th>
                                        <td>11mm</td>
                                    </tr>
                                    <tr> 
                                        <th class="pss">快门</th>
                                        <td>10 sec</td>
                                    </tr>
                                    <tr>
                                        <th class="pape">光圈</th>
                                        <td>f/2.18</td>
                                    </tr>
                                    <tr> 
                                        <th class="piso">ISO</th>
                                        <td>6400</td>
                                    </tr>
                                    <tr> 
                                        <th class="ptime">时间</th>
                                        <td>2012 02 02</td>
                                    </tr>
                                    <tr> 
                                        <th class="pcopy">版权</th>
                                        <td>李万林</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>
<script src="__STATIC__/js/jquery/plugins/jquery.jqzoom.js"></script>
<script src="__STATIC__/js/jquery/plugins/jquery.jcarousel.js"></script>
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

<script src="__STATIC__/js/comment.js"></script>
<script type="text/javascript">
function objectItem () {
    var __this = this;

    /**
     * 图片滚动器
     *
     * @param {String} obj_id 滚动器容器对象
     * @param {String} to 滚动方向 可选值：left|right
     * @param {Int} num 滚动距离
     */
    this.slide = function (obj_id, to, num) {
        if ("undefined" == typeof num) {
            num = 50;
        }

        var _obj = document.getElementById(obj_id);
        var _width = _obj.offsetWidth - document.getElementById("more_picture_box").offsetWidth;
        var _left = parseInt(_obj.style.left.replace("px", ""));
        if ('right' == to) {
            _obj.style.left = (Math.abs(_left - num) > _width ? parseInt('-' + _width) : (_left - num) ) + "px";
        } else {
            _obj.style.left = ((_left + num) > 0 ? 0 : (_left + num))+ "px";
        }
    }
}
gItem = new objectItem();
</script>

</body>
</html>