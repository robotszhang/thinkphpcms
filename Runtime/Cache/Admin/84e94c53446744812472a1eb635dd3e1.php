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
                <span class="name">数据库表</span>
            </div>
        </div>
        <div class="float-right">

        </div>
    </div>
    <div class="h10"></div>

<table class="table table-bb">
    <form action="<?php echo U('export');?>" id="export-form" method="post">
        <tr>
            <th width="30">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-all" id="checkbox-0">
                    <label class="custom-control-label"  for="checkbox-0"></label>
                </div>
            </th>
            <th>表名</th>
            <th>递增值</th>
            <th>数据大小</th>
            <th>引擎</th>
            <th>排序规则</th>
            <th>创建时间</th>
        </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-item" id="checkbox-<?php echo ($table["name"]); ?>" name="tables[]" value="<?php echo ($table["name"]); ?>" data-print-url="<?php echo U('GoodsOrderPrint/print_view',array('id'=>$vo['id']));?>" data-id="<?php echo ($table["name"]); ?>">
                        <label class="custom-control-label"  for="checkbox-<?php echo ($table["name"]); ?>"></label>
                    </div>
                </td>
                <td><?php echo ($table["name"]); ?></td>
                <td><?php echo ($table["rows"]); ?></td>
                <td><?php echo (format_bytes($table["data_length"])); ?></td>
                <td><?php echo ($table["engine"]); ?></td>
                <td><?php echo ($table["collation"]); ?></td>
                <td><?php echo ($table["create_time"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</table>

    <div>
        <button id="export" type="button" class="btn btn-secondary btn-sm" ><i class="fa fa-files-o"></i> <span>立即备份</span></button>
    </div>


<script>

        var $form = $("#export-form"), $export = $("#export");

        //$optimize = $("#optimize"), $repair = $("#repair");

       /* function repair_one(table_name){
            $boot.confirm({text:'确认修复该数据表？'},function(){
                $.ajax({
                    type:'post',
                    url:'<?php echo U("repair");?>',
                    data:{table_arr:[table_name]},
                    success:function(res){
                        if(res.status == 1){
                            $boot.success({text:res.info});
                        }else{
                            $boot.error({text:res.info});
                        }
                    }
                });
            });
            return false;
        }

        function repair_all(){
            var ids = [];
            $('.checkbox-item').filter(':checked').each(function(){
                ids.push($(this).attr('data-id'));
            });
            if(ids.length < 1){
                $boot.error({text:'请至少选择一个选项'});
                return false;
            }
        }*/


       /*function table_backup(){
           var ids = [];
           $('.checkbox-item').filter(':checked').each(function(){
               ids.push($(this).attr('data-id'));
           });
           if(ids.length < 1){
               $boot.error({text:'请至少选择一个选项'});
               return false;
           }
           $boot.confirm({text:'确认备份所选数据表？'},function(){
               $.ajax({
                   type:'post',
                   url:'<?php echo U("backup");?>',
                   data:{table_arr:ids},
                   success:function(res){
                       if(res.status == 1){
                           $boot.success({text:res.info});
                       }else{
                           $boot.error({text:res.info});
                       }
                   }
               });
           });
       }*/

        /**
         * 初始化备份
         * @param tab
         * @param status
         */
        var loading;
        $export.click(function() {
            $(this).addClass("disabled");
            $(this).find('span').html("正在发送备份请求...");
            $.ajax({
                type:'post',
                url:$form.attr("action"),
                data:$form.serialize(),
                success:function(data){
                    if(data.status){
                        //tables = data.tables;
                        loading = $boot.loading({text:"备份进行中...，请勿关闭此页面！"});
                        backup(data.tab, true);
                    }else{
                        $boot.error({text:data.info});
                        $export.removeClass("disabled");
                        $export.find('span').html("立即备份");
                    }
                }
            });
            return false;
        });

        /**
         * 备份主流程
         * @param tab
         * @param status
         */
        function backup(tab, status){
            $.get($form.attr("action"), tab, function(data){
                if(data.status){
                    //showmsg(tab.id, data.info);
                    if(!$.isPlainObject(data.tab)){
                        loading.close();
                        $export.removeClass("disabled");
                        $export.find('span').html("备份完成，点击重新备份");
                        $boot.success({text:'备份完成！'});
                        return false;
                    }
                    backup(data.tab, tab.id != data.tab.id);
                } else {
                    loading.close();
                    $boot.error({text:'备份出错'});
                    $export.removeClass("disabled");
                    $export.find('span').html("备份出错，点击重新备份");
                }
            }, "json");
        }
</script>

</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>