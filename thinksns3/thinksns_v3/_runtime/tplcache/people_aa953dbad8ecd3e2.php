<?php if (!defined('THINK_PATH')) exit();?><div class="find-type-list">
  <ul>
    <li class="first">官方推荐</li>
    <li>
      <div class="find-nav"><a href="<?php echo U('people/Index/index', array('cid'=>0,'type'=>$type));?>" class="<?php if(($cid)  ==  "0"): ?>current<?php endif; ?>">全部</a></div>
    </li>
    <?php if(is_array($menu)): ?><?php $i = 0;?><?php $__LIST__ = $menu?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
      <div class="find-nav"><a href="<?php echo U('people/Index/index', array('cid'=>$vo['id'],'type'=>$type));?>" class="<?php if(($cid)  ==  $vo["id"]): ?>current<?php endif; ?>"><?php echo ($vo["title"]); ?></a></div>
    </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </ul>
</div>