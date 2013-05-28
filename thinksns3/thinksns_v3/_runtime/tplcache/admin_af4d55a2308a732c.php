<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.s-txt {width:200px;}
.code-textarea {width:500px;height:200px;}
.pic-main {margin:0 0 0 0;width: 600px;}
.pic-main ul {width:600px;list-style:none;}
.pic-main li {float:left;width:200px;height:33px;text-align:center;line-height:33px}

.pic-size {height:150px;width:200px;} 

.ico-top, .ico-btm {background: url("__THEME__/admin/image/ico_top_btm.gif") no-repeat scroll 0 0 transparent;height:14px;width:12px;}
.ico-top, .ico-btm {display: inline-block;vertical-align: middle;}
.ico-top {background-position: -12px 0;}
.ico-btm {background-position: -24px 0;}
.ico-top:hover {background-position: 0 0;}
.ico-btm:hover {background-position: -35px 0;}

.ico-close-small {
  background: url("__THEME__/image/del.png") no-repeat 0 0;width:18px;height:18px;
  display: inline-block;
  overflow: hidden;
  vertical-align: 0;
  background-position: 0 -26px;
  width: 9px;
  height: 8px;
  cursor: pointer;
  _vertical-align:3px;
  _background:url("__THEME__/image/del.gif") no-repeat 0 0;
}
a.ico-close-small:hover {
  background-position: 0 -82px;
  width: 9px;
  height: 8px;
  cursor: pointer;
  _vertical-align: 3px;
}
.ml8 {
  margin-left: 8px;
}
</style>

<?php $AdSpaceAction = $editPage ? 'doEditAdSpace' : 'doAddAdSpace'; ?>
<form method="post" action="<?php echo Addons::adminUrl($AdSpaceAction);?>" enctype="multipart/form-data" autocomplete="off" onsubmit="return checkAdSpaceForm()" model-node='ad_post'>
  <div class="form2">
    <dl class="lineD">
      <dt><font color="red"> * </font>标题：</dt>
      <dd>
        <input type="text" class="s-txt" name="title" value="<?php echo ($data["title"]); ?>" />
      </dd>
    </dl>
    <dl class="lineD">
      <dt>位置：</dt>
      <dd>
        <select name="place">
          <?php !isset($data['place']) && $data['place'] = 0; ?>
          <?php if(is_array($placeArr)): ?><?php $i = 0;?><?php $__LIST__ = $placeArr?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><option value="<?php echo ($vo["id"]); ?>" <?php if(($data["place"])  ==  $vo["id"]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
        </select>
      </dd>
    </dl>
    <dl class="lineD">
      <dt>是否有效：</dt>
      <dd>
        <?php !isset($data['is_active']) && $data['is_active'] = 1; ?>
        <label><input type="radio" name="is_active" value="1" <?php if(($data["is_active"])  ==  "1"): ?>checked<?php endif; ?> />是</label>
        <label><input type="radio" name="is_active" value="0" <?php if(($data["is_active"])  ==  "0"): ?>checked<?php endif; ?> />否</label>
      </dd>
    </dl>
    <dl class="lineD">
      <dt>广告类型：</dt>
      <dd>
        <?php if($editPage): ?>
          <?php switch($data["display_type"]): ?><?php case "1":  ?>HTML<?php break;?>
            <?php case "2":  ?>代码<?php break;?>
            <?php case "3":  ?>轮播<?php break;?><?php endswitch;?>
          <input type="hidden" name="display_type" value="<?php echo ($data['display_type']); ?>" />
        <?php else: ?>
          <?php !isset($data['display_type']) && $data['display_type'] = 1; ?>
          <label><input type="radio" onclick="showDisplayType('html')" name="display_type" value="1" <?php if(($data["display_type"])  ==  "1"): ?>checked<?php endif; ?> />HTML</label>
          <label><input type="radio" onclick="showDisplayType('code')" name="display_type" value="2" <?php if(($data["display_type"])  ==  "2"): ?>checked<?php endif; ?> />代码</label>
          <label><input type="radio" onclick="showDisplayType('pic')" name="display_type" value="3" <?php if(($data["display_type"])  ==  "3"): ?>checked<?php endif; ?> />轮播</label>
        <?php endif; ?>
      </dd>
    </dl>
    <dl class="lineD" id="html_form" <?php if(($data["display_type"])  !=  "1"): ?>style="display:none;"<?php endif; ?>>
      <dt></dt>
      <dd>
        <?php echo W('Editor',array('width'=>'90%','height'=>'200','contentName'=>'html_form','value'=>$data['content']));?> 
      </dd>
    </dl>
    <dl class="lineD" id="code_form" <?php if(($data["display_type"])  !=  "2"): ?>style="display:none;"<?php endif; ?>>
      <dt></dt>
      <dd>
        <textarea class="code-textarea" name="code_form"><?php echo ($data["content"]); ?></textarea>
      </dd>
    </dl>
    <dl class="lineD" id="pic_form" <?php if(($data["display_type"])  !=  "3"): ?>style="display:none;"<?php endif; ?>>
      <dt></dt>
      <dd>
        <div class="pic-main" id="div_pic_list">
          <div>
            <ul>
              <li>图片地址</li>
              <li>链接地址</li>
              <li>操作</li>
            </ul>
          </div>
          <?php if(empty($data['content'])): ?>
          <div class="div_pic_1">
            <ul>
              <li style="height:200px;">
                <input type="file" name="attach" onchange="admin.upload(1, this)" urlquery="attach_type=ad_image&upload_type=image&thumb=1" />
                <div id="show_1"></div>
                <input type="hidden" name="banner[]" id="form_1" value="" />
              </li>
              <li style="height:200px;"><input type="text" name="bannerurl[]" class="s-txt" /></li>
              <li style="height:200px;"><a class="ico-top" href="javascript:;" onclick="movePic(1, 'up')"></a><a class="ico-btm ml8" href="javascript:;" onclick="movePic(1, 'down')"></a><a class="ico-close-small ml8" href="javascript:;" onclick="closePic(1)"></a></li>
            </ul>
          </div>
          <?php else: ?>
          <?php if(is_array($data["content"])): ?><?php $i = 0;?><?php $__LIST__ = $data["content"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><div class="div_pic_<?php echo ($i); ?>">
            <ul>
              <li style="height:200px;">
                <input type="file" name="attach" onchange="admin.upload(<?php echo ($i); ?>, this)" urlquery="attach_type=ad_image&upload_type=image&thumb=1" />
                <div id="show_<?php echo ($i); ?>"><img class="pic-size" src="<?php echo ($vo["bannerpic"]); ?>"></div>
                <input type="hidden" name="banner[]" id="form_<?php echo ($i); ?>" value="<?php echo ($vo["banner"]); ?>" />
              </li>
              <li style="height:200px;"><input type="text" name="bannerurl[]" class="s-txt" value="<?php echo ($vo["bannerurl"]); ?>" /></li>
              <li style="height:200px;"><a class="ico-top" href="javascript:;" onclick="movePic(<?php echo ($i); ?>, 'up')"></a><a class="ico-btm ml8" href="javascript:;" onclick="movePic(<?php echo ($i); ?>, 'down')"></a><a class="ico-close-small ml8" href="javascript:;" onclick="closePic(<?php echo ($i); ?>)"></a></li>
            </ul>
          </div><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
          <?php endif; ?>
        </div>
        <a stlyle="float:right;" href="javascript:;" onclick="addPic()">添加</a>
      </dd>
    </dl>
    <?php if(($AdSpaceAction)  ==  "doEditAdSpace"): ?><input type="hidden" name="ad_id" value="<?php echo ($data['ad_id']); ?>" />
      <input type="hidden" name="jumpUrl" value="<?php echo Addons::adminPage('config');?>" /><?php endif; ?>
    <div class="page_btm">
      <input type="submit" value="保存" class="btn_b" event-node="submit_btn"/>
    </div>
  </div>
</form>

<script type="text/javascript">
/**
 * 异步提交表单
 * @param object form 表单DOM对象
 * @return void
 */
var ajaxSubmit = function(form) {
  var args = M.getModelArgs(form);
  M.getJS(THEME_URL + '/js/jquery.form.js', function() {
        var options = {
          dataType: "json",
            success: function(txt) {
            if(1 == txt.status) {
              if("function" ===  typeof form.callback) {
                form.callback(txt);
              } else {
                if("string" == typeof(args.callback)) {
                  eval(args.callback+'()');
                } else {
                  ui.success(txt.info);
                }
              }
            } else {
              ui.error(txt.info);
            }
            }
        };
        $(form).ajaxSubmit(options);
  });
};

/**
 * 处理ajax返回数据之后的刷新操作
 */
var ajaxReload = function(obj,callback){
    if("undefined" == typeof(callback)){
        callback = "location.href = location.href";
    }else{
        callback = 'eval('+callback+')';
    }
    if(obj.status == 1){
        ui.success(obj.data);
        setTimeout(callback,1500);
     }else{
        ui.error(obj.data);
    }
};

M.addEventFns({
  submit_btn: {
    click: function(){
      E.sync();
          // 判断标题数据正确性
      if($.trim($('input[name="title"]').val()) == '') {
        ui.error('标题不能为空');
        return false;
      }
      // 验证内容数据正确性
      var displayType = 0;
      if($('input[name="display_type"]').length == 1) {
        displayType = parseInt($('input[name="display_type"]').val());
      } else {
        $('input[name="display_type"]').each(function(i, n) {
          if($(this).attr('checked')) {
            displayType = parseInt($(this).val());
          }
        });
      }
      switch(displayType) {
        case 1:
          if($.trim(E.getData()) == '') {
            ui.error('HTML内容不能为空');
            return false;
          }
          break;
        case 2:
          if($.trim($('textarea[name="code_form"]').val()) == '') {
            ui.error('代码内容不能为空');
            return false;
          }
          break;
        case 3:
          var status = true;
          $('#div_pic_list').find('input').each(function(i, n) {
            if($(this).attr('name') == 'banner[]' || $(this).attr('name') == 'bannerurl[]') {
              if($.trim($(this).val()) == '') {
                status = false;
                return false;
              }
            }
          });
          if($('#div_pic_list > div').length < 2) {
            status = false;
          }
          if(!status) {
            ui.error('轮播内容不能为空');
            return false;
          }
          break;
      }
      // var args  = M.getEventArgs(this);
      // if ( args.info && ! confirm( args.info )) {
      //   return false;
      // }
      // try{
      //   (function( node ) {
      //     var parent = node.parentNode;
      //     // 判断node 类型，防止意外循环
      //     if ( "FORM" === parent.nodeName ) {
      //       if ( "false" === args.ajax ) {
      //         ( ( "function" !== typeof parent.onsubmit ) || ( false !== parent.onsubmit() ) ) && parent.submit();
      //       } else {
      //         ajaxSubmit(parent);
      //       }
      //     } else if ( 1 === parent.nodeType ) {
      //       arguments.callee( parent );
      //     }
      //   })(this);
      // }catch(e){
      //   return true;
      // }
      return true;
    }
  }

});

M.addModelFns({
  ad_post:{  //发布帖子
    callback:function(txt){
      ui.success('发布成功');
      setTimeout(function() {
        location.href = txt.data['jumpUrl'];
      }, 500);
    }
  }
});

/**
 * 显示类型相关表单内容
 * @param string type 表单类型，html/code/pic
 * @return void
 */
var showDisplayType = function(type)
{
  switch(type) {
    case 'html':
      $('#html_form').show();
      $('#code_form').hide();
      $('#pic_form').hide();
      break;
    case 'code':
      $('#html_form').hide();
      $('#code_form').show();
      $('#pic_form').hide();
      break;
    case 'pic':
      $('#html_form').hide();
      $('#code_form').hide();
      $('#pic_form').show();
      break;
  }
  return false;
}


var clickNum = $('#div_pic_list').children('div').length - 1;
/**
 * 添加轮循图片输入表单
 * @return void
 */
var addPic = function()
{
  var $pic = $('#div_pic_list');
  var max = 5;
  if($pic.children('div').length > max) {
    alert('最多只能添加'+max+'张图片');
    return false;
  }
  clickNum++;
  var divId = clickNum;
  var html = '<div class="div_pic_'+divId+'">\
              <li style="height:200px;">\
                <input type="file" name="attach" onchange="admin.upload('+divId+', this)" urlquery="attach_type=ad_image&upload_type=image&thumb=1" />\
                <div id="show_'+divId+'"></div>\
                <input type="hidden" name="banner[]" id="form_'+divId+'" value="" />\
              </li>\
              <li style="height:200px;"><input type="text" name="bannerurl[]" class="s-txt" /></li>\
              <li style="height:200px;"><a class="ico-top" href="javascript:;" onclick="movePic('+divId+',\'up\')"></a><a class="ico-btm ml8" href="javascript:;" onclick="movePic('+divId+',\'down\')"></a><a class="ico-close-small ml8" href="javascript:;" onclick="closePic('+divId+')"></a></li>\
              </div>';
  $pic.append(html);
  return false;
};
/**
 * 删除轮循图片输入表单
 * @param integer divId 表单ID
 * @return void
 */
var closePic = function(divId)
{
  $divPic = $('.div_pic_'+divId);
  $divPic.remove();
};
/**
 * 移动轮循图片输入表单
 * @param integer divId 表单ID
 * @param string type 移动类型，up or down
 * @return void
 */
var movePic = function(divId, type)
{
  $divPic = $('.div_pic_'+divId);
  var divLen = parseInt($divPic.prevAll('div').length);
  switch(type) {
    case 'up':
      divLen != 1 && $('#div_pic_list').children('div').eq(divLen - 1).before($divPic);
      break;
    case 'down':
      divLen != 5 && $('#div_pic_list').children('div').eq(divLen + 1).after($divPic);
      break;
  }
  return false;
};
/**
 * 轮循图片上传图片
 * @param object obj 点击DOM对象
 * @return void
 */
var uploadPic = function(obj, divId)
{
  var urlquery = $(obj).attr('urlquery');
  core.loadFile(THEME_URL+'/js/jquery.form.js', function() {
    var parentForm = document.createElement('form');
    parentForm.method = 'post';
    parentForm.action = U('widget/Upload/save')+'&'+urlquery;
    $(parentForm).html($(obj).clone());
    $(parentForm).ajaxSubmit({
      dataType: 'json',
      success: function(res) {
        $('#banner_hidden_'+divId).val(res.data.attach_id);
      }
    });
  });
};
// /**
//  * 验证表单数据正确性
//  * @return boolean 数据是否正确
//  */
// var checkAdSpaceForm = function()
// {
//   // 判断标题数据正确性
//   if($.trim($('input[name="title"]').val()) == '') {
//     ui.error('标题不能为空');
//     return false;
//   }
//   // 验证内容数据正确性
//   var displayType = 0;
//   if($('input[name="display_type"]').length == 1) {
//     displayType = parseInt($('input[name="display_type"]').val());
//   } else {
//     $('input[name="display_type"]').each(function(i, n) {
//       if($(this).attr('checked')) {
//         displayType = parseInt($(this).val());
//       }
//     });
//   }
//   switch(displayType) {
//     case 1:
//       if($.trim(E.getData()) == '') {
//         ui.error('HTML内容不能为空');
//         return false;
//       }
//       break;
//     case 2:
//       if($.trim($('textarea[name="code_form"]').val()) == '') {
//         ui.error('代码内容不能为空');
//         return false;
//       }
//       break;
//     case 3:
//       var status = true;
//       $('#div_pic_list').find('input').each(function(i, n) {
//         if($(this).attr('name') == 'banner[]' || $(this).attr('name') == 'bannerurl[]') {
//           if($.trim($(this).val()) == '') {
//             status = false;
//             return false;
//           }
//         }
//       });
//       if($('#div_pic_list > div').length < 2) {
//         status = false;
//       }
//       if(!status) {
//         ui.error('轮播内容不能为空');
//         return false;
//       }
//       break;
//   }

//   return true;
// };
</script>