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
                <span class="name">链接</span>
            </div>
        </div>
        <div class="float-right">
            <a href="<?php echo U('Ad/add');?>?cate_id=<?php echo ($cate_id); ?>" role="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> 新增链接</a>
        </div>
    </div>
    <div class="h10"></div>

    <form action="<?php echo U('Ad/index');?>" method="get" name="form1">
        <div class="form-inline">
            选择分类：
            <select class="form-control form-control-sm" name="cate_id">
                <option value="">全部</option>
                <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["id"]) == $_GET['cate_id']): ?><option value="<?php echo ($item["id"]); ?>" selected><?php echo ($item["name"]); ?></option>
                    <?php else: ?>
                        <option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </form>

    <div class="h10"></div>
    <table class="table table-bb">
        <tr>
            <th width="30">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input checkbox-all" id="checkbox-0">
                    <label class="custom-control-label"  for="checkbox-0"></label>
                </div>
            </th>
            <th>ID</th>
            <th>图像</th>
            <th>所在分类</th>
            <th>标题</th>
            <th width="30%">链接</th>
            <th>排序</th>
            <th>是否过期</th>
            <th width="140">操作</th>
        </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr_<?php echo ($vo["id"]); ?>">
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-item" id="checkbox-<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["id"]); ?>" data-print-url="<?php echo U('GoodsOrderPrint/print_view',array('id'=>$vo['id']));?>" data-id="<?php echo ($vo["id"]); ?>">
                        <label class="custom-control-label"  for="checkbox-<?php echo ($vo["id"]); ?>"></label>
                    </div>
                </td>
                <td><?php echo ($vo["id"]); ?></td>
                <td>
                    <?php if(!empty($vo["thumb"])): ?><img src="<?php echo ($vo["thumb"]); ?>" height="40"/>
                    <?php else: ?>
                        --<?php endif; ?>
                </td>
                <td>
                    <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i; if(($voo["id"]) == $vo["cate_id"]): echo ($voo["name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
                </td>
                <td>
                    <?php if(!empty($vo["title"])): echo ($vo["title"]); ?>
                        <?php else: ?>
                        --<?php endif; ?>
                </td>
                <td><div class="word-break"><?php echo ($vo["url"]); ?></div></td>
                <td>
                    <div class="form-inline">
                        <input class="form-control form-control-sm w-40" type="text" name="sort" value="<?php echo ($vo["sort"]); ?>" old-sort="<?php echo ($vo["sort"]); ?>" data-id="<?php echo ($vo["id"]); ?>" sort-id="<?php echo ($vo["id"]); ?>" />&nbsp;
                        <a class="blue" href="#" onclick="return sort_one('Ad',<?php echo ($vo["id"]); ?>)">更新</a>
                    </div>
                </td>
                <td>
                    <?php if((NOW_TIME) > $vo["end_at"]): ?><span class="badge badge-secondary">已过期</span>
                    <?php else: ?>
                        <span class="badge badge-success">正常</span><?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-sm btn-outline-secondary" href="<?php echo U('Ad/edit',array('id'=>$vo['id'],'jump_url'=>array_encode($_GET)));?>" role="button"><i class="fa fa-edit"></i> 编辑</a>
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            更多
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="return del_one('Ad','<?php echo ($vo["id"]); ?>')"><i class="fa fa-trash"></i> 删除</a>
                        </div>
                    </div>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>

    <div>
        <button type="button" class="btn btn-secondary btn-sm" onclick="return del_all('Ad');"><i class="fa fa-trash"></i> 删除</button>
        <button type="button" class="btn btn-secondary btn-sm" onclick="return sort_all('Ad');"><i class="fa fa-sort"></i> 排序</button>
        <button type="button" class="btn btn-secondary btn-sm" onclick="return alert_move_content();"><i class="fa fa-exchange"></i> 移动到</button>
    </div>

    <?php if(!empty($pages)): ?><div class="h10"></div>
        <div class="g_pages"><div class="in"><?php echo ($pages); ?></div></div><?php endif; ?>

    <!--内容迁移-->
    <div id="move_content" style="display: none;">
        <div class="form-group">
            <label><span class="text-danger">* </span>移动至</label>
            <select class="form-control" name="to_id">
                <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <small class="form-text text-muted"></small>
        </div>
        <div class="h10"></div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" onclick="return move_content_all('Ad',$('select[name=to_id]').val());">移动</button>
        </div>
    </div>

    <script>
        //选择分类后提交表单
        $("select[name=cate_id]").change(function(){
            $("form[name=form1]").submit();
        });

        //弹出选择框
        function alert_move_content(){
            var ids = [];
            $('.checkbox-item').filter(':checked').each(function(){
                ids.push($(this).attr('data-id'));
            });
            if(ids.length < 1){
                $boot.error({text:'请至少选择一个选项'});
                return false;
            }
            $boot.win({id:'#move_content','title':'移动到'});
            return false;
        }

    </script>

</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>