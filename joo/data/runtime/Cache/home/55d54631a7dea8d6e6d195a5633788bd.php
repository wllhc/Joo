<?php if (!defined('THINK_PATH')) exit(); if(is_array($item_list)): $i = 0; $__LIST__ = $item_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="picitem">
        <div class="picbox">
            <a href="<?php echo U('item/index', array('id'=>$item['id']));?>" title="<?php echo ($item["title"]); ?>" target="_blank"><img alt="<?php echo ($item["title"]); ?>" src="./data/thumb/_thumb_280x_<?php echo ($item["uid"]); ?>_<?php echo ($item["id"]); ?>.jpg" width="280" height="280" /></a>
            <p>
                <a href="<?php echo U('item/index', array('id'=>$item['id']));?>" class="pictitle"><?php echo ($item["intro"]); ?></a>
                <b class="grade"><?php echo ($item["price"]); ?></b>
            </p>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>