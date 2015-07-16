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
<!--阿里妈妈筛选采集-->
<div class="subnav">
    <h1 class="title_2 line_x"><?php echo L('tbk_item_collect');?><em class="red">(<?php echo L('collect_need_autouser');?>)</em></h1>
</div>
<div class="pad_lr_10" >
    <form id="J_alimama_form" name="searchform" method="get" >
    <table width="100%" cellspacing="0" class="table_form">
        <tbody>
            <tr>
                <th width="150"><?php echo L('tbk_item_cate');?>：</th>
                <td>
                    <select class="J_tbcats mr10">
                        <option value="0">--<?php echo L('all');?>--</option>
                        <?php if(is_array($item_cate)): $i = 0; $__LIST__ = $item_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cate["cid"]); ?>"><?php echo ($cate["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <input type="hidden" id="J_cid" name="cid" val="">
                    <span class="gray ml10"><?php echo L('tbk_item_cate_desc');?></span>
                </td>
            </tr>
            <tr>
                <th><?php echo L('keyword');?>：</th>
                <td>
                    <input name="keyword" type="text" class="input-text" size="40" />
                    <span class="gray ml10"><?php echo L('tbk_keyword_desc');?></span>
                </td>
            </tr>
            <tr>
                <th><?php echo L('sort_order');?>：</th>
                <td>
                    <select name="sort">
                        <option value="default"><?php echo L('sort_default');?></option>
                        <option value="price_desc"><?php echo L('price_desc');?></option>
                        <option value="price_asc"><?php echo L('price_asc');?></option>
                        <option value="credit_desc"><?php echo L('credit_desc');?></option>
                        <option value="commissionRate_desc"><?php echo L('commissionRate_desc');?></option>
                        <option value="commissionRate_asc"><?php echo L('commissionRate_asc');?></option>
                        <option value="commissionNum_desc"><?php echo L('commissionNum_desc');?></option>
                        <option value="commissionNum_asc"><?php echo L('commissionNum_asc');?></option>
                        <option value="commissionVolume_desc"><?php echo L('commissionVolume_desc');?></option>
                        <option value="commissionVolume_asc"><?php echo L('commissionVolume_asc');?></option>
                        <option value="delistTime_desc"><?php echo L('delistTime_desc');?></option>
                        <option value="delistTime_asc"><?php echo L('delistTime_asc');?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><?php echo L('tbk_item_price');?>：</th>
                <td>
                    <input type="text" name="start_price" size="8" class="input-text" /> - 
                    <input type="text" name="end_price" size="8" class="input-text" /> <?php echo L('price_unit');?> 
                    <span class="gray ml10"><?php echo L('tbk_item_price_desc');?></span>
                </td>
            </tr>
            <tr>
                <th><?php echo L('tbk_item_commission_rate');?>：</th>
                <td>
                    <input type="text" name="start_commissionRate" size="5" class="input-text" /> % - 
                    <input type="text" name="end_commissionRate" size="5" class="input-text" /> % 
                    <span class="gray ml10"><?php echo L('tbk_item_commission_rate_desc');?></span>
                </td>
            </tr>
            <tr>
                <th><?php echo L('tbk_item_commission_num');?>：</th>
                <td>
                    <input type="text" name="start_commissionNum" size="8" class="input-text" /> - 
                    <input type="text" name="end_commissionNum" size="8" class="input-text" /> 
                    <span class="gray ml10"><?php echo L('tbk_item_commission_num_desc');?></span>
                </td>
            </tr>
            <tr>
                <th><?php echo L('tbk_item_volume');?>：</th>
                <td>
                    <input type="text" name="start_totalnum" size="8" class="input-text" /> - 
                    <input type="text" name="end_totalnum" size="8" class="input-text" />
                    <span class="gray ml10"><?php echo L('tbk_item_volume_desc');?></span>
                </td>
            </tr>
            <tr>
                <th><?php echo L('tbk_seller_credit');?>：</th>
                <td>
                    <select name="start_credit">
                        <option value="1heart"><?php echo L('n1'); echo L('heart');?></option>
                        <option value="2heart"><?php echo L('n2'); echo L('heart');?></option>
                        <option value="3heart"><?php echo L('n3'); echo L('heart');?></option>
                        <option value="4heart"><?php echo L('n4'); echo L('heart');?></option>
                        <option value="5heart"><?php echo L('n5'); echo L('heart');?></option>
                        <option value="1diamond"><?php echo L('n1'); echo L('diamond');?></option>
                        <option value="2diamond"><?php echo L('n2'); echo L('diamond');?></option>
                        <option value="3diamond"><?php echo L('n3'); echo L('diamond');?></option>
                        <option value="4diamond"><?php echo L('n4'); echo L('diamond');?></option>
                        <option value="5diamond"><?php echo L('n5'); echo L('diamond');?></option>
                        <option value="1crown"><?php echo L('n1'); echo L('crown');?></option>
                        <option value="2crown"><?php echo L('n2'); echo L('crown');?></option>
                        <option value="3crown"><?php echo L('n3'); echo L('crown');?></option>
                        <option value="4crown"><?php echo L('n4'); echo L('crown');?></option>
                        <option value="5crown"><?php echo L('n5'); echo L('crown');?></option>
                        <option value="1goldencrown"><?php echo L('n1'); echo L('goldencrown');?></option>
                        <option value="2goldencrown"><?php echo L('n2'); echo L('goldencrown');?></option>
                        <option value="3goldencrown"><?php echo L('n3'); echo L('goldencrown');?></option>
                        <option value="4goldencrown"><?php echo L('n4'); echo L('goldencrown');?></option>
                        <option value="5goldencrown"><?php echo L('n5'); echo L('goldencrown');?></option>
                    </select>
                     - 
                    <select name="end_credit">
                        <option value="1heart"><?php echo L('n1'); echo L('heart');?></option>
                        <option value="2heart"><?php echo L('n2'); echo L('heart');?></option>
                        <option value="3heart"><?php echo L('n3'); echo L('heart');?></option>
                        <option value="4heart"><?php echo L('n4'); echo L('heart');?></option>
                        <option value="5heart"><?php echo L('n5'); echo L('heart');?></option>
                        <option value="1diamond"><?php echo L('n1'); echo L('diamond');?></option>
                        <option value="2diamond"><?php echo L('n2'); echo L('diamond');?></option>
                        <option value="3diamond"><?php echo L('n3'); echo L('diamond');?></option>
                        <option value="4diamond"><?php echo L('n4'); echo L('diamond');?></option>
                        <option value="5diamond"><?php echo L('n5'); echo L('diamond');?></option>
                        <option value="1crown"><?php echo L('n1'); echo L('crown');?></option>
                        <option value="2crown"><?php echo L('n2'); echo L('crown');?></option>
                        <option value="3crown"><?php echo L('n3'); echo L('crown');?></option>
                        <option value="4crown"><?php echo L('n4'); echo L('crown');?></option>
                        <option value="5crown"><?php echo L('n5'); echo L('crown');?></option>
                        <option value="1goldencrown"><?php echo L('n1'); echo L('goldencrown');?></option>
                        <option value="2goldencrown"><?php echo L('n2'); echo L('goldencrown');?></option>
                        <option value="3goldencrown"><?php echo L('n3'); echo L('goldencrown');?></option>
                        <option value="4goldencrown"><?php echo L('n4'); echo L('goldencrown');?></option>
                        <option value="5goldencrown" selected><?php echo L('n5'); echo L('goldencrown');?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><?php echo L('tbk_more_where');?>：</th>
                <td>
                    <label class="mr10"><input type="checkbox" name="mall_item" value="1"> <?php echo L('only_tmall');?></label>
                    <label class="mr10"><input type="checkbox" name="guarantee" value="1"> <?php echo L('only_guarantee');?></label>
                    <label class="mr10"><input type="checkbox" name="sevendays_return" value="1"> <?php echo L('only_sevendays_return');?></label>
                    <label class="mr10"><input type="checkbox" name="real_describe" value="1"> <?php echo L('only_real_describe');?></label>
                    <label class="mr10"><input type="checkbox" name="cash_coupon" value="1"> <?php echo L('only_cash_coupon');?></label>
                </td>
            </tr>
            <tr>
                <th><?php echo L('item_like_init');?>：</th>
                <td>
                    <select name="like_init">
                        <option value="0"><?php echo L('item_like_default');?></option>
                        <option value="volume"><?php echo L('tbk_item_volume');?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="hidden" name="g" value="admin" />
                    <input type="hidden" name="m" value="collect_alimama" />
                    <input type="hidden" name="a" value="search" />
                    <input type="submit" name="search" class="btn btn_submit mr10" value="<?php echo L('search_filter');?>" />
                    <input type="button" name="import" class="J_showdialog btn" value="<?php echo L('import_db');?>" data-uri="<?php echo U('collect_alimama/batch_publish');?>" data-id="batch_publish" data-title="<?php echo L('import_db');?>" data-width="450" />
                </td>
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
$(function(){
    var uri = "<?php echo U('collect_alimama/ajax_get_tbcats');?>";
    $('.J_tbcats').die('change').live('change', function(){
        var _this = $(this),
            _cid = _this.val();
        _this.nextAll('.J_tbcats').remove();
        $.getJSON(uri, {cid:_cid}, function(result){
            if(result.status == '1'){
                var _childs = $('<select class="J_tbcats mr10"><option value="0">--'+lang.all+'--</option></select>')
                for(var i=0; i<result.data.length; i++){
                    $('<option value="'+result.data[i].cid+'">'+result.data[i].name+'</option>').appendTo(_childs);
                }
                _childs.insertAfter(_this);
            }
        });
        $('#J_cid').val(_cid);
    });
});
</script>
</body>
</html>