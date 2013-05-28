<?php if (!defined('THINK_PATH')) exit();?><?php if($user){ ?>
    <ul id="topicUser_<?php echo ($type); ?>">
      <?php if(is_array($topic_user)): ?><?php $i = 0;?><?php $__LIST__ = $topic_user?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v1): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li id="user_<?php echo ($user[$v1]['uid']); ?>" value="<?php echo ($user[$v1]['uid']); ?>"><a href="<?php echo ($user[$v1]['space_url']); ?>" class="face" event-node="face_card" uid="<?php echo ($user[$v1]['uid']); ?>"><img src="<?php echo ($user[$v1]['avatar_middle']); ?>" /><span><?php echo (getShort($user[$v1]['uname'],4)); ?></span></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </ul>
    <?php }else{ ?>
        <p>暂时还没有相关用户</p>
<?php } ?>