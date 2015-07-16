<?php if (!defined('THINK_PATH')) exit();?><!--编辑菜单-->
<div class="dialog_content">
    <form id="info_form" name="info_form" action="<?php echo U('nav/edit');?>" method="post">
    <table width="100%" class="table_form">
        <tr>
            <th width="100"><?php echo L('nav_name');?> :</th>
            <td><input type="text" name="name" id="J_name" class="input-text" value="<?php echo ($info["name"]); ?>"></td>
        </tr>
        <tr>
            <th><?php echo L('alias');?></th>
            <td>
                <?php if($info['mod'] != 'sys'): ?><input type="text" name="alias" class="input-text" value="<?php echo ($info["alias"]); ?>">
                <?php else: ?>
                <?php echo ($info["alias"]); endif; ?>
            </td>
        </tr>
        <?php if($info['mod'] != 'sys'): ?><tr>
            <th><?php echo L('nav_link');?> :</th>
            <td><input type="text" name="link" id="J_link" class="input-text" size="30" value="<?php echo ($info["link"]); ?>"></td>
        </tr><?php endif; ?>
        <tr>
            <th><?php echo L('nav_type');?> :</th>
            <td>
                <label><input type="radio" name="type" class="radio_style" value="main" <?php if($info['type'] == 'main'): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo L('nav_type_main');?>&nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="type" class="radio_style" value="bottom" <?php if($info['type'] == 'bottom'): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo L('nav_type_bottom');?></label>
            </td>
        </tr>
        <tr>
            <th><?php echo L('nav_target');?> :</th>
            <td>
                <label><input type="radio" name="target" class="radio_style" value="1" <?php if($info['target'] == 1): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo L('yes');?>&nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="target" class="radio_style" value="0" <?php if($info['target'] == 0): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo L('no');?></label>
            </td>
        </tr>
        <tr>
            <th><?php echo L('enabled');?> :</th>
            <td>
                <label><input type="radio" name="enabled" class="radio_style" value="1" <?php if($info['enabled'] == 1): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo L('open');?>&nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="enabled" class="radio_style" value="0" <?php if($info['enabled'] == 0): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo L('close');?></label>
            </td>
        </tr>
    </table>
    <input name="id" type="hidden" value="<?php echo ($info["id"]); ?>">
    </form>
</div>

<script>
$(function(){
    $.formValidator.initConfig({formid:"info_form",autotip:true});
    $("#J_name").formValidator({ onshow:lang.please_input+lang.nav_name, onfocus:lang.please_input+lang.nav_name, oncorrect:lang.input_right}).inputValidator({ min:1, onerror:lang.please_input+lang.nav_name}).defaultPassed();
    $("#J_link").formValidator({ onshow:lang.please_input+lang.nav_link, onfocus:lang.please_input+lang.nav_link, oncorrect:lang.input_right}).inputValidator({ min:1, onerror:lang.please_input+lang.nav_link}).defaultPassed();

    $('#info_form').ajaxForm({success:complate,dataType:'json'});
    function complate(result){
        if(result.status == 1){
            $.dialog.get(result.dialog).close();
            $.pinphp.tip({content:result.msg});
            window.location.reload();
        } else {
            $.pinphp.tip({content:result.msg, icon:'alert'});
        }
    }
});
</script>