<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($ts['app']['app_alias']); ?> - <?php echo ($ts['site']['site_name']); ?>管理后台</title>
<link href="<?php echo APPS_URL;?>/admin/_static/admin.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/js/tbox/box.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<!-- <script type="text/javascript" src="__PUBLIC__/ts2/js/common.js"></script> -->
<script type="text/javascript" src="__PUBLIC__/js/core.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/tbox/box.js"></script>
</head>
<body>
  <div id="container" class="so_main">
    <div class="page_tit"><?php echo ($ts['app']['app_alias']); ?></div>
<div class="tit_tab">
<ul>
    <li><a <?php if((ACTION_NAME)  ==  "index"): ?>class="on"<?php endif; ?> href="__URL__&act=index">全局设置</a></li>
    <li><a <?php if((ACTION_NAME)  ==  "eventlist"): ?>class="on"<?php endif; ?> href="__URL__&act=eventlist"><?php echo ($ts['app']['app_alias']); ?>管理</a></li>
    <li><a <?php if((ACTION_NAME)  ==  "eventtype"): ?>class="on"<?php endif; ?> href="__URL__&act=eventtype"><?php echo ($ts['app']['app_alias']); ?>类型</a></li>
    <!--<li><a <?php if((ACTION_NAME)  ==  "recycle"): ?>class="on"<?php endif; ?> href="__URL__&act=recycle">回收站管理</a></li>-->
</ul>
</div>
      <form action ="<?php echo U('/Admin/doChangeBase');?>" method="POST" >
        <div class="form2 no_line">
          <dl class="lineD">
            <dt>
              每页显示<?php echo ($ts['app']['app_alias']); ?>数：
            </dt>
            <dd>              
              <input name="limitpage" class="txt" value ="<?php echo ($limitpage); ?>" />
              <p>设置<?php echo ($ts['app']['app_alias']); ?>列表页每页显示条数。默认为10条记录。</p>
            </dd>
          </dl>
          <!--<dl class="lineD">
            <dt>
                                      上传图片限制：
            </dt>
            <dd>              
              <input class="radio" type="radio" name="membel" value="1" <?php if( isset( $membel ) || $membel ){ ?> checked  <?php } ?>/>
               管理员 
              <input class="radio" type="radio" name="membel" value="0" <?php if( !isset( $membel ) || false == $membel ){ ?> checked  <?php } ?>/>
                成员
              <p>限制哪部分的人群可以上传图片。</p>
            </dd>
          </dl>-->        
          <!-- <dl class="lineD">
            <dt>
                                      上传图片大小限制：
            </dt>
            <dd>              
              <input name="limitphoto" class="txt" value ="<?php echo ($limitphoto); ?>" />MB
              <p>受php配置中对上传文件最小的限制影响，以最小的为标准，0为跟随php限制。</p>
            </dd>
          </dl> -->
          <!-- <dl class="lineD">
            <dt>
                                      上传图片格式限制：
            </dt>
            <dd>              
              <input name="limitsuffix" class="txt" value ="<?php echo ($limitsuffix); ?>" />
              <p>上传图片大小限制,以 ｜ 号分割,默认jpeg|gif|jpg|png。</p>
            </dd>
          </dl> -->
          <dl class="lineD">
            <dt>
              开启创建活动：
            </dt>
            <dd>
              <label><input class="radio" type="radio" name="canCreate" value="1" <?php if($canCreate){ ?> checked  <?php } ?>/>
                开启</label>
              <label><input class="radio" type="radio" name="canCreate" value="0" <?php if(!$canCreate){ ?> checked  <?php } ?>/>
                关闭</label>
              <p>是否开启创建活动。默认“开启”。</p>
            </dd>
          </dl>
          <dl class="lineD">
            <dt>
              积分限制：
            </dt>
            <dd>                                     
              <label>
              <select name="credit_type" id="ct">
                  <?php foreach($credit_types as $ct){
                       if($credit_type==$ct['name']) { ?>
                       <option value="<?php echo ($ct['name']); ?>" selected="selected"><?php echo ($ct['alias']); ?></option>
                  <?php } else { ?> 
                        <option value="<?php echo ($ct['name']); ?>"><?php echo ($ct['alias']); ?></option>
                  <?php }} ?>                   
              </select>
              </label>
              <input name="credit" class="txt" value ="<?php echo ($credit); ?>" /> 
              <p>创建者的积分必须大于设定积分才允许发起活动。默认为100经验。0则无任何限制。</p>
            </dd>
          </dl>
          <dl>
            <dt>
              注册时间限制：
            </dt>
            <dd>              
              <input name="limittime" class="txt" value ="<?php echo ($limittime); ?>" />小时
              <p>创建者的注册时间必须大于设定的注册时间才允许发起活动。默认24小时。0则不限制。</p>
            </dd>
          </dl>
          <div class="page_btm">
            <input type="submit" class="btn_b" value="确定" />
          </div>
        </div>
      </form>
  </div>
</body>
</html>