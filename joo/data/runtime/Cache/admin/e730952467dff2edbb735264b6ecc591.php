<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="__STATIC__/css/admin/style.css" rel="stylesheet"/>
	<title><?php echo L('website_manage');?></title>
	<script>
	var URL = '__URL__';
	var SELF = '__SELF__';
	var ROOT_PATH = '__ROOT__';
	var APP	 =	 '__APP__';
	//语言项目
	var lang = new Object();
	<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
	</script>
</head>

<body>
<div id="J_ajax_loading" class="ajax_loading"><?php echo L('ajax_loading');?></div>
<?php if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav">
    <div class="content_menu ib_a blue line_x">
    	<?php if(!empty($big_menu)): ?><a class="add fb J_showdialog" href="javascript:void(0);" data-uri="<?php echo ($big_menu["iframe"]); ?>" data-title="<?php echo ($big_menu["title"]); ?>" data-id="<?php echo ($big_menu["id"]); ?>" data-width="<?php echo ($big_menu["width"]); ?>" data-height="<?php echo ($big_menu["height"]); ?>"><em><?php echo ($big_menu["title"]); ?></em></a>　<?php endif; ?>
        <?php if(!empty($sub_menu)): if(is_array($sub_menu)): $key = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key; if($key != 1): ?><span>|</span><?php endif; ?>
        <a href="<?php echo U($val['module_name'].'/'.$val['action_name'],array('menuid'=>$menuid)); echo ($val["data"]); ?>" class="<?php echo ($val["class"]); ?>"><em><?php echo L($val['name']);?></em></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
</div><?php endif; ?>
<!--模板中心-->
<div class="subnav">
    <h1 class="title_2 line_x">模板中心</h1>
</div>

<div class="pad_lr_10">
    <form action="" method="get">
    <?php if(is_array($template_list)): $i = 0; $__LIST__ = $template_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="table_block">
        <div class="pad_10">
        <table>
            <tr>
              <td><img src="<?php echo ($val["preview"]); ?>" width="120" height="160" style="border:1px #E4E4E4 solid;" /></td>
              <td valign="top">
                    <table>
                        <tr>
                            <th align="right"><input type="radio" name="dirname" value="<?php echo ($val["dirname"]); ?>" <?php if($def_tpl == $val['dirname']): ?>checked="checked"<?php endif; ?> /></th>
                            <td width="160"><?php if($def_tpl == $val['dirname']): ?><span class="red">默认</span><?php else: ?><a href="<?php echo U('template/index',array('dirname'=>$val['dirname']));?>" class="blue">设为默认</a><?php endif; ?></td>
                        </tr>
                        <tr><th align="right">模板文件夹：</th><td><?php echo ($val["dirname"]); ?></td></tr>
                        <tr><th align="right">模板名称：</th><td><?php echo ($val["name"]); ?></td></tr>
                        <tr><th align="right">模板作者：</th><td><?php echo ($val["author"]); ?></td></tr>
                        <tr><th align="right">版本：</th><td><?php echo ($val["version"]); ?></td></tr>
                    </table>
              </td>
            </tr>
        </table>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <input type="hidden" name="g" value="admin" />
    <input type="hidden" name="m" value="template" />
    </form>
</div>

<script src="__STATIC__/js/jquery/jquery.js"></script>
<script src="__STATIC__/js/jquery/plugins/jquery.tools.min.js"></script>
<script src="__STATIC__/js/jquery/plugins/formvalidator.js"></script>
<script src="__STATIC__/js/pinphp.js"></script>
<script src="__STATIC__/js/admin.js"></script>
<script>
//初始化弹窗
(function (d) {
    d['okValue'] = lang.dialog_ok;
    d['cancelValue'] = lang.dialog_cancel;
    d['title'] = lang.dialog_title;
})($.dialog.defaults);
</script>

<?php if(isset($list_table)): ?><script src="__STATIC__/js/jquery/plugins/listTable.js"></script>
<script>
$(function(){
	$('.J_tablelist').listTable();
});
</script><?php endif; ?>
</body>
</html>