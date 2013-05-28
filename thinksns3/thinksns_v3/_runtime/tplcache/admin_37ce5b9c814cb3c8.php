<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo APPS_URL;?>/admin/_static/admin.css" rel="stylesheet" type="text/css">
<script>
/**
 * 全局变量
 */
var SITE_URL  = '<?php echo SITE_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var UPLOAD_URL ='<?php echo UPLOAD_URL;?>';
var MID		  = '<?php echo $mid; ?>';
var UID		  = '<?php echo $uid; ?>';
// Js语言变量
var LANG = new Array();
</script>
<script type="text/javascript" src="__THEME__/js/jquery.js"></script>
<script type="text/javascript" src="__THEME__/js/core.js"></script>
<script src="__THEME__/js/module.js"></script>
<script src="__THEME__/js/common.js"></script>
<script src="__THEME__/js/module.common.js"></script>
<script src="__THEME__/js/module.weibo.js"></script>
<script type="text/javascript" src="<?php echo APPS_URL;?>/admin/_static/admin.js?t=11"></script>
<script type="text/javascript" src = "__THEME__/js/ui.core.js"></script>
<script type="text/javascript" src = "__THEME__/js/ui.draggable.js"></script>
<?php /* 非admin应用的后台js脚本统一写在  模板风格对应的app目录下的admin.js中*/
if(APP_NAME != 'admin' && file_exists(APP_PUBLIC_PATH.'/admin.js')){ ?>
<script type="text/javascript" src="<?php echo APP_PUBLIC_URL;?>/admin.js"></script>
<?php } ?>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): ?><?php $i = 0;?><?php $__LIST__ = $langJsList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><script src="<?php echo ($vo); ?>"></script><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php } ?>
</head>
<body>
<div id="container" class="so_main">
  <div class="page_tit"><?php echo ($applist["$appname"]); ?><?php echo L('PUBLIC_SETTING_ADMIN');?></div>
<!-- START APP 选择-->
<!-- START APP 选择-->

<div class="form">
<div class="urse_purview list">
	
  <!-- START FORM TABLE-->
  <form action="<?php echo U('admin/Config/permissionsave');?>" method="post" autocomplete="off">
  <input type="hidden" name='user_group_id' value='<?php echo ($groupInfo["user_group_id"]); ?>'>
  <div class="pb10"><?php echo L('PUBLIC_CURRENT_USER_GROUP');?> <?php echo ($groupInfo["user_group_name"]); ?>:</div>	
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed ">
  <?php if(is_array($permission)): ?><?php $i = 0;?><?php $__LIST__ = $permission?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$p): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $app = $key; ?>
  <?php if($groupInfo['app_name'] == 'public' || $groupInfo['app_name'] == $app): ?>
  <tr>
    <th width="50"><?php echo ($p["info"]); ?></th>
    <?php if(is_array($p["module"])): ?><?php $i = 0;?><?php $__LIST__ = $p["module"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$minfo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><th  class="line_l"><?php echo ($moduleHash[$minfo['info']]); ?></th><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </tr>
  <tr>
  <td></td>
  <?php if(is_array($p["module"])): ?><?php $i = 0;?><?php $__LIST__ = $p["module"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$mrule): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $module = $key; ?>
   <td  class="line_l">
  	<?php if(is_array($mrule["rule"])): ?><?php $i = 0;?><?php $__LIST__ = $mrule["rule"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$rule): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $action = $key; ?>
   	<label><input type="checkbox" name='per[<?php echo ($app); ?>][<?php echo ($module); ?>][<?php echo ($action); ?>]' value='1'
		<?php if($grouppermission[$app][$module][$action] == 1){ echo 'checked="checked"';} ?> ><?php echo ($rule); ?></label><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?> 
   </td><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?> 
  </tr>
  <?php endif; ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
	</table>
      <div class="mt10">
        <input class="btn_b" type="submit" value="<?php echo L('PUBLIC_SUBMIT');?>">
        </input>
      </div>
    </form>
<!-- END FORM TABLE-->
  </div>

    </div>
    </div>
</div>
<?php if(!empty($onload)){ ?>
<script type="text/javascript">
/**
 * 初始化对象
 */
//表格样式
$(document).ready(function(){
    <?php foreach($onload as $v){ echo $v,';';} ?>
});
</script>
<?php } ?>
</body>
</html>