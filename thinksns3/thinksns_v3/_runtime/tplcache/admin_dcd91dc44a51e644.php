<?php if (!defined('THINK_PATH')) exit();?><?php if($isAjax): ?><?php echo Addons::addonsHook($name,$page);?>
<?php else: ?>
	<!DOCTYPE html>
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
	<div class="so_main">
		<div class="page_tit"><?php echo ($addonName); ?></div>
		<?php if($menu): ?><?php if(is_array($menu)): ?><div class="tit_tab">
				  	<ul>
				  	<?php if(is_array($menu)): ?><?php $i = 0;?><?php $__LIST__ = $menu?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php if(is_array($vo)): ?>
						<li><a href="<?php echo Addons::adminPage($key, $vo['param']);?>" <?php if($page == $key || $_GET['tabhash'] == $key){ ?>class="on"<?php } ?> ><?php echo ($vo["content"]); ?></a></li>
				  		<?php else: ?>
						<li><a href="<?php echo Addons::adminPage($key);?>" <?php if($page == $key || $_GET['tabhash'] == $key){ ?>class="on"<?php } ?> ><?php echo ($vo); ?></a></li>
				  		<?php endif; ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
				    </ul>
				</div><?php endif; ?>
			<?php echo Addons::addonsHook($name,$page,array(),true);?>
		<?php else: ?>
			<span><?php echo L('PUBLIC_PANEL_NOEXIST');?></span><?php endif; ?>
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
</html><?php endif; ?>