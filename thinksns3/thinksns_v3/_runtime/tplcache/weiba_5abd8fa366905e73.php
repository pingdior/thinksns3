<?php if (!defined('THINK_PATH')) exit();?><?php if(CheckPermission('weiba_normal','weiba_reply')){ ?>
<!--评论框-->
<?php if(($cancomment)  ==  "1"): ?><div class="input" model-node="comment_textarea">
<div class="input_before1" model-node="mini_editor">
<textarea class="input_tips" id="comment_inputor" event-node="mini_editor_textarea" hidefocus="true" model-args='t=comment'></textarea>
</div>
<div class="action clearfix">
<a href="javascript:void(0);" class="btn-green-small right" event-node="do_weiba_reply" 
event-args='' weiba_id="<?php echo ($weiba_id); ?>" post_id="<?php echo ($post_id); ?>"  post_uid="<?php echo ($post_uid); ?>" feed_id="<?php echo ($feed_id); ?>" addtoend="<?php echo ($addtoend); ?>" to_reply_id="0" to_uid="0" ><span><?php echo L('PUBLIC_STREAM_REPLY');?></span></a>  
  <div class="acts">
          <a class="face-block" href="javascript:;" event-node="comment_insert_face"><i class="face"></i>表情</a>
          <!-- <a href="javascript:void(0);" class="image-block"><i class="image" ></i>图片
            <form style='display:inline;padding:0;margin:0;border:0' >
            <input type="file" name="attach" inputname='attach' onchange="core.plugInit('uploadFile',this,'','image')" urlquery='attach_type=feed_image'>
            </form>
          </a>
          <div class="tips-img" style="display:none"><dl><dd><i class="arrow-open"></i>jpg.png,gif,bmp,tif</dd></dl></div> -->
  </div>
  <p><label><input type="checkbox" class="checkbox" name="shareFeed" value="1"><?php echo L('PUBLIC_SHARETO_STREAM');?></label></p>  
  <div class="clear"></div>
  <div model-node="faceDiv"></div>      
</div>
</div>

<script>
var initNums = '<?php echo ($initNums); ?>';
//shortcut('ctrl+return', replycomment , {target:'mini_editor_textarea'});
setTimeout(function() {
  atWho($("textarea#comment_inputor"));
}, 1000);
</script>

<?php else: ?>
<?php echo L('PUBLIC_CONCENT_ISNULL');?><?php endif; ?>
<?php } ?>
<!--评论列表-->
<?php if(($showlist)  ==  "1"): ?><div class="comment_lists">
        <?php if(is_array($list["data"])): ?><?php $k = 0;?><?php $__LIST__ = $list["data"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$k;?><?php $mod = ($k % 2 )?><dl class="comment_list clearfix" model-node="comment_list">        
		<dt><a href="<?php echo ($vo["user_info"]["space_url"]); ?>"><img width="30" height="30" src="<?php echo ($vo["user_info"]["avatar_tiny"]); ?>"></a></dt>        
		<dd>
    <span class="floor"><?php echo ($vo["storey"]); ?>楼</span>
    <p class="cont">    
		<?php echo ($vo["user_info"]["space_link"]); ?>
        <?php if(is_array($vo['user_info']['groupData'][$vo['user_info']['uid']])): ?><?php $i = 0;?><?php $__LIST__ = $vo['user_info']['groupData'][$vo['user_info']['uid']]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v2): ?><?php ++$i;?><?php $mod = ($i % 2 )?><img style="width:auto;height:auto;display:inline;cursor:pointer" src="<?php echo ($v2['user_group_icon_url']); ?>" title="<?php echo ($v2['user_group_name']); ?>" />&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
		    ：<em><?php echo ($vo["content"]); ?><span class="time">(<?php echo (friendlyDate($vo["ctime"])); ?>)</span></em></p>
		<p class="info right"><span>
		<?php $isdel=0;
		if( ($vo['user_info']['uid'] == $GLOBALS['ts']['mid'] && CheckPermission('weiba_normal','weiba_del_reply')) || in_array($GLOBALS['ts']['mid'],$weiba_admin) || CheckPermission('core_admin','comment_del')){ ?>
		<?php $isdel=1; ?>
		<a href="javascript:void(0);" event-node="reply_del" event-args="reply_id=<?php echo ($vo["reply_id"]); ?>"><?php echo L('PUBLIC_STREAM_DELETE');?></a> 
    <!-- <a href="<?php echo U('weiba/Index/replyEdit',array('reply_id'=>$vo['reply_id']));?>">编辑</a>
    <i class="vline">|</i> -->
		<?php } ?>
		<?php if(CheckPermission('weiba_normal','weiba_reply')){ ?>
    	<?php if(($cancomment)  ==  "1"): ?><?php if($isdel){ ?>
    	<i class="vline">|</i>
    	<?php } ?>
		<a href="javascript:void(0)" event-args='weiba_id=<?php echo ($weiba_id); ?>&post_id=<?php echo ($post_id); ?>&post_uid=<?php echo ($post_uid); ?>&to_reply_id=<?php echo ($vo["reply_id"]); ?>&to_uid=<?php echo ($vo["uid"]); ?>&to_comment_uname=<?php echo ($vo["user_info"]["uname"]); ?>&feed_id=<?php echo ($feed_id); ?>&comment_id=<?php echo ($vo["comment_id"]); ?>&addtoend=<?php echo ($addtoend); ?>' 
			event-node="reply_reply"><?php echo L('PUBLIC_STREAM_REPLY');?></a>
     <!--  <a href="javascript:void(0)" event-args='row_id=<?php echo ($vo["row_id"]); ?>&weiba_id=<?php echo ($weiba_id); ?>&post_id=<?php echo ($post_id); ?>&post_uid=<?php echo ($post_uid); ?>&to_reply_id=<?php echo ($vo["reply_id"]); ?>&to_uid=<?php echo ($vo["uid"]); ?>&to_comment_uname=<?php echo ($vo["user_info"]["uname"]); ?>&feed_id=<?php echo ($feed_id); ?>' 
      event-node="reply_reply"><?php echo L('PUBLIC_STREAM_REPLY');?></a> -->
      <!-- <a href="javascript:ui.reply(1979)"><?php echo L('PUBLIC_STREAM_REPLY');?></a> --><?php endif; ?>
  <?php } ?>
    </span></p>
		</dd>
		</dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?> 
</div>
<!--页码-->
   <?php if(($list["html"])  !=  ""): ?><div id="page" class="page">
      <?php echo ($list["html"]); ?>
   </div><?php endif; ?>
   <!--页码/end--><?php endif; ?>