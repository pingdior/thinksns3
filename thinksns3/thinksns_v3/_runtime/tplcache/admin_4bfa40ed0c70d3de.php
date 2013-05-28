<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.ico-top, .ico-btm {background: url("__THEME__/admin/image/ico_top_btm.gif") no-repeat scroll 0 0 transparent;height:14px;width:12px;}
.ico-top, .ico-btm {display: inline-block;vertical-align: middle;}
.ico-top {background-position: -12px 0;}
.ico-btm {background-position: -24px 0;}
.ico-top:hover {background-position: 0 0;}
.ico-btm:hover {background-position: -35px 0;}
</style>

<div class="Toolbar_inbox">
  <a href="<?php echo Addons::adminPage('addAdSpace');?>" class="btn_a"><span>添加广告</span></a>
  <a href="javascript:;" class="btn_a" onclick="delAdSpace();"><span>删除广告</span></a>
</div>
<div class="list">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th style="width:30px;">
        <input type="checkbox" id="checkbox_handle" onclick="checkAll(this)" value="0">
        <label for="checkbox"></label>
      </th>
      <th class="line_l">ID</th>
      <th class="line_l">标题</th>
      <th class="line_l">位置</th>
      <th class="line_l">创建时间</th>
      <th class="line_l">更新时间</th>
      <th class="line_l">是否有效</th>
      <th class="line_l">排序</th>
      <th class="line_l">操作</th>
    </tr>
    <?php if(is_array($list["data"])): ?><?php $i = 0;?><?php $__LIST__ = $list["data"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><tr overstyle='on' id="ad_space_<?php echo ($vo["ad_id"]); ?>" rel="<?php echo ($vo["ad_id"]); ?>">
      <td>
        <input type="checkbox" name="checkbox" id="checkbox2" onclick="checkon(this)" value="<?php echo ($vo["ad_id"]); ?>">
      </td>
      <td><?php echo ($vo["ad_id"]); ?></td>
      <td><?php echo ($vo["title"]); ?></td>
      <td><?php echo $place_array[$vo['place']]; ?></td>
      <td><?php echo (date("Y-m-d H:i",$vo["ctime"])); ?></td>
      <td>
        <?php if(empty($vo['mtime'])): ?>
        暂无更新
        <?php else: ?>
        <?php echo (date("Y-m-d H:i",$vo["mtime"])); ?>
        <?php endif; ?>
      </td>
      <td><?php if(($vo["is_active"])  ==  "1"): ?>是<?php else: ?>否<?php endif; ?></td>
      <td>
        <label><a href="javascript:;" class="ico-top" onclick="mvAdSpace('<?php echo ($vo['ad_id']); ?>','up');"></a></label>
        <label><a href="javascript:;" class="ico-btm" onclick="mvAdSpace('<?php echo ($vo['ad_id']); ?>','down');"></a></label>
      </td>
      <td>
        <a href="<?php echo Addons::adminPage('editAdSpace', array('id'=>$vo['ad_id']));?>">编辑</a>
        <a href="javascript:;" onclick="delAdSpace('<?php echo ($vo["ad_id"]); ?>')">删除</a>
      </td>
    </tr><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </table>
</div>
<div class="Toolbar_inbox">
  <a href="<?php echo Addons::adminPage('addAdSpace');?>" class="btn_a"><span>添加广告</span></a>
  <a href="javascript:;" class="btn_a" onclick="delAdSpace();"><span>删除广告</span></a>
</div>

<script type="text/javascript">
/**
 * 鼠标移动表格效果
 * @return void
 */
$(document).ready(function() {
  $("tr[overstyle='on']").hover(
    function () {
      $(this).addClass("bg_hover");
    },
    function () {
      $(this).removeClass("bg_hover");
    }
  );  
});
/**
 * 选中checked方法
 * @param obj o 点击的DOM对象
 * @return void
 */
var checkon = function(o)
{
  if(o.checked == true) {
    $(o).parents('tr').addClass('bg_on');
  } else {
    $(o).parents('tr').removeClass('bg_on');
  }
};
/**
 * 全选checked方法
 * @param obj o 点击的DOM对象
 * @return void
 */
var checkAll = function(o) {
  if(o.checked == true) {
    $('input[name="checkbox"]').attr('checked','true');
    $('tr[overstyle="on"]').addClass("bg_on");
  } else {
    $('input[name="checkbox"]').removeAttr('checked');
    $('tr[overstyle="on"]').removeClass("bg_on");
  }
};
/**
 * 获取已选择的ID数组
 * @return array 已选择的ID数组
 */
var getChecked = function() {
  var ids = [];
  $.each($('table input:checked'), function(i, n) {
    ids.push($(n).val());
  });

  return ids;
};
/**
 * 删除广告位操作
 * @param integer ids 广告位ID
 * @return void
 */
var delAdSpace = function(ids)
{
  // 获取选中内容
  var len = 0;
  if(ids) {
    len = 1;
  } else {
    ids = getChecked();
    len = (ids[0] == 0) ? (ids.length - 1) : ids.length;
    ids = ids.toString();
  }
  // 验证数据
  if(ids == '') {
    ui.error('请选择广告');
    return false;
  }
  // 删除操作
  if(confirm('您将删除'+len+'条记录，删除后无法恢复，确定继续？')) {
    $.post("<?php echo Addons::adminUrl('doDelAdSpace');?>", {ids:ids}, function(res) {
      if(res.status == 1) {
        ui.success(res.info);
        ids = ids.split(',');
        for(i = 0; i < ids.length; i++) {
          $('#ad_space_'+ids[i]).remove();
        }
      } else {
        ui.error(res.info);
      }
      return false;
    }, 'json');
    return false;
  }
};
/**
 * 移动广告位操作
 * @param integer id 广告位ID
 * @param string type 移动类型，up or down
 * @return void
 */
var mvAdSpace = function(id, type)
{
  // 判断是否能移动
  var baseId = (type == 'up') ? $('#ad_space_'+id).prev().attr('rel') : $('#ad_space_'+id).next().attr('rel');
  if(baseId) {
    // 提交移动操作
    $.post("<?php echo Addons::adminUrl('doMvAdSpace');?>", {id:id, baseId:baseId}, function(res) {
      if(res.status == 1) {
        ui.success(res.info);
        type == 'up' ? $('#ad_space_'+id).insertBefore('#ad_space_'+baseId) : $('#ad_space_'+id).insertAfter('#ad_space_'+baseId);
      } else {
        ui.error(res.info);
      }
      return false;
    }, 'json');
    return false;
  }
};
</script>