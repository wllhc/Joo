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
<link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/>
<script type="text/javascript" src="__STATIC__/js/calendar/calendar.js"></script>

<div class="subnav">
    <h1 class="title_2 line_x">一键删除</h1>
</div>
<div class="pad_lr_10" >
<form action="<?php echo u('item/delete_search');?>" method="post" name="searchform" id="info_form">

                <table width="100%" cellspacing="0" class="table_form">
				<tbody>
				
	                <tr>
						<th width="120">发布时间：</th>
						<td>
	                    <input type="text" name="time_start" id="time_start" class="date" size="12" value="<?php echo ($time_start); ?>">
	                    -
	                    <input type="text" name="time_end" id="time_end" class="date" size="12" value="<?php echo ($time_end); ?>">
						</td>
					</tr>
		            <tr>
						<th>商品分类：：</th>
						<td>
						<select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('item_cate/ajax_getchilds');?>" data-selected=""></select><input type="hidden" name="cate_id" id="J_cate_id" value="" />
						</td>
					</tr>
	                <tr>
						<th>审核状态：</th>
						<td>
	                    <select name="status">
	                    <option value="" selected>-所有状态-</option>
	                    <option value="1">已审核</option>
	                    <option value="0">未审核</option>
	                    </select>
						</td>
					</tr>
	                <tr>
						<th>关 键 字：</th>
						<td>
	                    <input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($keyword); ?>" />
						</td>
					</tr>
	                <tr>
						<th>价格范围：</th>
						<td>
					   <input type="text" name="min_price" size="5" class="input-text" value="<?php echo ($min_price); ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')" />&nbsp;-&nbsp;<input type="text" name="max_price" size="5" class="input-text" value="<?php echo ($max_price); ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')" />&nbsp;元
						</td>
					</tr>
					<tr>
						<th>佣金范围：</th>
						<td>
					   <input type="text" name="min_rates" size="5" class="input-text" value="<?php echo ($min_rates); ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')" />&nbsp;-&nbsp;<input type="text" name="max_rates" size="5" class="input-text" value="<?php echo ($max_rates); ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')" />&nbsp;%
						</td>
					</tr>
	                <tr>
						<th>确认删除：</th>
						<td>
					   <input name="isok" type="checkbox" class="input-text" value="1" />&nbsp;&nbsp;<font color=red>(注：确认是否要删除，删除的数据不可恢复！)</font> 
					   </td>
					</tr>
					</tbody>
                </table>
				
				
                <div class="mt10">
				<input type="submit" name="dosubmit" class="btn btn_submit" value="删除" id="dosubmit"　　　　 style="margin:0 0 10px 100px;"　　　　　　　　/>
				</div>
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
<script language="javascript" type="text/javascript">
	                        Calendar.setup({
	                            inputField     :    "time_start",
	                            ifFormat       :    "%Y-%m-%d",
	                            showsTime      :    'true',
	                            timeFormat     :    "24"
	                        });
</script>
<script language="javascript" type="text/javascript">
	                        Calendar.setup({
	                            inputField     :    "time_end",
	                            ifFormat       :    "%Y-%m-%d",
	                            showsTime      :    'true',
	                            timeFormat     :    "24"
	                        });
</script>  
<script>
$('.J_cate_select').cate_select('请选择');
//$('.J_cate_select').cate_select({top_option:lang.all}); //分类联动
</script>
</body></html>