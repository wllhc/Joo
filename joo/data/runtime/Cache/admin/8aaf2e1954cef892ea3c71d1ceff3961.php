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
<!--积分设置-->
<div class="pad_lr_10">
<form id="info_form" action="<?php echo U('score/setting');?>" method="post">
    <table width="100%" cellspacing="0" class="table_form">
        <thead>
        <tr>
            <th width="150" align="left">用户行为</th>
            <th width="150" align="left">积分</th>
            <th align="left">每日奖惩上限次数</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>注册 :</td>
            <td><input type="text" name="score_rule[register]" class="input-text" size="10" value="<?php echo C('pin_score_rule.register');?>"></td>
            <td>
                <?php echo C('pin_score_rule.register_nums');?>
                <input type="text" name="score_rule[register_nums]" class="input-text" size="10" value="<?php echo C('pin_score_rule.register_nums');?>" style="display:none;">
            </td>
        </tr>
        <tr>
            <td>登录 :</td>
            <td><input type="text" name="score_rule[login]" class="input-text" size="10" value="<?php echo C('pin_score_rule.login');?>"></td>
            <td><input type="text" name="score_rule[login_nums]" class="input-text" size="10" value="<?php echo C('pin_score_rule.login_nums');?>"></td>
        </tr>
        <tr>
            <td>发布分享 :</td>
            <td><input type="text" name="score_rule[pubitem]" class="input-text" size="10" value="<?php echo C('pin_score_rule.pubitem');?>"></td>
            <td><input type="text" name="score_rule[pubitem_nums]" class="input-text" size="10" value="<?php echo C('pin_score_rule.pubitem_nums');?>"></td>
        </tr>
        <tr>
            <td>添加喜欢 :</td>
            <td><input type="text" name="score_rule[likeitem]" class="input-text" size="10" value="<?php echo C('pin_score_rule.likeitem');?>"></td>
            <td><input type="text" name="score_rule[likeitem_nums]" class="input-text" size="10" value="<?php echo C('pin_score_rule.likeitem_nums');?>"></td>
        </tr>
        <tr>
            <td>添加到专辑 :</td>
            <td><input type="text" name="score_rule[joinalbum]" class="input-text" size="10" value="<?php echo C('pin_score_rule.joinalbum');?>"></td>
            <td><input type="text" name="score_rule[joinalbum_nums]" class="input-text" size="10" value="<?php echo C('pin_score_rule.joinalbum_nums');?>"></td>
        </tr>
        <tr>
            <td>转发分享 :</td>
            <td><input type="text" name="score_rule[fwitem]" class="input-text" size="10" value="<?php echo C('pin_score_rule.fwitem');?>"></td>
            <td><input type="text" name="score_rule[fwitem_nums]" class="input-text" size="10" value="<?php echo C('pin_score_rule.fwitem_nums');?>"></td>
        </tr>
        <tr>
            <td>发布评论 :</td>
            <td><input type="text" name="score_rule[pubcmt]" class="input-text" size="10" value="<?php echo C('pin_score_rule.pubcmt');?>"></td>
            <td><input type="text" name="score_rule[pubcmt_nums]" class="input-text" size="10" value="<?php echo C('pin_score_rule.pubcmt_nums');?>"></td>
        </tr>
        <tr>
            <td>删除分享 :</td>
            <td><input type="text" name="score_rule[delitem]" class="input-text" size="10" value="<?php echo C('pin_score_rule.delitem');?>"></td>
            <td><input type="text" name="score_rule[delitem_nums]" class="input-text" size="10" value="<?php echo C('pin_score_rule.delitem_nums');?>"></td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" value="<?php echo L('submit');?>" id="dosubmit" name="dosubmit" class="btn btn_submit" /></td>
        </tr>
    </tbody>
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
<script>
$('#score_setting').find('input').live('keyup keydown blur',function(){
    var self = $(this);
    var val = self.val();
    val = val.replace(/[^0-9]/g,'');
    self.val(val);
});
</script>
</body>
</html>