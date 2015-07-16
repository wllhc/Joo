<?php if (!defined('THINK_PATH')) exit();?><ul class="id_login">
    <?php if(is_array($ad_list)): $i = 0; $__LIST__ = $ad_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?><li class="clearfix">
        <img src="__UPLOAD__/advert/<?php echo ($ad["extimg"]); ?>" class="fl">
        <a href="<?php echo U('advert/tgo', array('id'=>$ad['id']));?>" target="_blank"><?php echo ($ad["html"]); ?></a>
        <a href="<?php echo U('advert/tgo', array('id'=>$ad['id']));?>" class="top_active_btn" target="_blank"><?php echo ($ad["desc"]); ?></a>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>