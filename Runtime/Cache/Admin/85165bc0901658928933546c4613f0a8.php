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
    <div class="mod_default_001"></div><div class="mod_default_002">    <ul>        <li>            <a onclick="parent.alert_iframe('导航设置','<?php echo U('Nav/index');?>','<?php echo md5(U('Nav/index'));?>');">                <span class="icon"><i class="fa fa-bars" aria-hidden="true"></i></span>                <span class="name">站点导航</span>            </a>        </li>        <li>            <a onclick="parent.alert_iframe('文章','<?php echo U('ArticleCate/index');?>','<?php echo md5(U('ArticleCate/index'));?>');" >                <span class="icon"><i class="fa fa-file-text" aria-hidden="true"></i></span>                <span class="name">文章分类</span>            </a>        </li>        <li>            <a onclick="parent.alert_iframe('留言','<?php echo U('Guestbook/index');?>','<?php echo md5(U('Guestbook/index'));?>');">                <span class="icon"><i class="fa fa-commenting-o" aria-hidden="true"></i></span>                <span class="name">留言</span>            </a>        </li>        <li>            <a onclick="parent.alert_iframe('地图','<?php echo U('Map/index');?>','<?php echo md5(U('Map/index'));?>');">                <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>                <span class="name">地图</span>            </a>        </li>        <li>            <a onclick="parent.alert_iframe('链接','<?php echo U('AdCate/index');?>','<?php echo md5(U('AdCate/index'));?>');">                <span class="icon"><i class="fa fa-link" aria-hidden="true"></i></span>                <span class="name">链接</span>            </a>        </li>        <li>            <a onclick="parent.alert_iframe('站点设置','<?php echo U('Setting/index');?>','<?php echo md5(U('Setting/index'));?>');">                <span class="icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>                <span class="name">站点设置</span>            </a>        </li>        <li>            <a onclick="parent.alert_iframe('管理员','<?php echo U('Manager/index');?>','<?php echo md5(U('Manager/index'));?>');">                <span class="icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>                <span class="name">管理员</span>            </a>        </li>    </ul>    <div class="clear"></div></div>
</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>