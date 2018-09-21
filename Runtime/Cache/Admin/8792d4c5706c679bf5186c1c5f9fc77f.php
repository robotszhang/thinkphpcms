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
    

    <div class="u-breadcrumb">
        <a class="back" href="javascript:history.back()" ><span class="fa fa-chevron-left"></span> 后退</a>
        <a class="back" href="javascript:window.location.reload()" ><span class="fa fa-repeat"></span> 刷新</a>
        <span class="name">新增留言</span>
    </div>
    <div class="h15"></div>

    <form method="post" enctype="multipart/form-data">
        <input name="id" type="hidden" value="<?php echo ($page["id"]); ?>">
        <div class="form-group">
            <label>称呼</label>
            <div class="form-inline">
                <input type="text" class="form-control" name="nickname" placeholder="称呼" style="width:400px;" value="<?php echo ($page["nickname"]); ?>" />
            </div>
            <small class="form-text text-muted">1-100个字符</small>
        </div>
        <div class="form-group">
            <label>手机</label>
            <div class="form-inline">
                <input type="text" class="form-control" name="phone" placeholder="手机" style="width:400px;" value="<?php echo ($page["phone"]); ?>" />
            </div>
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>留言内容</label>
            <div class="form-inline">
                <textarea class="form-control" name="body" style="width: 400px;"><?php echo ($page["body"]); ?></textarea>
            </div>
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>留言时间</label>
            <!--
必选字段：
inputname
inputvalue
可选字段：
placeholder
-->

<?php
 $placeholder = "留言时间"; $placeholder = $placeholder?$placeholder:'选择时间'; ?>
<div class="input-group" style="width: 200px;">
    <input type="text" class="form-control form-control-sm" name="created_at" placeholder="<?php echo ($placeholder); ?>" value="<?php echo (date('Y-m-d H:i',$page["created_at"])); ?>" >
    <div class="input-group-append">
        <span class="input-group-text">
            <i class="fa fa-calendar" aria-hidden="true"></i>
        </span>
    </div>
</div>
<script>
    //日期选择器
    $("input[name='created_at']").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        locale: "zh"
    });
</script>
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>留言回复</label>
            <div class="form-inline">
                <textarea class="form-control" name="response" style="width: 400px;"><?php echo ($page["response"]); ?></textarea>
            </div>
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>回复时间</label>
            <!--
必选字段：
inputname
inputvalue
可选字段：
placeholder
-->

<?php
 $placeholder = "回复时间"; $placeholder = $placeholder?$placeholder:'选择时间'; ?>
<div class="input-group" style="width: 200px;">
    <input type="text" class="form-control form-control-sm" name="response_at" placeholder="<?php echo ($placeholder); ?>" value="<?php echo ($page["response_at_format"]); ?>" >
    <div class="input-group-append">
        <span class="input-group-text">
            <i class="fa fa-calendar" aria-hidden="true"></i>
        </span>
    </div>
</div>
<script>
    //日期选择器
    $("input[name='response_at']").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        locale: "zh"
    });
</script>
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>是否显示</label>
            <div>
                <?php if(($page["is_show"]) == "0"): ?><div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is_show1" name="is_show" class="custom-control-input" value="1">
                        <label class="custom-control-label" for="is_show1">显示</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is_show2" name="is_show" class="custom-control-input" value="0" checked>
                        <label class="custom-control-label" for="is_show2">关闭</label>
                    </div>
                    <?php else: ?>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is_show1" name="is_show" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="is_show1">显示</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="is_show2" name="is_show" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="is_show2">关闭</label>
                    </div><?php endif; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>


    <script type="text/javascript">
        //分类切换（需要标志当前pid）
        $("#itemsids").change(function(){
            var $id=$(this).val();
            window.location = "<?php echo U('Ad/add');?>"+"?cate_id="+$id;
        });
    </script>


</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>