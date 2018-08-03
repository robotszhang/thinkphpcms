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
        <div class="u-breadcrumb">        <a class="back" href="javascript:history.back()" ><span class="fa fa-chevron-left"></span> 后退</a>        <a class="back" href="javascript:window.location.reload()" ><span class="fa fa-repeat"></span> 刷新</a>        <span class="name">新增文章</span>    </div>    <div class="h15"></div>    <div class="nav nav-tabs" role="tablist">        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-1" role="tab" aria-selected="true">基本信息</a>        <a class="nav-item nav-link" data-toggle="tab" href="#nav-2" role="tab" aria-selected="false">附加值</a>        <a class="nav-item nav-link" data-toggle="tab" href="#nav-3" role="tab" aria-selected="false">seo设置</a>    </div>    <div class="h15"></div>    <form method="post" enctype="multipart/form-data">        <div class="tab-content">            <div class="tab-pane fade show active" id="nav-1" role="tabpanel">                <div class="form-group">                    <label><span class="text-danger">* </span>文章分类</label>                    <select class="form-control" name="cate_id" id="itemsids" style="width:400px;">                        <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>" <?php if(($item["id"]) == $_GET['cate_id']): ?>selected<?php endif; ?> <?php if(($item["is_able"]) != "1"): ?>disabled="1"<?php endif; ?>>                            <?php echo ($item["pre"]); echo ($item["name_cn"]); ?>                            </option><?php endforeach; endif; else: echo "" ;endif; ?>                    </select>                    <small class="form-text text-muted"></small>                </div>                <div class="form-group">                    <label for="title"><span class="text-danger">* </span>文章标题</label>                    <div class="form-inline">                        <input type="text" class="form-control mr-2" id="title" name="title" placeholder="文章标题" style="width:400px;" value="<?php echo ($page["title"]); ?>" />                        <input type="text" id="colorpicker" name="title_color"/>                    </div>                    <small class="form-text text-muted">1-100个字符</small>                </div>                <div class="form-group">                    <label>跳转地址</label>                    <div class="form-inline">                        <input type="text" class="form-control" name="url" placeholder="跳转地址" style="width:400px;" value="<?php echo ($page["url"]); ?>" />                    </div>                    <small class="form-text text-muted">以http://开头，填写后文章将重定向到该地址</small>                </div>                <div class="form-group">                    <label>缩略图</label>                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><div id="upload_img_one" class="upload_img_one">	<div class="upload_img_one_left">		<div class="pic">			<?php if(empty($page["thumb"])): ?><img src="/Public/Admin/images/nopicture.png" width="100" />				<?php else: ?>				<img src="<?php echo ($page["thumb"]); ?>" width="160" /><?php endif; ?>			<span class="size"></span>			<a class="delete" href="#" data="/Public/Admin/images/nopicture.png">×</a>		</div>		<input class="thumb_path" type="hidden" name="thumb" value="[inputvalue]" />        <label id="upload_upload_img_one" class="u-dmuploader">            <span role="button" class="btn btn-sm btn-primary w-100 mt-1"><span class="fa fa-upload"></span> 上传图片</span>            <input type="file" class="dis_none" />        </label>	</div>	<div class="upload_img_one_right">		<div class="tip">格式支持jpg、png、gif，图片大小&lt;6MB</div>		<div><a class="blue hide_btn" href="#">地址图片</a></div>		<div class="add_block">			<input class="text add_text" type="text" value="" />			<div class="add_btn">添加</div>		</div>	</div>	<div class="clear"></div></div><script type="text/javascript">	//显示-隐藏 缩略图地址添加	$("#upload_img_one .upload_img_one_right a.hide_btn").click(function() {	    var $this = $(this);		if($this.text() == '地址图片') {            $this.parent().siblings('.add_block').show();            $this.text('收起');		} else {            $this.parent().siblings('.add_block').hide();            $this.text('地址图片');		}		return false;	});	//添加缩略图地址	$(".upload_img_one_right .add_btn").click(function(){	    var $this = $(this);		var $val = $this.siblings('.add_text').val();		if($.trim($val) != '') {			$("#upload_img_one .upload_img_one_left .pic").find('img').attr({'src':$val});			$("#upload_img_one .thumb_path").val($val);		}	});	//删除当前选中缩略图	$("#upload_img_one .upload_img_one_left .pic a.delete").click(function(){		var nopicture = $(this).attr('data');		$("#upload_img_one .upload_img_one_left .pic").find('img').attr({'src':nopicture});		$("#upload_img_one .thumb_path").val('');		$(".upload_img_one_left .pic span.size").hide();	});	//初始化上传uploadify	$size = 6;  //单位：M    //插件地址：https://github.com/danielm/uploader    $('#upload_upload_img_one').dmUploader({        url: '<?php echo U("Common/upload_pic_one");?>',        dataType: 'json',        maxFileSize : $size*1024*1024,  //允许上传的大小，单位KB        allowedTypes: 'image/*',        multiple:false,        extraData:{            '<?php echo session_name();?>' : '<?php echo session_id();?>'        },        onComplete: function(){            //$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');            console.log('All pending tranfers completed');        },        onUploadProgress: function(id, percent){            //var percentStr = percent + '%';            //$.danidemo.updateFileProgress(id, percentStr);        },        onUploadSuccess: function(id, res){            if(res.status == 1){                $("#upload_img_one .upload_img_one_left .pic").find('img').attr({'src':res.path});                $("#upload_img_one .upload_img_one_left .pic .size").text(res.width+"×"+res.height).show();                $("#upload_img_one .thumb_path").val(res.path);            } else {                $boot.error($data.info);            }        },        onUploadError: function(id, message){        },        onFileTypeError: function(file){        },        onFileSizeError: function(file){        },        onFileExtError: function(file){        },        onFallbackMode: function(message){        }    });</script>                    <small class="form-text text-muted"></small>                </div>                <div class="form-group">                    <label>发布时间</label>                    <!--
必选字段：
inputname
inputvalue
可选字段：
placeholder
-->

<?php
 $placeholder = "发布时间"; $placeholder = $placeholder?$placeholder:'选择时间'; ?>
<div class="input-group" style="width: 200px;">
    <input type="text" class="form-control form-control-sm" name="created_at" placeholder="<?php echo ($placeholder); ?>" value="<?php echo date('Y-m-d H:i');?>" >
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
</script>                    <small class="form-text text-muted"></small>                </div>                <div class="form-group">                    <label>浏览量</label>                    <div class="form-inline">                        <input type="text" class="form-control" name="click" placeholder="浏览量" style="width:400px;" value="0" />                    </div>                    <small class="form-text text-muted"></small>                </div>                <div class="form-group">                    <label>文章详情</label>                    <!--
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

</script>                    <small class="form-text text-muted"></small>                </div>            </div>            <!--附加属性-->            <div class="tab-pane fade show" id="nav-2" role="tabpanel">                <input type="hidden" name="extattr" value="">                <?php if(is_array($attrlist)): $i = 0; $__LIST__ = $attrlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["widget"]) == "input_text"): ?><div class="form-group">                            <label><?php echo ($vo["title"]); ?></label>                            <div class="form-inline">                                <input type="text" class="form-control attr_serialize" name="<?php echo ($vo["identify"]); ?>" placeholder="<?php echo ($vo["title"]); ?>" data-title="<?php echo ($vo["title"]); ?>" data-widget="<?php echo ($vo["widget"]); ?>" value="<?php echo ($vo["value"]); ?>" style="width:400px;" />                            </div>                            <small class="form-text text-muted"><?php echo ($vo["remark"]); ?></small>                        </div><?php endif; ?>                    <?php if(($vo["widget"]) == "textarea"): ?><div class="form-group">                            <label><?php echo ($vo["title"]); ?></label>                            <div class="form-inline">                                <textarea style="width:600px;" name="<?php echo ($vo["identify"]); ?>" class="form-control attr_serialize" data-title="<?php echo ($vo["title"]); ?>"  data-widget="<?php echo ($vo["widget"]); ?>"><?php echo ($vo["value"]); ?></textarea>                            </div>                            <small class="form-text text-muted"><?php echo ($vo["remark"]); ?></small>                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>            </div>            <!--seo-->            <div class="tab-pane fade show" id="nav-3" role="tabpanel">                <div class="form-group">                    <label>关键词</label>                    <div class="form-inline">                        <input type="text" name="keywords" class="form-control" style="width:600px;"/>&nbsp;<a class="blue" href="#" onclick="return split_words();">生成关键词</a>                    </div>                    <small class="form-text text-muted">使用“生成关键词”功能请先确认文章标题已填写</small>                </div>                <div class="form-group">                    <label>描述</label>                    <div class="form-inline">                        <textarea name="description" class="form-control" rows="5" style="width:600px;"></textarea>                    </div>                </div>            </div>        </div>        <button type="submit" class="btn btn-primary">保存</button>    </form><script>    //颜色选择器    $("#colorpicker").spectrum();	//提交前保存附加字段	$("button[type=submit]").click(function(){		//var array_serialize = $(".attr_serialize").serializeArray();		var $array = [],$json = {};		var attr_data = $(".attr_serialize").not(".edui-default");		for(i=0;i<attr_data.length;i++){			$json['title'] = attr_data.eq(i).attr('data-title');			$json['identify'] = attr_data.eq(i).attr('name');			$json['widget'] = attr_data.eq(i).attr('data-widget');			$json['value'] = attr_data.eq(i).val();			$array.push($json);			$json = {};		}		var str = JSON.stringify($array);		$("input[name=extattr]").val(str);	});	//关键字分词	function split_words(){		$title = $("input[name=title]").val();		if($title == ''){			$boot.warn({text:"请先输入文章标题！"});			return false;		}		$.ajax({			type:"post",			url:"<?php echo U('Common/ajax_split_words');?>",			data:{word:$title},			success:function(data){				if(data['status']){					$("input[name=keywords]").val(data['keyword']);				}			}		});		return false;	}	//分类切换（需要刷新附加属性）	$("#itemsids").change(function(){		var $id=$(this).children('option:selected').val();		window.location = "<?php echo U('Article/add');?>"+"?cate_id="+$id;	});</script>
</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>