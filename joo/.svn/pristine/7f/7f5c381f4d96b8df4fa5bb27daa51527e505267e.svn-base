<?php if (!defined('THINK_PATH')) exit();?>    <div class="card_info">
        <img src="<?php echo avatar($user['id'], 100);?>" class="avatar">
        <div class="info">
            <p><a class="uname" href="<?php echo U('space/index', array('uid'=>$user['id']));?>"><?php echo ($user["username"]); ?></a></p>
            <p><?php echo ($user["province"]); ?> <?php echo ($user["city"]); ?></p>
            <p>
                <a href="<?php echo U('space/fans', array('uid'=>$user['id']));?>" target="_blank"><span><?php echo ($user["fans"]); ?></span></a><?php echo L('fans');?>
                <a href="<?php echo U('space/item', array('uid'=>$user['id']));?>" class="ml10" target="_blank"><span><?php echo ($user["shares"]); ?></span></a><?php echo L('share');?>
                <a href="<?php echo U('space/like', array('uid'=>$user['id']));?>" class="ml10" target="_blank"><span><?php echo ($user["likes"]); ?></span></a><?php echo L('like');?>
            </p>
        </div>
        <div class="intro">
            <span class="clr3"><?php echo (($user["intro"])?($user["intro"]):C('pin_user_intro_default')); ?></span>
        </div>
    </div>
    <div class="card_toolbar">
        <?php if($visitor['id'] == $user['id']): echo L('own_card');?>
        <?php else: ?>
        <div class="J_follow_bar fl mr10" data-uid="<?php echo ($user["id"]); ?>">
            <?php if($user['ship'] == 0): ?><a href="javascript:;" class="J_fo_u fo_u_btn"><?php echo L('follow');?></a>
            <?php elseif($user['ship'] == 1): ?>
            <span class="fo_u_ok"><?php echo L('followed');?></span><a href="javascript:;" class="J_unfo_u green"><?php echo L('cancel');?></a>
            <?php elseif($user['ship'] == 2): ?>
            <span class="fo_u_all"><?php echo L('follow_mutually');?></span><a href="javascript:;" class="J_unfo_u green"><?php echo L('cancel');?></a><?php endif; ?>
        </div>
        <a href="<?php echo U('message/write', array('to_id'=>$user['id']));?>" class="green" target="_blank"><?php echo L('send_message');?></a><?php endif; ?>
    </div>