<?php if (!defined('THINK_PATH')) exit();?><?php if(0 == $follow_state['following']): ?><a event-node="doFollowWeiba" event-args="weiba_id=<?php echo ($weiba_id); ?>&following=<?php echo ($follow_state['following']); ?>&isrefresh=<?php echo ($isrefresh); ?>" href="<?php echo U('weiba/Index/doFollowWeiba', array('weiba_id'=>$weiba_id));?>"></a>
<?php else: ?>
    <a event-node="unFollowWeiba" event-args="uid=<?php echo ($fid); ?>&uname=<?php echo ($uname); ?>&following=<?php echo ($follow_state['following']); ?>&follower=<?php echo ($follow_state['follower']); ?>&refer=<?php echo ($refer); ?>&isrefresh=<?php echo ($isrefresh); ?>" href="<?php echo U('weiba/Index/unFollowWeiba', array('weiba_id'=>$weiba_id));?>"></a><?php endif; ?>


<!-- <span class="btn-green-big"><i class="ico-add"></i>加关注</span><span class="btn-add-h"><i class="ico-add-h"></i>已关注<i class="vline">|</i><a href="">取消</a></span><span>更多<i class="arrow-down-big"></i></span> -->