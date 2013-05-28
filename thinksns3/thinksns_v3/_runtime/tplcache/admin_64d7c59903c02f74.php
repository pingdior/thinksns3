<?php if (!defined('THINK_PATH')) exit();?><feed app='weiba' type='weiba_post' info='微吧原创'>
	<title comment="feed标题"> 
		<![CDATA[ <?php echo ($actor); ?>  ]]>
	</title>
	<body comment="feed详细内容/引用的内容">
		<![CDATA[ <?php echo (replaceUrl(t($body))); ?>
		<?php if(APP_NAME != 'channel'){ ?>
		<a href="javascript:void(0)" class="ico-details" event-node ='loadPost' event-args='feed_id=<?php echo ($feedid); ?>&post_id=<?php echo ($app_row_id); ?>' id="<?php echo ($feedid); ?>"><!--查看全文--></a><div class="feed_img_lists" style="display:none;" id="post_<?php echo ($feedid); ?>_<?php echo ($app_row_id); ?>">
		</div>
		<?php }else{ ?>
		<a href="<?php echo U('weiba/Index/postDetail',array('post_id'=>$app_row_id));?>" class="ico-details" target="_blank"></a>
		<?php } ?>
		]]>
	</body>
	<feedAttr comment="true" repost="true" like="false" favor="true" delete="true" />
</feed>