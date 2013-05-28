<?php if (!defined('THINK_PATH')) exit();?><!-- <div class="find-type-list">
  <ul>
    <li class="first">认证推荐</li>
    <li>
      <div class="find-nav"><a href="<?php echo U('people/Index/index', array('cid'=>0,'type'=>$type));?>" class="<?php if(($cid)  ==  $vo["id"]): ?>current<?php endif; ?>">全部</a></div>
    </li>
    <?php if(is_array($menu)): ?><?php $i = 0;?><?php $__LIST__ = $menu?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
      <div class="find-nav"><a href="<?php echo U('people/Index/index', array('cid'=>$vo['id'],'type'=>$type));?>" class="<?php if(($cid)  ==  $vo["id"]): ?>current<?php endif; ?>"><?php echo ($vo["title"]); ?></a></div>
    </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </ul>
</div> -->

<div class="area-type-lists" id="industry_list">
  <?php $j = 0; $menuCount = count($menu); $showNums = 8; ?>
  <?php if(is_array($menu)): ?><?php $i = 0;?><?php $__LIST__ = $menu?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $j++; ?>
  <div id="list_div_<?php echo ($j); ?>" class="area-type-list <?php if(($j)  ==  $menuCount): ?>no-margin<?php endif; ?>">
    <p>查找<?php echo ($vo["user_group_name"]); ?></p>
    <ul class="clearfixul">
      <li>
        <a <?php if(($cid)  ==  $vo['user_group_id']): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$vo['user_group_id'],'type'=>$type,'pid'=>0));?>">全部</a>
      </li>
      <?php if(is_array($vo["child"])): ?><?php $i = 0;?><?php $__LIST__ = $vo["child"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li <?php if(($i)  >  $showNums): ?>style="display:none;"<?php endif; ?>>
        <a <?php if(($cid)  ==  $v['user_verified_category_id']): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('cid'=>$v['user_verified_category_id'],'type'=>$type,'pid'=>$vo['user_group_id']));?>"><?php echo (getShort($v["title"], 10)); ?></a>
      </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </ul>
    <?php if(count($vo['child']) > $showNums): ?>
    <div id="slide_btn_<?php echo ($j); ?>" style="margin-bottom:2px;"><a style="margin-left:128px;" href="javascript:;" onclick="slideDiv(<?php echo ($j); ?>, <?php echo ($showNums); ?>, true);">展开</a></div>
    <?php endif; ?>
  </div><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
</div>

<script type="text/javascript">
/**
 * 伸缩菜单效果
 * @param integer divId 操作DIV对象
 * @param integer nums 显示LI个数
 * @param boolean slide 是否展开，展开true，缩起false
 * @return boolean false
 */
var slideDiv = function(divId, nums, slide)
{
  $div = $('#list_div_'+divId);
  $slide = $('#slide_btn_'+divId);
  $div.find('li').each(function(i, n) {
    if(i > nums) {
      if(slide) {
        $(this).show()
        $slide.html('<a style="margin-left:128px;" href="javascript:;" onclick="slideDiv('+divId+', '+nums+', false);">收起</a>');
      } else {
        $(this).hide();
        $slide.html('<a style="margin-left:128px;" href="javascript:;" onclick="slideDiv('+divId+', '+nums+', true);">展开</a>');
      }
    }
  });
  return false;
}
</script>