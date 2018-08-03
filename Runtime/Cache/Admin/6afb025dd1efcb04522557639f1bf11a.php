<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimal-ui">
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <meta name="wap-font-scale" content="no">  <!--解决UC字体忽然变大-->
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    
        <?php if(!empty($page["title"])): ?><title><?php echo ($page["title"]); ?></title>
            <?php else: ?>
            <title><?php echo ($setting["sitename"]); ?></title><?php endif; ?>
    
    <?php if(!empty($page["keywords"])): ?><meta name="keywords" content="<?php echo ($page["keywords"]); ?>"/>
        <?php else: ?>
        <meta name="keywords" content="<?php echo ($setting["keywords"]); ?>"/><?php endif; ?>
    <?php if(!empty($page["description"])): ?><meta property="description" name="description" content="<?php echo ($page["description"]); ?>"/>
        <?php else: ?>
        <meta property="description" name="description" content="<?php echo ($setting["description"]); ?>"/><?php endif; ?>

    
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--bootstrap组件--><link rel="stylesheet" href="/Public/bootstrap/bootstrap.min.css" ><script src="/Public/bootstrap/jquery.min.js" ></script><script src="/Public/bootstrap/popper.min.js"></script><script src="/Public/bootstrap/bootstrap.min.js"></script><!--awesome字体--><link href="/Public/bootstrap/font/css/font-awesome.min.css" rel="stylesheet"><!--bootstrap-dialog--><script src="/Public/bootstrap/bootstrap.dialog.js"></script><!--拖拽--><!--<script type="text/javascript" src="/Public/Plugs/jq/jquery-ui.min.js"></script>--><!--文件上传--><!--<link rel="stylesheet" type="text/css" href="/Public/Plugs/uploadify/uploadify.css"><script type="text/javascript" src="/Public/Plugs/uploadify/jquery.uploadify.min.js"></script>--><!--滚动条--><!--<link rel="stylesheet" type="text/css" href="/Public/Plugs/mCustomScrollbar/jquery.mCustomScrollbar.css"/><script type="text/javascript" src="/Public/Plugs/mCustomScrollbar/jquery.mCustomScrollbar.js"></script>--><!--颜色选择器--><link rel="stylesheet" type="text/css" href="/Public/Plugs/spectrum/spectrum.css"><script type="text/javascript" src="/Public/Plugs/spectrum/spectrum.js"></script><!--弹出框--><script type="text/javascript" src="/Public/Plugs/jq/jquery-dialog.js"></script><!--新日历控件,来源  http://blog.csdn.net/binyao02123202/article/details/42066035--><!--<link rel="stylesheet" type="text/css" href="/Public/Plugs/calendar/cxcalendar.css"/><script type="text/javascript" src="/Public/Plugs/calendar/calendar.js"></script>--><!--日期选择器插件datetimepicker--><link rel="stylesheet" href="/Public/Plugs/flatpickr/flatpickr.min.css"><script type="text/javascript" src="/Public/Plugs/flatpickr/flatpickr.js"></script><script type="text/javascript" src="/Public/Plugs/flatpickr/zh.js?v=3"></script><!--文件上传-插件地址：https://github.com/danielm/uploader--><script src="/Public/Plugs/dmuploader/jquery.dm-uploader.js"></script><!--ueditor--><script type="text/javascript" src="/Public/Plugs/ueditor/ueditor.config.js"></script><script type="text/javascript" src="/Public/Plugs/ueditor/ueditor.all.js"></script><link rel="stylesheet" type="text/css" href="/Public/Plugs/ueditor/third-party/video-js/video-js.css"><script type="text/javascript" src="/Public/Plugs/ueditor/third-party/video-js/video.js"></script><!--app--><link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css"/><script type="text/javascript" src="/Public/Admin/js/common_admin.js"></script>
    
</head>
<body>

<div class="g-page-in">
        <div class="u-breadcrumb">        <a class="back" href="javascript:history.back()" ><span class="fa fa-chevron-left"></span> 后退</a>        <a class="back" href="javascript:window.location.reload()" ><span class="fa fa-repeat"></span> 刷新</a>        <span class="name">新增字段</span>    </div>    <div class="h15"></div>    <form action="" method="post">        <input type="hidden" name="type" value="1" />        <div class="form-group">            <label><span class="text-danger">* </span>字段名称</label>            <input type="text" class="form-control" name="name" placeholder="分类名称" value="<?php echo ($page["name"]); ?>" style="width:400px;">            <small class="form-text text-muted">中文名，如"商品颜色"</small>        </div>        <div class="form-group">            <label><span class="text-danger">* </span>字段标识</label>            <input type="text" class="form-control" name="key" placeholder="字段标识" value="<?php echo ($page["key"]); ?>" style="width:400px;">            <small class="form-text text-muted">键值：如"color"</small>        </div>        <div class="form-group">            <label>字段值</label>            <input type="text" class="form-control" name="value" placeholder="字段值" value="<?php echo ($page["value"]); ?>" style="width:400px;">            <small class="form-text text-muted"></small>        </div>        <div class="form-group">            <label><span class="text-danger">* </span>组件类型</label>            <select class="form-control" name="widget" style="width:400px;">                <?php $_result=C('ATTR_IDENTIFY');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["identify"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>            </select>            <small class="form-text text-muted"></small>        </div>        <div class="form-group">            <label>字段提示</label>            <input type="text" class="form-control" name="tip" placeholder="字段提示" value="<?php echo ($page["tip"]); ?>" style="width:400px;">            <small class="form-text text-muted">tip提醒</small>        </div>        <div class="form-group">            <label>排序</label>            <input type="text" class="form-control" name="sort" placeholder="排序" value="500" style="width:400px;">            <small class="form-text text-muted">排序，默认500</small>        </div>        <button type="submit" class="btn btn-primary">保存</button>    </form>
</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>