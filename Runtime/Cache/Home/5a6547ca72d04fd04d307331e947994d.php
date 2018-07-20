<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimal-ui">
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<meta name="wap-font-scale" content="no">  <!--解决UC字体忽然变大-->
<meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
<!-- uc强制竖屏 --><meta name="screen-orientation" content="portrait">
<!-- UC强制全屏 --> <meta name="full-screen" content="yes">
<!-- UC应用模式 --> <meta name="browsermode" content="application">
<!-- QQ强制竖屏 --><meta name="x5-orientation" content="portrait">
<!-- QQ强制全屏 --><meta name="x5-fullscreen" content="true">
<!-- QQ应用模式 --><meta name="x5-page-mode" content="app">

	<?php if(!empty($page["title"])): ?><title><?php echo ($page["title"]); ?></title>
		<?php else: ?>
		<title><?php echo ($setting["sitename"]); ?></title><?php endif; ?>

<?php if(!empty($page["keywords"])): ?><meta name="keywords" content="<?php echo ($page["keywords"]); ?>"/>
	<?php else: ?>
	<meta name="keywords" content="<?php echo ($setting["keywords"]); ?>"/><?php endif; ?>
<?php if(!empty($page["description"])): ?><meta property="description" name="description" content="<?php echo ($page["description"]); ?>"/>
	<?php else: ?>
	<meta property="description" name="description" content="<?php echo ($setting["description"]); ?>"/><?php endif; ?>


	<link rel="stylesheet" href="/Public/Home/css/reset.css">
<link rel="stylesheet" href="/Public/Home/css/public.css?t=<?php echo time();?>">
<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">
<script src="/Public/Home/js/jquery-3.1.1.min.js"></script>
<script src="/Public/Home/js/swiper.min.js"></script>
<script src="/Public/Home/js/public.js"></script>
<script src="/Public/Home/js/fastClick.js"></script>
<script src="/Public/Home/js/common.js"></script>
<script src="/Public/Plugs/jq/mob-jq-dialog.js"></script>

</head>
<body>
	

    

	
    welcome!



	




</body>
</html>