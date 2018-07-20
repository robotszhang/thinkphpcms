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
        <span class="name">新增地图</span>
    </div>
    <div class="h15"></div>

    <form method="post">
        <div class="form-group">
            <label><span class="text-danger">* </span>地图标题</label>
            <input type="text" class="form-control" name="title" placeholder="地图标题" style="width:400px;" value="" />
            <small class="form-text text-muted">1-100个字符</small>
        </div>

        <div class="form-group">
            <label><span class="text-danger">* </span>地址选择</label>
            <div>
                <!--
百度地图设置经纬度插件
param必填参数:
width:地图宽度，默认100%，
height:地图高度，默认450px
input_lng:经度input名称
input_lat:纬度input名称
input_zoom:缩放级别input名称
lng:经度默认值
lat:纬度默认值
zoom:缩放级别默认值
-->
<div id="lngmap" style="width:600px;height:400px;overflow: hidden;margin:0;font-family:'微软雅黑';"></div>
<div style="margin:5px 0 0 0;">
    经度：<span class="lngfun-lng"></span>&nbsp;&nbsp;&nbsp;&nbsp;纬度：<span class="lngfun-lat"></span>
    <span class="c999">&nbsp;&nbsp;&nbsp;&nbsp;提示：拖拽地图选择位置</span>
</div>

<input type="hidden" name="lng" value="">
<input type="hidden" name="lat" value="">
<input type="hidden" name="zoom" value="15">


<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.4&key=947dd69d7bf6cf026f8a4814d6d12cbd"></script>
<!-- UI组件库 1.0 -->
<script src="https://webapi.amap.com/ui/1.0/main.js?v=1.0.11"></script>
<script type="text/javascript">
    (function(){

            var mp = new AMap.Map("lngmap",{
                zoom:15,
                scrollWheel: false
            });

            var lng = "",lat = "";
            if(lng && lat){
                mp.setCenter([lng, lat]);
            }else{
                mp.setCenter([114.301319,30.596466]);  //武汉
            }

            //更新缩放级别
            AMap.event.addListener(mp,'zoomend',function(){
                $('input[name="zoom"]').val(mp.getZoom());
            });

            AMapUI.loadUI(['misc/PositionPicker'], function(PositionPicker) {
                var positionPicker = new PositionPicker({
                    mode: 'dragMap',
                    map: mp,
                    iconStyle:{   //自定义外观
                        url:'/Public/Admin/images/position-picker.png',  //图片地址
                        size:[36,36],  //要显示的点大小，将缩放图片
                        ancher:[18,36] //锚点的位置，即被size缩放之后，图片的什么位置作为选中的位置
                    }
                });

                positionPicker.on('success', function(positionResult) {
                    var p = positionResult.position.toString();
                    p = p.split(',');
                    $('input[name="lng"]').val(p[0]);
                    $('input[name="lat"]').val(p[1]);
                    $('.lngfun-lng').text(p[0]);
                    $('.lngfun-lat').text(p[1]);
                });
                positionPicker.on('fail', function(positionResult) {
                    $('input[name="lng"]').val('');
                    $('input[name="lat"]').val('');
                    $('.lngfun-lng').text('');
                    $('.lngfun-lat').text('');
                });
                positionPicker.start();
            });


            AMapUI.loadUI(['control/BasicControl'], function(BasicControl) {
                mp.addControl(new BasicControl.Zoom({
                    showZoomNum: false
                }))

            })




    })();


</script>



            </div>
            <small class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label>描述</label>
            <div>
                <!--
必填参数：
inputname
inputvalue
可选参数：
editsize = [1,2,3,4]
-->

<?php
 $editsize1 = [editsize]; $editsize1 = count($editsize1) == 1?['100%','560','800','1000']:$editsize1; ?>
<div id="body_editor">
    <div class="g_editsize">
        <?php if(is_array($editsize1)): $k = 0; $__LIST__ = $editsize1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if(($k) == "1"): ?><div class="size_item"><a class="on" href="#"><?php echo ($vo); ?></a></div>
                <?php else: ?>
                <div class="size_item"><a href="#"><?php echo ($vo); ?></a></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <textarea id="body_content" name="body" style="height:500px;width:100%;position:relative;z-index:1;"></textarea>
</div>

<script>
    (function(){
        //实例化编辑器
        var editor = UE.getEditor('body_content');
        //改变编辑器大小
        $("#body_editor .size_item a").click(function(){
            $("#body_editor .size_item a").removeClass('on');
            $(this).addClass('on');
            var $val = $(this).text();
            if($val == '100%'){
                $val = $("body").width()-40;
            }
            var $content = editor.getContent();
            editor.destroy();
            editor = UE.getEditor('body_content',{
                'initialContent':$content,
                'initialFrameWidth':$val
            });
            return false;
        });
    })();

</script>
            </div>
            <small class="form-text text-muted">地图说明，如交通路线</small>
        </div>

        <div class="form-group">
            <label>地址</label>
            <input type="text" class="form-control" name="address" placeholder="地址" style="width:400px;" value="" />
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>电话</label>
            <input type="text" class="form-control" name="phone" placeholder="电话" style="width:400px;" value="" />
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>邮箱</label>
            <input type="text" class="form-control" name="email" placeholder="邮箱" style="width:400px;" value="" />
            <small class="form-text text-muted"></small>
        </div>

        <div class="form-group">
            <label>QQ</label>
            <input type="text" class="form-control" name="qq" placeholder="QQ" style="width:400px;" value="" />
            <small class="form-text text-muted"></small>
        </div>

        <div class="h10"></div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>
    <script>
        //提交编辑
        /*function post_create(){
            var data = $('form').serializeObject();
            data.description = editor_description.getData();
            $.ajax({
                type:'post',
                url:'/admin/map/create_edit',
                data:data,
                success:function(res){
                    if(res.status == 0){
                        $boot.warn({text:res.msg},function(){
                            $('input[name='+res.field+']').focus();
                        });
                    }else{
                        $boot.success({text:res.msg},function(){
                            window.location = "{{ url()->previous() }}";
                        });
                    }
                }
            })
            return false;
        }*/

    </script>


</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>