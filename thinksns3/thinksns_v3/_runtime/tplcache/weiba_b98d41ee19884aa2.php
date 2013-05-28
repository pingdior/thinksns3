<?php if (!defined('THINK_PATH')) exit();?>
	   <div class="weiba-rank-list">
	     <h3>我关注的微吧<span class="f9">(共<?php echo (($weibaListCount)?($weibaListCount):0); ?>个)</span></h3>
	     <ul>
	        <?php if(is_array($weibaList)): ?><?php $i = 0;?><?php $__LIST__ = $weibaList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
	                <dl class="no-margin">
	                   <dt><a href="<?php echo U('weiba/Index/detail',array('weiba_id'=>$vo['weiba_id']));?>"><img src="<?php echo ($vo["logo"]); ?>" width="30" height="30" /></a></dt>
	                   <dd><p><a href="<?php echo U('weiba/Index/detail',array('weiba_id'=>$vo['weiba_id']));?>"><?php echo ($vo["weiba_name"]); ?></a></p><p>粉丝数：<?php echo (($vo["follower_count"])?($vo["follower_count"]):0); ?>  帖子数：<?php echo (($vo["thread_count"])?($vo["thread_count"]):0); ?></p></dd>
	                </dl>
	            </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
	        

	   </ul>
	   </div>