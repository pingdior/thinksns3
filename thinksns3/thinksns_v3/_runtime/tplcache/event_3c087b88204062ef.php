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
<script>
function getChecked() {
    var ids = new Array();
    $.each($('table input:checked'), function(i, n){
        ids.push( $(n).val() );
    });
    return ids;
}

function checkon(o){
    if( o.checked == true ){
        $(o).parents('tr').addClass('bg_on') ;
    }else{
        $(o).parents('tr').removeClass('bg_on') ;
    }
}

function checkAll(o){
    if( o.checked == true ){
        $('input[name="checkbox"]').attr('checked','true');
        $('tr[overstyle="on"]').addClass("bg_on");
    }else{
        $('input[name="checkbox"]').removeAttr('checked');
        $('tr[overstyle="on"]').removeClass("bg_on");
    }
}

//搜索用户
var isSearchHidden = <?php if(($isSearch)  !=  "1"): ?>1<?php else: ?>0<?php endif; ?>;
function searchObject() {
    if(isSearchHidden == 1) {
        $("#searchObject_div").slideDown("fast");
        $(".searchObject_action").html("搜索完毕");
        isSearchHidden = 0;
    }else {
        $("#searchObject_div").slideUp("fast");
        $(".searchObject_action").html("搜索活动");
        isSearchHidden = 1;
    }
}

var ctrl = function(){
}
ctrl.prototype = {
    del:function(id){
        var id = id ? id : getChecked();
        id = id.toString();
        if(id=='' || id==0){
        	alert('请选择要删除的活动！');return false;
        }
        if( confirm("是否删除<?php echo ($ts['app']['app_alias']); ?>？") ){
          $.post( '__URL__&act=doDeleteEvent',{id:id},function(text ){
              if( text == 1 ){
                  ui.success( "删除多个<?php echo ($ts['app']['app_alias']); ?>成功" );
                  var id_list = id.split( ',' );   
                  for (var j=0 ; j< id_list.length ; j++   ){
                      $('#list_'+id_list[j]).remove(); 
                  }
              }else if( text == 2 ){
                  ui.success( "删除成功" );
                  $('#list_'+id).remove();
              }else{
                  ui.error( "删除失败" );
              }
          });
        }
    },
    transfer:function(id){
      var id = id ? id : getChecked();
      id = id.toString();
      if(id=='' || id==0){
      	alert('请选择要转移的活动！');return false;
      }
      ui.box.load('__URL__&act=transferEventTab&id='+id,'活动分类转移');
    },
    edit:function(id,act){
      if( act == 'recommend' ){
          v= "推荐";
          v2 = "取消推荐";
          act2 = 'cancel';
        
      }else{
          v = "取消推荐";
          v2 = "推荐";
          act2 = 'recommend';
      }
      if( confirm( '是否'+v ) ){
        $.post('__URL__&act=doChangeIsHot',{id:id,type:act},function( text ){
              if( text == 1 ){
              ui.success( "操作成功" );
              $('#button'+id).html('<a href="javascript:void(0);" onclick="c.edit('+id+',\''+act2+'\')">'+v2+'</a>');
           }else{alert(text);
              ui.error( "设置失败" );}
        });
      }
    }
}
var c = null;
</script>
<script  type="text/javascript" src="__PUBLIC__/js/rcalendar.js" ></script>
<div class="so_main">
  <div class="page_tit"><?php echo ($ts['app']['app_alias']); ?></div>
<div class="tit_tab">
<ul>
    <li><a <?php if((ACTION_NAME)  ==  "index"): ?>class="on"<?php endif; ?> href="__URL__&act=index">全局设置</a></li>
    <li><a <?php if((ACTION_NAME)  ==  "eventlist"): ?>class="on"<?php endif; ?> href="__URL__&act=eventlist"><?php echo ($ts['app']['app_alias']); ?>管理</a></li>
    <li><a <?php if((ACTION_NAME)  ==  "eventtype"): ?>class="on"<?php endif; ?> href="__URL__&act=eventtype"><?php echo ($ts['app']['app_alias']); ?>类型</a></li>
    <!--<li><a <?php if((ACTION_NAME)  ==  "recycle"): ?>class="on"<?php endif; ?> href="__URL__&act=recycle">回收站管理</a></li>-->
</ul>
</div>

    <div id="searchObject_div" <?php if(($isSearch)  !=  "1"): ?>style="display:none;"<?php endif; ?>>
    <div class="page_tit">搜索<?php echo ($ts['app']['app_alias']); ?> [ <a href="javascript:void(0);" onclick="searchObject();">隐藏</a> ]</div>
    <div class="form2">
    <form action="__URL__&act=eventlist" method="POST">
    <input type="hidden" name="isSearch" value="1"/>
        <?php if($isSearch != '1') $uid = ''; ?>
        <dl class="lineD">
          <dt>用户ID：</dt>
          <dd>
            <input name="uid" class="txt" value="<?php echo ($uid); ?>">
          </dd>
        </dl>
        <dl class="lineD">
          <dt><?php echo ($ts['app']['app_alias']); ?>ID：</dt>
          <dd>
            <input name="id" class="txt" value="<?php echo ($id); ?>">
          </dd>
        </dl>
        <dl class="lineD">
          <dt><?php echo ($ts['app']['app_alias']); ?>标题：</dt>
          <dd>
            <input name="title" class="txt" value="<?php echo ($title); ?>" /><span> 支持模糊查询。</span>
          </dd>
        </dl>
        <dl class="lineD">
          <dt><?php echo ($ts['app']['app_alias']); ?>类别：</dt>
          <dd>
            <select name="type">
              <option value="">全部</option>
              <?php foreach($type_list as $k=>$t){ ?>
                    <option value="<?php echo ($k); ?>"><?php echo ($t); ?></option>
              <?php } ?>
            </select>
          </dd>
        </dl>
        <dl class="lineD">
          <dt>发表时间：</dt>
           <dd>
           <div class="c2">
			<input name="sTime" type="text" class="text" id="sTime" value="<?php echo ($sTime); ?>" onfocus="this.className='text2';rcalendar(this,'full');" onblur="this.className='text'" readonly />-
			<input name="eTime" type="text" class="text" id="eTime" value="<?php echo ($eTime); ?>" onfocus="this.className='text2';rcalendar(this,'full');" onblur="this.className='text'" readonly />
            </div>
          <div class="c"></div>
          </dd>
        </dl>
        <dl>
          <dt>结果排序：</dt>
          <dd>
            <select name="sorder">
              <option value = "cTime">时间排序</option>
              <option value = "id">发布id排序</option>
            </select>
            <select name="eorder">
              <option value = "DESC">降序</option>
              <option value = "ASC" >升序</option>
            </select>
            <select name="limit">
              <option value = "10">每页显示10条</option>
              <option value = "20">每页显示20条</option>
              <option value = "30">每页显示30条</option>
              <option value = "100">每页显示100条</option>
            </select>
          </dd>
        </dl>
        <div class="page_btm">
          <input type="submit" class="btn_b" value="确定" />
        </div>
    </form>
    </div>
    </div>    
    <div class="Toolbar_inbox">
        <div class="page right"><?php echo ($html); ?></div>
        <a href="javascript:void(0);" class="btn_a" onclick="searchObject();">
            <span class="searchObject_action"><?php if(($isSearch)  !=  "1"): ?>搜索<?php echo ($ts['app']['app_alias']); ?><?php else: ?>搜索完毕<?php endif; ?></span>
        </a>
        <a href="javascript:void(0);" class="btn_a" onclick="c.del()"><span>删除<?php echo ($ts['app']['app_alias']); ?></span></a>
        <a href="javascript:void(0);" class="btn_a" onclick="c.transfer()"><span>转移<?php echo ($ts['app']['app_alias']); ?></span></a>
    </div>

    <div class="list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th style="width:30px;">
                <input type="checkbox" id="checkbox_handle" onclick="checkAll(this)" value="0">
                <label for="checkbox"></label>
            </th>
            <th>ID</th>
            <th><?php echo ($ts['app']['app_alias']); ?>标题</th>
            <th>发起者</th>
            <th>参与/关注</th>
            <th>城市</th>
            <th>发起时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
          <?php if(is_array($data)): ?><?php $i = 0;?><?php $__LIST__ = $data?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><tr id="list_<?php echo ($vo["id"]); ?>">
            <td><input type="checkbox" name="checkbox" id="checkbox2" onclick="checkon(this)" value="<?php echo ($vo["id"]); ?>"></td>
            <td><?php echo ($vo["id"]); ?></td>
            <td><a href="<?php echo U('//eventDetail',array('id'=>$vo['id'],'uid'=>$vo['uid']));?>" target="_blank"><?php echo ($vo['title']); ?></a> <span class="cGray2 type_<?php echo ($vo["id"]); ?>">[<?php echo ($vo['type']); ?>]</span></td>
            <td><?php echo (getUserName($vo["uid"])); ?></td>
            <td><?php echo ($vo['joinCount']); ?>/<?php echo ($vo['attentionCount']); ?></td>
            <td><?php echo ($vo['city']); ?></td>
            <td><?php echo (friendlyDate($vo['cTime'])); ?></td>
            <td class="cGreen"><?php echo ($vo['deadline']>time())?'进行中...':'已结束!'; ?></td>
            <td>
              <?php if( $vo['isHot'] ){
                $button = '取消推荐';
                $act    = 'cancel';
              }else{
                $button = '推荐';
                $act    = 'recommend';
              } ?>
              <span id="button<?php echo ($vo['id']); ?>" ><a href="javascript:void(0);" onclick="c.edit(<?php echo ($vo['id']); ?>,'<?php echo ($act); ?>')"><?php echo ($button); ?></a></span>
              <a href="javascript:void(0);" onclick="c.transfer(<?php echo ($vo['id']); ?>)">转移</a>
              <a href="javascript:void(0);" onclick="c.del(<?php echo ($vo['id']); ?>)">删除</a>
            </td>
          </tr><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
        </table>
    </div>
    
    <div class="Toolbar_inbox">
        <div class="page right"><?php echo ($html); ?></div>
        <a href="javascript:void(0);" class="btn_a" onclick="searchObject();">
            <span class="searchObject_action"><?php if(($isSearch)  !=  "1"): ?>搜索<?php echo ($ts['app']['app_alias']); ?><?php else: ?>搜索完毕<?php endif; ?></span>
        </a>
        <a href="javascript:void(0);" class="btn_a" onclick="c.del()"><span>删除<?php echo ($ts['app']['app_alias']); ?></span></a>
        <a href="javascript:void(0);" class="btn_a" onclick="c.transfer()"><span>转移<?php echo ($ts['app']['app_alias']); ?></span></a>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
$( function(){
   $( "select[name='type']" ).val("<?php echo ($type); ?>");
   $( "select[name='sorder']" ).val("<?php echo ($sorder); ?>");
   $( "select[name='eorder']" ).val("<?php echo ($eorder); ?>");
   $( "select[name='limit']" ).val("<?php echo ($limit); ?>");
});
c = new ctrl();
</script>