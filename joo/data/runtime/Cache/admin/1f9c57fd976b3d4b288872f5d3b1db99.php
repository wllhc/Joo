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
<!--广告位列表-->
<div class="pad_lr_10">
    <div class="J_tablelist table_list" data-acturi="<?php echo U('adboard/ajax_edit');?>">
      <table width="100%" cellspacing="0">
        <thead>
			<tr>
				<th width="25"><input type="checkbox" class="J_checkall"></th>
				<th><span tdtype="order_by" fieldname="id">ID</span></th>
				<th><span tdtype="order_by" fieldname="name"><?php echo L('adboard_name');?></span></th>
				<th><span tdtype="order_by" fieldname="type"><?php echo L('adboard_type');?></span></th>
				<th><?php echo L('adboard_size');?></th>
				<th><?php echo L('adboard_desc');?></th>
                <th width="40"><span data-tdtype="order_by" data-field="status"><?php echo L('status');?></span></th>
                <th><?php echo L('operations_manage');?></th>
			</tr>
        </thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
				<td align="center"><input type="checkbox" name="checkall" class="J_checkitem" value="<?php echo ($val["id"]); ?>"></td>
				<td align="center"><?php echo ($val["id"]); ?></td>
				<td><span data-tdtype="edit" data-field="name" data-id="<?php echo ($val["id"]); ?>" class="tdedit"><?php echo ($val["name"]); ?></span></td>
                <td align="center"><?php echo ($tpl_list[$val['tpl']]['name']); ?></td>
				<td align="center"><span data-tdtype="edit" data-field="width" data-id="<?php echo ($val["id"]); ?>" class="tdedit"><?php echo ($val["width"]); ?></span>*<span data-tdtype="edit" data-field="height" data-id="<?php echo ($val["id"]); ?>" class="tdedit"><?php echo ($val["height"]); ?></span></td>
				<td><span data-tdtype="edit" data-field="description" data-id="<?php echo ($val["id"]); ?>" class="tdedit"><?php echo ($val["description"]); ?></span></td>
                <td align="center"><img data-tdtype="toggle" data-id="<?php echo ($val["id"]); ?>" data-field="status" data-value="<?php echo ($val["status"]); ?>" src="__STATIC__/images/admin/toggle_<?php if($val["status"] == 0): ?>disabled<?php else: ?>enabled<?php endif; ?>.gif" /></td>
                <td align="center">
                	<a href="javascript:void(0);" class="J_showdialog" data-uri="<?php echo U('adboard/edit', array('id'=>$val['id']));?>" dtitle="<?php echo L('edit');?> - <?php echo ($val["name"]); ?>" data-id="edit" data-width="500" data-height="280"><?php echo L('edit');?></a> | 
                    <a href="javascript:void(0);" class="J_confirmurl" data-acttype="ajax" data-uri="<?php echo u('adboard/delete', array('id'=>$val['id']));?>" data-msg="<?php echo sprintf(L('confirm_delete_one'), $val['name']);?>"><?php echo L('delete');?></a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
		</table>
        <div class="btn_wrap_fixed">
			<label class="select_all"><input type="checkbox" name="checkall" class="J_checkall"><?php echo L('select_all');?>/<?php echo L('cancel');?></label>
            <input type="button" class="btn" data-tdtype="batch_action" data-acttype="ajax" data-uri="<?php echo U('adboard/delete');?>" data-name="id" data-msg="<?php echo L('confirm_delete');?>" value="<?php echo L('delete');?>" />
			<div id="pages"><?php echo ($page); ?></div>
		</div>
	</div>
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