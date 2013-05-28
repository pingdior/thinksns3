<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(($_title)  !=  ""): ?><?php echo ($_title); ?><?php else: ?><?php echo ($site["site_name"]); ?>-<?php echo ($site["site_slogan"]); ?><?php endif; ?></title>
<meta content="<?php if(($_keywords)  !=  ""): ?><?php echo ($_keywords); ?><?php else: ?><?php echo ($site["site_header_keywords"]); ?><?php endif; ?>" name="keywords">
<meta content="<?php if(($_description)  !=  ""): ?><?php echo ($_description); ?><?php else: ?><?php echo ($site["site_header_description"]); ?><?php endif; ?>" name="description">
<?php echo Addons::hook('public_meta');?>
<link href="__THEME__/image/favicon.ico?v=<?php echo ($site["sys_version"]); ?>" type="image/x-icon" rel="shortcut icon">
<link href="__THEME__/css/global.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/module.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/menu.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/form.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/jquery.atwho.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<?php if(!empty($appCssList)): ?>
<?php if(is_array($appCssList)): ?><?php $i = 0;?><?php $__LIST__ = $appCssList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$cl): ?><?php ++$i;?><?php $mod = ($i % 2 )?><link href="<?php echo APP_PUBLIC_URL;?>/<?php echo ($cl); ?>?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css"/><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php endif; ?>
<script>
/**
 * 全局变量
 */
var SITE_URL  = '<?php echo SITE_URL; ?>';
var UPLOAD_URL= '<?php echo UPLOAD_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var MID		  = '<?php echo $mid; ?>';
var UID		  = '<?php echo $uid; ?>';
var initNums  =  '<?php echo $initNums; ?>';
var SYS_VERSION = '<?php echo $site["sys_version"]; ?>'
// Js语言变量
var LANG = new Array();
</script>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): ?><?php $i = 0;?><?php $__LIST__ = $langJsList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><script src="<?php echo ($vo); ?>?v=<?php echo ($site["sys_version"]); ?>"></script><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php } ?>
<script src="__THEME__/js/jquery-1.7.1.min.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.form.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/common.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/core.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/plugins/core.comment.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/module.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/module.common.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jwidget_1.0.0.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.atwho.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.caret.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/ui.core.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/ui.draggable.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<?php echo Addons::hook('public_head',array('uid'=>$uid));?>
</head>
<body>

<div id="body_page" name='body_page'>
    <div id="body-bg">
    <div id="header" name="header">
    	<?php echo constant(" 未登录时 *");?>
    	<?php if( !isset($_SESSION["mid"])): ?><div class="header-wrap">
        	<div class="head-bd">
                <!-- logo -->
                <div class="reg">
                    <a href="<?php echo U('public/Register');?>"><?php echo L('PUBLIC_REGISTER');?></a>
                    <i class="vline"> | </i>
                    <a href="<?php echo U('public/Passport/login');?>"><?php echo L('PUBLIC_LOGIN');?></a>
                </div>
                <div class="logo" <?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false): ?>style="_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ($site["logo"]); ?>', sizingMethod='crop');_background:none;"<?php else: ?>style="background:url(<?php echo ($site["logo"]); ?>) 50% 50% no-repeat;"<?php endif; ?>><a href="<?php echo SITE_URL;?>"></a></div>
                <!-- logo -->
            </div>
		</div><?php endif; ?>

		<?php echo constant(" 登录后 *");?>
		<?php if(isset($_SESSION["mid"])): ?><div class="header-wrap">
        	<div class="head-bd">
                <!-- logo -->
                <div class="logo" <?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false): ?>style="_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ($site["logo"]); ?>', sizingMethod='crop');_background:none;"<?php else: ?>style="background:url(<?php echo ($site["logo"]); ?>) no-repeat;"<?php endif; ?>>
                    <a href="<?php echo SITE_URL;?>"></a>
                </div>
                <!-- logo -->
                <?php if($user['is_init'] == 1): ?>
                <div class="nav">
                    <ul>
                        <?php if(is_array($site_top_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_top_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$st): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li <?php if(APP_NAME == $st['app_name'] || $_GET['page'] == $st['app_name']): ?> class="current" <?php endif; ?> ><a href="<?php echo ($st["url"]); ?>" target="<?php echo ($st["target"]); ?>" class="app"><?php echo ($st["navi_name"]); ?></a>
                            <?php if(isset($st['child'])): ?><div model-node="drop_menu_list" class="dropmenu" style="width:100px;display:none;">
                                <dl class="acc-list" >
                                    <?php if(is_array($st["child"])): ?><?php $i = 0;?><?php $__LIST__ = $st["child"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$stc): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a href="<?php echo ($stc["url"]); ?>" target="<?php echo ($stc["target"]); ?>"><?php echo (getShort($stc["navi_name"],6)); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                </dl>
                            </div><?php endif; ?>
                          </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                        <li style="*z-index:100;">
                        <!-- <a href="###" class="app">应用</a> -->
                        <div model-node="drop_menu_list" class="dropmenu" style="width:370px;left:-50px;display:none;z-index:100;">
                            <ul class="acc-list app-list clearfix">
                                <?php if(is_array($site_nav_apps)): ?><?php $i = 0;?><?php $__LIST__ = $site_nav_apps?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$li): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo U($li['app_name']);?>"><img src="<?php echo empty($li['icon_url_large']) ? APPS_URL.'/'.$li['app_name'].'/Appinfo/icon_app_large.png':$li['icon_url_large']; ?>" width="50" height="50" /><?php echo (getShort($li["app_alias"],4)); ?></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                <li><a href="<?php echo U('public/App/addapp');?>"><img src="__THEME__/image/more.png" width="50" height="50" />更多应用</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
                 <?php if(($user["is_init"])  ==  "0"): ?><div class="person">
                    <ul>
                        <li model-node="person" class="dorp-right"><a href="javascript:void(0);" class="app name" style="cursor:default">欢迎，<?php echo ($user['uname']); ?></a></li>
                        <li class="dorp-right"><a href="<?php echo U('public/Passport/logout');?>" class="app name">退出</a></li>
                    </ul>
                  </div>
                <?php else: ?>
                <div class="search">
                    <div id="mod-search" model-node="drop_search">
                    <form name="search_feed" id="search_feed" method="get" action="<?php echo U('public/Search/index');?>">
                        <input name="app" value="public" type="hidden"/>
                        <input name="mod" value="Search" type="hidden"/>
                        <input type="hidden" name="t" value="2"/>
                        <input type="hidden" name="a" value="public"/>
                        <dl>
                            <dt class="clearfix"><input id="search_input" class="s-txt left"  type="text" value="搜微博 / 昵称 / 标签" onfocus="this.value=''" onblur="setTimeout(function(){ $('#search-box').remove();} , 200);if(this.value=='') this.value='搜微博 / 昵称 / 标签';" event-node="searchKey" name='k'  autocomplete="off"><a href="javascript:void(0)" class="ico-search left" onclick="if(getLength($('#search_input').val()) && $('#search_input').val()!=='搜微博 / 昵称 / 标签'){ $('#search_feed').submit(); return false;}"></a>
                            </dt>
                        </dl>
                    </form>
                    </div>
                </div> 
                <div class="person">
                    <ul>
                        <li model-node="person" class="dorp-right">
                            <a href="<?php echo ($user['space_url']); ?>" class="username"><?php echo (getShort($user['uname'],6)); ?></a>
                        </li>                       
                        <li model-node="notice" class="dorp-right"><a href="javascript:void(0);" class="app"><?php echo L('PUBLIC_MESSAGE');?></a>
                            <div  class="dropmenu" model-node="drop_menu_list">
                            	<ul class="message_list_container message_list_new"  style="display:none">
                                    <li rel="new_folower_count" style="display:none">
                                        <span></span>，<a href="<?php echo U('public/Index/follower',array('uid'=>$mid));?>"><?php echo L('PUBLIC_FOLLOWERS_REMIND');?></a></li>
                                    <li rel="unread_comment" style="display:none"><span></span>，<a href="<?php echo U('public/Comment/index',array('type'=>'receive'));?>">
                                        <?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_message" style="display:none"><span></span>，<a href="<?php echo U('public/Message');?>" ><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_atme" style="display:none"><span></span>，<a href="<?php echo U('public/Mention');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_notify" style="display:none"><span></span>，<a href="<?php echo U('public/Message/notify');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                </ul>
                                <dl class="acc-list W-message" >
                                    <dd><a  href="<?php echo U('public/Mention/index');?>">@提到我的</a></dd>
                                    <dd><a  href="<?php echo U('public/Comment/index', array('type'=>'receive'));?>">收到的评论</a></dd>
                                    <dd><a  href="<?php echo U('public/Comment/index', array('type'=>'send'));?>">发出的评论</a></dd>
                                    <dd><a  href="<?php echo U('public/Message/index');?>">我的私信</a></dd>
                                    <dd><a  href="<?php echo U('public/Message/notify');?>">系统消息</a></dd>
                                    <?php if(CheckPermission('core_normal','send_message')){ ?>
                                <dd class="border"><a event-node="postMsg" href="javascript:void(0)" onclick="ui.sendmessage()"><?php echo L('PUBLIC_SEND_PRIVATE_MESSAGE');?>&raquo;</a></dd>
                                <?php } ?>
                                </dl>
                            </div>
                        </li>
                        <li model-node="account" class="dorp-right"><a href="javascript:void(0);" class="app"><?php echo L('PUBLIC_ACCOUNT');?></a>
                            <div model-node="drop_menu_list" class="dropmenu" style="width:100px">
                                <dl class="acc-list">
                                <dd><a href="<?php echo U('public/Account/index');?>"><?php echo L('PUBLIC_SETTING');?></a></dd>
                                
                                <?php if(CheckTaskSwitch()): ?>
                                <dd><a href="<?php echo U('public/Task/index');?>">任务中心</a></dd>
                                <dd><a href="<?php echo U('public/Medal/index');?>">勋章馆</a></dd>
                                <?php endif; ?>
                                
                                <dd><a href="<?php echo U('public/Rank/index','type=2');?>">排行榜</a></dd>
                                <?php if(isInvite() && CheckPermission('core_normal','invite_user')): ?>
                                <dd><a href="<?php echo U('public/Invite/invite');?>"><?php echo L('PUBLIC_INVITE_COLLEAGUE');?></a></dd>
                                <?php endif; ?>
                                <?php if(CheckPermission('core_admin','admin_login')){ ?>
                                <dd><a href="<?php echo U('admin');?>"><?php echo L('PUBLIC_SYSTEM_MANAGEMENT');?></a></dd>
                                <?php } ?>

                                <dd class="border"><a href="<?php echo U('public/Passport/logout');?>"><?php echo L('PUBLIC_LOGOUT');?>&raquo;</a></dd>
                                <dd></dd>
                                </dl>
                            </div>
                        </li>
                    </ul>
                </div>        
                <?php if(MODULE_NAME !='Register'): ?>
                <div id="message_container" class="layer-massage-box" style="display:none">
                	<ul class="message_list_container" >
                        <li rel="new_folower_count" style="display:none"><span></span>，<a href="<?php echo U('public/Index/follower',array('uid'=>$mid));?>"><?php echo L('PUBLIC_FOLLOWERS_REMIND');?></a></li>
                		<li rel="unread_comment" style="display:none"><span></span>，<a href="<?php echo U('public/Comment/index',array('type'=>'receive'));?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                        <li rel="unread_message" style="display:none"><span></span>，<a href="<?php echo U('public/Message');?>" ><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
 	                    <li rel="unread_atme" style="display:none"><span></span>，<a href="<?php echo U('public/Mention');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
     	                <li rel="unread_notify" style="display:none"><span></span>，<a href="<?php echo U('public/Message/notify');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                	</ul>
                <a href="javascript:void(0)" onclick="core.dropnotify.closeParentObj()" class="ico-close1"></a>
                </div>
                <?php endif; ?><?php endif; ?>
        	</div>
        </div>
        <?php if(MODULE_NAME != 'Search'): ?>
        <div id="search"  class="mod-at-wrap search_footer" model-node='search_footer' style="display:none;z-index:-1">
            <div class="search-wrap">
                <div class="input">
                     <form id="search_form" action="<?php echo U('public/Search/index');?>" method="GET">
                        <div class="search-menu" model-node='search_menu' model-args='a=<?php echo ($curApp); ?>&t=<?php echo ($curType); ?>'>
                            <a href="javascript:;" id='search_cur_menu'><?php echo (($curTypeName)?($curTypeName):"全站"); ?><i class="ico-more"></i></a>
                        </div>
                        <input name="app" value="public" type="hidden" />
                        <input name="mod" value="Search" type="hidden" />
                        <input name="a" value="<?php echo ($curApp); ?>" id='search_a' type="hidden"/>
                        <input name="t" value="<?php echo ($curType); ?>" id='search_t' type="hidden"/>
                        <input name="k" value="<?php echo (t($_GET['k'])); ?>" type="text" class="s-txt" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" autocomplete="off">
                        <a class="btn-red left" href="javascript:void(0);" onclick="$('#search_form').submit();"><span class="ico-search"></span></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="mod-at-wrap" id="search_menu" ison='no' style="display:none" model-node="search_menu_ul">
        <div class="mod-at">
            <div class="mod-at-list">
                <ul class="at-user-list">
                    <li onclick="core.search.doShowCurMenu(this)" a='public' t='' typename='<?php echo L('PUBLIC_ALL_WEBSITE');?>'><?php echo L('PUBLIC_ALL_WEBSITE');?></li>
                <?php if(is_array($menuList)): ?><?php $i = 0;?><?php $__LIST__ = $menuList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$m): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php if($m['app_name'] == $curApp && $m['type_id'] == $curType){
                            $curTypeName = $m['type'];
                        } ?>
                    <li onclick="core.search.doShowCurMenu(this)" a='<?php echo ($m["app_name"]); ?>' t='<?php echo ($m["type_id"]); ?>' typename='<?php echo ($m["type"]); ?>'><?php echo ($m["type"]); ?></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>   
                </ul>
            </div>
        </div>
        </div>
       <?php endif; ?> 
    <script type="text/javascript">
    $(document).ready(function(){
        $("#mod-product dd").hover(function() {
            $(this).addClass("hover");
        }, function() {
            $(this).removeClass("hover");
        });
        core.plugInit('search');
    });

    core.plugFunc('dropnotify',function(){
        setTimeout(function(){
            core.dropnotify.init('message_list_container','message_container');
        },320);   
    });

    </script><?php endif; ?>
    </div>
<?php //出现注册提示的页面
$show_register_tips = array('public/Profile','public/Topic','weiba/Index');
if(!$mid && in_array(APP_NAME.'/'.MODULE_NAME,$show_register_tips)){ ?>
<?php $registerConf = model('Xdata')->get('admin_Config:register'); ?>
<!--未登录前-->
<div class="login-no-bg">
  <div class="login-no-box boxShadow clearfix">       
    <div class="login-reg right">
        <?php if($registerConf['register_type'] == 'open'){ ?>
        <a href="<?php echo U('public/Register/index');?>" class="btn-reg">立即注册</a>
        <?php } ?>
        <span>已有帐号？<a href="javascript:quickLogin()">立即登录</a></span>
    </div>
    <p class="left"><span>欢迎来到<?php echo ($site["site_name"]); ?></span>赶紧注册与朋友们分享快乐点滴吧！</p>
  </div>
</div>
<?php } ?>

<link href="__APP__/weiba.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__APP__/weiba.js"></script>
    

<div id="page-wrap">
	   <div id="main-wrap">
        <div class="boxShadow"> 
	   	   	 <div class="find-type" style="height:26px;_overflow:hidden">
      <div class="app-title">
         <!--  <div class="search-input">
              <div id="mod-search" event-node="drop_weiba_search">
               <form name="search_weiba" id="search_weiba" method="get" action="<?php echo U('weiba/Index/search');?>">
                <a href=""><i class="ico-search"></i></a><input type="text" id="search_input" value="搜微吧 / 帖子" onfocus="this.value=''" event-node="searchKey"><a href="" class="btn-search"><span>搜索</span></a>
               </form>
              </div>
          </div> -->
          <div class="search-input" style="z-index:99;">
            <div id="mod-search" model-node="drop_weiba_search">
                <form name="search_weiba" id="search_weiba" method="post" action="<?php echo U('weiba/Index/search');?>">
                    <!-- <input name="app" value="public" type="hidden"/>
                    <input name="mod" value="Search" type="hidden"/>
                    <input type="hidden" name="t" value="2"/>
                    <input type="hidden" name="a" value="public"/> -->
                    <input type="hidden" name="type" value="2"/>
                    <dl>
                    <dt class="clearfix"><!--<i class="ico-search"></i>--><input autocomplete="off" id="searchweiba_input" class="s-txt left"  type="text" value="<?php if(!empty($searchkey)){ ?><?php echo ($searchkey); ?><?php }else{ ?>搜微吧 / 帖子<?php } ?>" onfocus="this.value=''" onblur="setTimeout(function(){ $('#search-box').remove();} , 200);if(this.value=='') this.value='搜微吧 / 帖子';" event-node="searchKey" name='k'><a href="javascript:void(0)" class="btn-search" onclick="if(getLength($('#searchweiba_input').val()) && $('#searchweiba_input').val()!=='搜微吧 / 帖子'){ $('#search_weiba').submit(); return false;}"><span>搜索</span></a></dt>
                    </dl>
                </form>
            </div>
          </div>
          <h4 class="left"><a href="<?php echo U('weiba/Index/index');?>"><img src="__APP__/images/ico-weib.gif" /></a>微吧</h4>
          <div class="app-tab-menu clearfix" style="margin:0 0 0 130px;_position:fixed">
            <ul>
              <li><a href="<?php echo U('weiba/Index/index');?>" <?php if(!$nav){ ?> class="current"<?php } ?>>首页<?php if(($nav)  ==  ""): ?><span class="triangle"></span><?php endif; ?></a><i class="line"></i></li>
              <!--  <li><a href="<?php echo U('weiba/Index/weibaList');?>" <?php if($nav=="weibalist"){ ?>class="current"<?php } ?>>微吧<?php if(($nav)  ==  "weibalist"): ?><span class="triangle"></span><?php endif; ?></a><?php if($GLOBALS['ts']['mid']){ ?><i class="line"></i><?php } ?></li>-->
              <?php if($GLOBALS['ts']['mid']){ ?>
              <li><a href="<?php echo U('weiba/Index/myWeiba');?>" <?php if($nav=="myweiba"){ ?>class="current"<?php } ?>>我的微吧<?php if(($nav)  ==  "myweiba"): ?><span class="triangle"></span><?php endif; ?></a></li>
              <?php } ?>
              <?php if($nav=="weibadetail"){ ?>
              <li><i class="line"></i><a href="<?php echo U('weiba/Index/detail',array('weiba_id'=>$weiba_id));?>" class="current"><span class="triangle"></span><?php echo ($weiba_name); ?></a></li>
              <?php } ?>
            </ul>
          </div>
      </div>      
</div>
           <!-- 微吧帖子中部 -->
            
	   	   	   <div class="clearfix content-bg">
                 <div id="col3" class="st-index-right">
                    <div class="right-wrap">
                        <div class="weiba-posts-list border-b mb20">
                         <h3>该作者发表的其他帖子</h3>
                         <ul>
                          <?php if(is_array($otherPost)): ?><?php $i = 0;?><?php $__LIST__ = $otherPost?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
                            <i class="ico-piece"></i><div class="post-name"><a href="<?php echo U('weiba/Index/postDetail',array('post_id'=>$vo['post_id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a><a href="<?php echo U('weiba/Index/detail',array('weiba_id'=>$vo['weiba_id']));?>" class="f9">【<?php echo ($vo["weiba"]); ?>】</a></div>
                            </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>  
                         </ul>
                       </div>
                       <div class="weiba-posts-list">
                         <h3>最新帖子</h3>
                         <ul>
                          <?php if(is_array($newPost)): ?><?php $i = 0;?><?php $__LIST__ = $newPost?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$v1): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
                            <i class="ico-piece"></i><div class="post-name"><a href="<?php echo U('weiba/Index/postDetail',array('post_id'=>$v1['post_id']));?>" target="_blank"><?php echo ($v1["title"]); ?></a><a href="<?php echo U('weiba/Index/detail',array('weiba_id'=>$v1['weiba_id']));?>" class="f9">【<?php echo ($v1["weiba"]); ?>】</a></div>
                            </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>        
                         </ul>
                       </div>
                      <!-- 微吧帖子右下 -->
                      <?php echo Addons::hook('show_ad_space', array('place'=>'weiba_post_right'));?>
                    </div>
                 </div>
                 <div id="col5" class="st-index-main">
                    <div class="extend-foot Posts-content">
                        <div class="content">
                            <p class="pb15 font-f-s"><a href="<?php echo U('weiba/Index/index');?>">微吧</a>&nbsp;>&nbsp;<a href="<?php echo U('weiba/Index/detail',array('weiba_id'=>$post_detail['weiba_id']));?>"><?php echo ($weiba_name); ?></a>&nbsp;>&nbsp;帖子详情</p>
                            <dl class="pb10 mb20 weiba-post-title">
                                <dd>
                                  <h3><span style="vertical-align:-1px;"><?php echo ($post_detail["title"]); ?></span><?php if(strstr($post_detail['content'],'<img>')){ ?><i class="ico-img"></i><?php } ?><?php if($post_detail['top']==2){ ?><i class="ico-bar-top ml5">置顶</i><?php } ?><?php if($post_detail['top']==1){ ?><i class="ico-bar-top0 ml5">置顶</i><?php } ?><?php if($post_detail['digest']==1){ ?><i class="ico-bar-fine ml5">精华</i><?php } ?></h3>
                                  <?php echo Addons::hook('show_ad_space', array('place'=>'weiba_post_top'));?>
                                  <p class="lh25">
                                    <span class="right">
                                    <?php if($GLOBALS['ts']['mid']){ ?>
                                      <?php if( ( $mid==$post_detail['post_uid'] && CheckPermission('weiba_normal','weiba_edit') ) || CheckWeibaPermission( $weiba_admin , '' , 'weiba_edit' ) ){ ?>
                                        <a href="<?php echo U('weiba/Index/postEdit',array('post_id'=>$post_detail['post_id']));?>">编辑</a>
                                        <i class="vline">|</i>
                                        <?php } ?>
                                        <?php if( ($mid==$post_detail['post_uid'] && CheckPermission('weiba_normal','weiba_del')) || CheckWeibaPermission($weiba_admin,'','weiba_del') ){ ?>
                                        <a href="#" event-node="post_del" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&log=0'>删除</a>
                                        <i class="vline">|</i>
                                        <?php } ?>
                                      <a event-args="sid=<?php echo ($post_detail['post_id']); ?>&stable=weiba_post&curtable=feed&curid=<?php echo ($post_detail['feed_id']); ?>&initHTML=&appname=weiba&cancomment=1&feedtype=weiba_post" href="javascript:void(0)" event-node="share">转发到微博</a>
                                        <i class="vline">|</i>
                                      <?php if($post_detail['favorite']==1){ ?>
                                        <a event-args="post_id=<?php echo ($post_detail['post_id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&post_uid=<?php echo ($post_detail['post_uid']); ?>" href="javascript:void(0)" event-node="post_unfavorite" id="favorite">取消收藏</a>
                                      <?php }else{ ?>
                                        <a event-args="post_id=<?php echo ($post_detail['post_id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&post_uid=<?php echo ($post_detail['post_uid']); ?>" href="javascript:void(0)" event-node="post_favorite" id="favorite">收藏</a>
                                      <?php } ?>
                                    </span>
                                    <?php echo ($user_info[$post_detail['post_uid']]['space_link']); ?><span class="pl5 pr5 f9">/</span><span class="f9"><?php echo (friendlyDate($post_detail["post_time"])); ?>发布</span>                                   
                                  <?php } ?>
                                  </p>
                                </dd>
                            </dl>
                            <div class="pb15 weiba-article"><p class="text"><?php echo ($post_detail["content"]); ?></p></div>
                            
                        </div>
                        <div class="reply">
                          <div style="position:relative;z-index:99" class="pb15 pt15">
                          <?php if($GLOBALS['ts']['mid']){ ?>
                                <?php if( $weiba_manage ){ ?>
                                <a href="javascript:void(0);" onclick="$('#post_manage').toggle();$('body').bind('click', function(event) {if($(event.target).attr('id') != 'manage') $('#post_manage').css('display', 'none')});" class="right" id="manage">管理</a>
                                <?php } ?>
                                  <span>
                                  <?php if( ($mid==$post_detail['post_uid'] && CheckPermission('weiba_normal','weiba_edit')) || CheckWeibaPermission( $weiba_admin , 0 , 'weiba_edit' ) ){ ?>
                                    <a href="<?php echo U('weiba/Index/postEdit',array('post_id'=>$post_detail['post_id']));?>">编辑</a>
                                    <i class="vline">|</i>
                                  <?php } ?>
                                  
                                    <?php if( ($mid==$post_detail['post_uid'] && CheckPermission('weiba_normal','weiba_del')) || CheckWeibaPermission( $weiba_admin , 0 , 'weiba_del' ) ){ ?>
                                    <a href="#" event-node="post_del" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&log=0'>删除</a>
                                    <i class="vline">|</i>
                                    <?php } ?>
                                  
                                  <a event-args="sid=<?php echo ($post_detail['post_id']); ?>&stable=weiba_post&curtable=feed&curid=<?php echo ($post_detail['feed_id']); ?>&initHTML=&appname=weiba&cancomment=1&feedtype=weiba_post" href="javascript:void(0)" event-node="share">转发到微博</a>
                                  <i class="vline">|</i>
                                  <?php if($post_detail['favorite']==1){ ?>
                                    <a event-args="post_id=<?php echo ($post_detail['post_id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&post_uid=<?php echo ($post_detail['post_uid']); ?>" href="javascript:void(0)" event-node="post_unfavorite" id="favorite">取消收藏</a>
                                  <?php }else{ ?>
                                    <a event-args="post_id=<?php echo ($post_detail['post_id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&post_uid=<?php echo ($post_detail['post_uid']); ?>" href="javascript:void(0)" event-node="post_favorite" id="favorite">收藏</a>
                                  <?php } ?>
                                  </span>
                           <?php } ?>
                                <div class="layer-list" style="position:absolute;right:0;top:35px;display:none;_right:20px;" id="post_manage">
                                   <ul>
                                      <?php if( CheckWeibaPermission('',0,'weiba_global_top') ){ ?>
                                        <li>
                                          <?php if($post_detail['top']==2){ ?><a style="width:75px" href="#" event-node="post_set" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&type=1&currentValue=<?php echo ($post_detail['top']); ?>&targetValue=0'>取消全局置顶</a><?php }else{ ?><a href="#" event-node="post_set" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&type=1&currentValue=<?php echo ($post_detail['top']); ?>&targetValue=2'>设为全局置顶</a><?php } ?>
                                        </li>
                                      <?php } ?>
                                      
                                      <?php if( CheckWeibaPermission ( $weiba_admin , 0 , 'weiba_top') ){ ?>
                                        <li>
                                          <?php if($post_detail['top']==1){ ?><a href="#" event-node="post_set" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&type=1&currentValue=<?php echo ($post_detail['top']); ?>&targetValue=0'>取消吧内置顶</a><?php }else{ ?><a href="#" event-node="post_set" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&type=1&currentValue=<?php echo ($post_detail['top']); ?>&targetValue=1'>设为吧内置顶</a><?php } ?>
                                        </li>
                                       <?php } ?>
                                       
                                        <?php if( CheckWeibaPermission ( $weiba_admin , 0 , 'weiba_marrow') ){ ?>
                                        <li>
                                          <?php if($post_detail['digest']==1){ ?><a href="#" event-node="post_set" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&type=2&currentValue=<?php echo ($post_detail['digest']); ?>&targetValue=0'>取消精华</a><?php }else{ ?><a href="#" event-node="post_set" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&type=2&currentValue=<?php echo ($post_detail['digest']); ?>&targetValue=1'>设为精华</a><?php } ?>
                                        </li>
                                        <?php } ?>
                                        <?php if( CheckWeibaPermission ( $weiba_admin , 0 , 'weiba_recommend') ){ ?>
                                        <li>
                                          <?php if($post_detail['recommend']==1){ ?><a href="#" event-node="post_set" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&type=3&currentValue=<?php echo ($post_detail['recommend']); ?>&targetValue=0'>取消推荐</a><?php }else{ ?><a href="#" event-node="post_set" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&type=3&currentValue=<?php echo ($post_detail['recommend']); ?>&targetValue=1'>设为推荐</a><?php } ?>
                                        </li>
                                      	<?php } ?>
                                      <?php if(CheckWeibaPermission( $weiba_admin , 0 , 'weiba_edit' )){ ?>
                                        <li>
                                          <a href="<?php echo U('weiba/Index/postEdit',array('post_id'=>$post_detail['post_id'],'log'=>1));?>">编辑</a>
                                        </li>
                                        <?php } ?>
                                        <?php if(CheckWeibaPermission( $weiba_admin , 0 , 'weiba_del' )){ ?>
                                        <li>
                                          <a href="#" event-node="post_del" event-args='post_id=<?php echo ($post_detail['post_id']); ?>&weiba_id=<?php echo ($post_detail['weiba_id']); ?>&log=1'>删除</a>
                                        </li>
                                        <?php } ?>
                                   </ul>
                                </div>
                            </div>
                            <div  class="feed_lists">
                            <dl class="feed_list feed_comment">
                              <dd class="content">
                              <?php if($GLOBALS['ts']['mid']){ ?>
                                  <div class="repeat clearfix pading">
                                      <?php echo W('WeibaReply',array('tpl'=>'detail', 'weiba_id'=>$post_detail['weiba_id'], 'post_id'=>$post_detail['post_id'], 'post_uid'=>$post_detail['post_uid'], 'feed_id'=>$post_detail['feed_id'], 'limit'=>'20', 'order'=>'DESC', 'addtoend'=>0));?>                                   
                                  </div>
                                  <?php } ?>
                              </dd>
                            </dl>
                          </div>
                            
                        </div> 
                     </div>
                 </div>
           	 </div>
          </div>
	   </div>
</div>
<script>
  var setype = function(post_id,type,curvalue){

  };
</script>
<div class="footer">
   <div class="login-footer">
    <?php if($site_bottom_child_nav){ ?>
      <div class="foot clearfix">
         <?php if(is_array($site_bottom_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_bottom_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$nv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl>
            <dt><a href="<?php echo ($nv["url"]); ?>" target="<?php echo ($nv["target"]); ?>"><?php echo ($nv['navi_name']); ?></a></dt>
            <?php if(is_array($nv["child"])): ?><?php $i = 0;?><?php $__LIST__ = $nv["child"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$cv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a href="<?php echo ($cv["url"]); ?>" target="<?php echo ($cv["target"]); ?>"><?php echo ($cv['navi_name']); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
         </dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </div>
    <?php } ?>
    <?php if(!$site_bottom_child_nav){ ?>
      <div class="foot foot1 clearfix">
         <?php if(is_array($site_bottom_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_bottom_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$nv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl>
            <dt><a href="<?php echo ($nv["url"]); ?>" target="<?php echo ($nv["target"]); ?>"><?php echo ($nv['navi_name']); ?></a></dt>
         </dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </div>
    <?php } ?>
    <!--  
    <p>
      <span class="right">Powered By <a href="http://www.thinksns.com" title="������������������,���������������" target="_blank">ThinkSNS</a></span>
      <?php echo ($GLOBALS["ts"]["site"]["site_footer"]); ?>
    </p>
    -->
  </div>
</div><!--footer end-->

</div><!--page end-->
<?php echo Addons::hook('public_footer');?>
<!-- ������������-->
<div id="site_analytics_code" style="display:none;">
<?php echo (base64_decode($site["site_analytics_code"])); ?>
</div>
<?php if(($site["site_online_count"])  ==  "1"): ?><script src="<?php echo SITE_URL;?>/online_check.php?uid=<?php echo ($mid); ?>&uname=<?php echo ($user["uname"]); ?>&mod=<?php echo MODULE_NAME;?>&app=<?php echo APP_NAME;?>&act=<?php echo ACTION_NAME;?>&action=trace"></script><?php endif; ?>
</body>
</html>