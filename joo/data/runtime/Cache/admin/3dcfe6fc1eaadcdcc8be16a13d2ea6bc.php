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
<!--数据库备份-->
<div class="subnav">
    <h1 class="title_2 line_x"><?php echo L('database_backup');?></h1>
</div>
<div class="pad_lr_10">
    <div class="J_tablelist table_list">
        <form action="<?php echo U('backup/index');?>" method="post">
        <table width="100%" cellspacing="0">
        	<thead>
          	<tr>
            	<th colspan="2"><?php echo L('backup_setting');?></th>
          	</tr>
        	</thead>
            <tr>
        	    <td width="150" align="right"><?php echo L('sizelimit');?> :</td>
        	    <td>
                    <input type="text" name="sizelimit" class="input-text" value="<?php echo ($sizelimit); ?>" size="10"> K
                    &nbsp;&nbsp;(推荐10M以下)
                </td>
          	</tr>
            <tr>
        	    <td align="right"><?php echo L('backup_name');?> :</td>
        	    <td><input type="text" name="backup_name" class="input-text" value="<?php echo ($backup_name); ?>"></td>
          	</tr>
            <tr>
        	    <td align="right"><?php echo L('backup_type');?> :</td>
        	    <td>
                	<label><input type="radio" checked="checked" value="full" name="backup_type" onclick="javascript:$('#J_showtables').hide();"> <?php echo L('full_backup');?><font class="gray"><?php echo L('full_backup_desc');?></font> &nbsp;&nbsp;</label>
                    <label><input type="radio" value="custom" name="backup_type" onclick="javascript:$('#J_showtables').show();"> <?php echo L('custom_backup');?><font class="gray"><?php echo L('custom_backup_desc');?></font></label>
                </td>
          	</tr>
            <tr id="J_showtables" class="hidden">
                <td align="right">
                    <label><input name="selectall" type="checkbox" checked="checked" value="" onclick="javascript:$('.J_checkitem').attr('checked', this.checked);" /> <?php echo L('select_all');?> :</label>
                </td>
                <td colspan="2">
                    <?php if(is_array($tables)): $i = 0; $__LIST__ = $tables;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><label class="fl" style="width:200px;"><input name="backup_tables[<?php echo ($val); ?>]" type="checkbox" value="-1" checked="checked" class="J_checkitem" />&nbsp;&nbsp;<?php echo ($val); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
                </td>
            </tr>
          	<tr>
        	    <td></td>
        	    <td><input type="submit" name="dosubmit" value=" <?php echo L('backup_starting');?> " class="btn btn_submit"></td>
          	</tr>
        </table>
        </form>
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