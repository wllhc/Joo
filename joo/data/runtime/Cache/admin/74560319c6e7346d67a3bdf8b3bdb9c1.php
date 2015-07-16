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
<!--显示设置-->
<div class="subnav">
    <h1 class="title_2 line_x">显示设置</h1>
</div>
<div class="pad_lr_10">
	<form id="info_form" action="<?php echo u('setting/edit');?>" method="post">
	<table width="100%" class="table_form">
        <tr>
            <th width="150"><?php echo L('default_keyword');?> :</th>
            <td><input type="text" name="setting[default_keyword]" class="input-text" value="<?php echo C('pin_default_keyword');?>" /></td>
        </tr>
        <tr>
            <th><?php echo L('album_default_title');?> :</th>
            <td><input type="text" name="setting[album_default_title]" class="input-text" size="40" value="<?php echo C('pin_album_default_title');?>"></td>
        </tr>
    	<tr>
        	<th><?php echo L('hot_tags');?> :</th>
        	<td><textarea rows="2" cols="80" name="setting[hot_tags]"><?php echo C('pin_hot_tags');?></textarea></td>
    	</tr>
        <tr>
            <th>首页瀑布流 :</th>
            <td>
                <label><input type="radio" <?php if(C('pin_index_wall') == '1'): ?>checked="checked"<?php endif; ?> value="1" name="setting[index_wall]"> <?php echo L('open');?></label> &nbsp;&nbsp;
                <label><input type="radio" <?php if(C('pin_index_wall') == '0'): ?>checked="checked"<?php endif; ?> value="0" name="setting[index_wall]"> <?php echo L('close');?></label>
            </td>
        </tr>
        <tr>
            <th><?php echo L('wall_distance');?></th>
            <td>
                <input type="text" name="setting[wall_distance]" class="input-text" value="<?php echo C('pin_wall_distance');?>" />
                <span class="gray ml10"><?php echo L('wall_distance_tip');?></span>
            </td>
        </tr>
        <tr>
            <th><?php echo L('wall_spage_max');?> :</th>
            <td>
                <input type="text" name="setting[wall_spage_max]" class="input-text" value="<?php echo C('pin_wall_spage_max');?>" />
                <span class="gray ml10">每页动态加载次数</span>
            </td>
        </tr>
        <tr>
            <th><?php echo L('wall_spage_size');?> :</th>
            <td>
                <input type="text" name="setting[wall_spage_size]" class="input-text" value="<?php echo C('pin_wall_spage_size');?>" />
                <span class="gray ml10">每次加载的商品个数</span>
            </td>
        </tr>
        <tr>
            <th><?php echo L('book_page_max');?> :</th>
            <td>
                <input type="text" name="setting[book_page_max]" class="input-text" value="<?php echo C('pin_book_page_max');?>" />
                <span class="gray ml10">发现页面最多显示页数</span>
            </td>
        </tr>
        <tr>
            <th><?php echo L('item_cover_comments');?> :</th>
            <td><input type="text" name="setting[item_cover_comments]" class="input-text" value="<?php echo C('pin_item_cover_comments');?>" /></td>
        </tr>
        <tr>
            <th><?php echo L('album_cover_items');?> :</th>
            <td><input type="text" name="setting[album_cover_items]" class="input-text" value="<?php echo C('pin_album_cover_items');?>" /></td>
        </tr>
        <tr>
        	<th></th>
        	<td>
                <input type="hidden" name="menuid"  value="<?php echo ($menuid); ?>"/>
                <input type="submit" class="btn btn_submit" value="<?php echo L('submit');?>"/>
            </td>
    	</tr>
	</table>
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