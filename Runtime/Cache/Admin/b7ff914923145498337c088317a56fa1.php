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
    
    <div class="clearfix">
        <div class="float-left">
            <div class="u-breadcrumb">
                <a class="back" href="javascript:window.location.reload()" ><span class="fa fa-repeat"></span> 刷新</a>
                <span class="name">数据库还原</span>
            </div>
        </div>
        <div class="float-right">

        </div>
    </div>
    <div class="h10"></div>

    <div class="alert alert-danger dis_none" role="alert" id="alert">
        数据库还原中，请勿关闭当前页面！
    </div>

    <table class="table table-bb">
        <tr>
            <th>备份名称</th>
            <th>卷数</th>
            <th>压缩</th>
            <th>数据大小</th>
            <th>备份时间</th>
            <th>操作状态</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo (date('Ymd-His',$data["time"])); ?></td>
                <td><?php echo ($data["part"]); ?></td>
                <td><?php echo ($data["compress"]); ?></td>
                <td><?php echo (format_bytes($data["size"])); ?></td>
                <td><?php echo ($key); ?></td>
                <td>--</td>
                <td>

                    <a class="btn btn-sm btn-outline-secondary db-import" role="button" href="<?php echo U('import?time='.$data['time']);?>"><i class="fa fa-reply"></i> 还原</a>
                    <a class="btn btn-sm btn-outline-secondary" role="button" href="<?php echo U('del?time='.$data['time']);?>" onclick="return del(this);"><i class="fa fa-trash"></i> 删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

    <script>
        $(".db-import").click(function(){
            var self = this, status = ".";

            $boot.confirm({text:'确认还原该备份？'},function(){
                $('#alert').removeClass('dis_none');
                $.get(self.href, success, "json");
                return false;
            });

            function success(data){
                if(data.status){
                    if(data.gz){
                        data.info += status;
                        if(status.length === 5){
                            status = ".";
                        } else {
                            status += ".";
                        }
                    }
                    $(self).parent().prev().text(data.info);
                    if(data.info == '还原完成！'){
                        $('#alert').addClass('dis_none');
                    }
                    if(data.part){
                        $.get(self.href,
                            {"part" : data.part, "start" : data.start},
                            success,
                            "json"
                        );
                    }  else {
                        window.onbeforeunload = function(){ return null; }
                    }
                } else {
                    $('#alert').addClass('dis_none');
                    $boot.warn({text:data.info});
                }
            }


            return false;
        });


        /**
         * 删除备份
         * @param obj
         * @returns {boolean}
         */
        function del(obj){
            var loading;
            $boot.confirm({text:'确认删除该备份？'},function(){
                loading = $boot.loading({text:'删除中...'});
                $.ajax({
                    type:'post',
                    url:$(obj).attr('href'),
                    success:function(res){
                        if(res.status == 1){
                            loading.close();
                            $boot.success({text:res.info},function(){
                                window.location.reload();
                            });
                        }else{
                            $boot.error({text:res.info});
                        }
                    }
                });
            });
            return false;
        }
    </script>

</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>