<?php if (!defined('THINK_PATH')) exit();?><feed app='public' type='postimage' info='发图片微博'>
	<title> 
		<![CDATA[<?php echo ($actor); ?>]]>
	</title>
	<body>
		<![CDATA[ 
			<?php echo (replaceUrl(t($body))); ?>
			<br/>
			<div class="feed_img_lists" rel='small' >
			<ul class="small">
			<?php if(is_array($attachInfo)): ?><?php $i = 0;?><?php $__LIST__ = $attachInfo?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li ><a href="javascript:void(0)" event-node='img_small'>
					<img class="imgicon" src='<?php echo ($vo["attach_small"]); ?>' title='点击放大' width="100" height="100"></a>
				</li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
			</ul>
			</div>
			<div class="feed_img_lists" rel='big' style='display:none'>
			<ul class="feed_img_list big" >
			<span class='tools'><a href="javascript:void(0)" event-node='img_big' class="ico-pack-up">收起</a></span>
			<?php if(is_array($attachInfo)): ?><?php $i = 0;?><?php $__LIST__ = $attachInfo?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li title='<?php echo ($vo["attach_url"]); ?>'>
				<a href='<?php echo ($vo["attach_url"]); ?>' target="_blank" class="ico-show-big" title="查看大图" ></a>
				<a href="javascript:void(0)" event-node='img_big'><img class="imgsmall" src='<?php echo ($vo["attach_middle"]); ?>' title='点击缩小' ></a>
			</li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
			</ul>
			</div>
		 ]]>
	</body>
	<feedAttr comment="true" repost="true" like="false" favor="true" delete="true" />
</feed>