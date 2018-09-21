<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title><?php echo ($setting["sitename"]); ?></title>
    <meta name="renderer" content="webkit">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
        <?php if(!empty($page["title"])): ?><title><?php echo ($page["title"]); ?></title>
            <?php else: ?>
            <title><?php echo ($setting["sitename"]); ?></title><?php endif; ?>
    
    <?php if(!empty($page["keywords"])): ?><meta name="keywords" content="<?php echo ($page["keywords"]); ?>"/>
        <?php else: ?>
        <meta name="keywords" content="<?php echo ($setting["keywords"]); ?>"/><?php endif; ?>
    <?php if(!empty($page["description"])): ?><meta property="description" name="description" content="<?php echo ($page["description"]); ?>"/>
        <?php else: ?>
        <meta property="description" name="description" content="<?php echo ($setting["description"]); ?>"/><?php endif; ?>

    
        <!--bootstrap组件-->
        <link rel="stylesheet" href="/Public/bootstrap/bootstrap.min.css" >
        <script src="/Public/bootstrap/jquery.min.js" ></script>
        <script src="/Public/bootstrap/popper.min.js"></script>
        <script src="/Public/bootstrap/bootstrap.min.js"></script>

        <!--awesome字体-->
        <link href="/Public/bootstrap/font/css/font-awesome.min.css" rel="stylesheet">

        <!--bootstrap-dialog-->
        <script src="/Public/bootstrap/bootstrap.dialog.js"></script>


        <link rel="stylesheet" href="/Public/Admin/css/frame.css" >
    

</head>
<body>

<div class="h15"></div><div class="m-login-head">    <a class="logo"><img src="/Public/Admin/images/logo_login.png" /></a>    <div class="name">内容管理系统</div></div><div class="h30"></div><div class="h50"></div><div class="m-login">    <form action="<?php echo U('login');?>" method="post">        <div class="item">            <input type="text" name="user" autocomplete="off" class="form-control form-control-lg js-text" placeholder="请输入账号" />        </div>        <div class="item">            <input type="password" name="pass" autocomplete="off" class="form-control form-control-lg js-text" placeholder="请输入密码" />        </div>        <div class="item">            <input name="verify" autocomplete="off" type="text" class="form-control form-control-lg js-text" placeholder="验证码" />        </div>        <div class="item">            <div class="verify">                <img src="<?php echo U('Public/verify',array('t'=>time()));?>" onclick="return exchange(this);" class="code-img" />            </div>        </div>        <div class="h20"></div>        <div class="custom-control custom-checkbox">            <input name="remember" value="1" type="checkbox" class="custom-control-input" id="checkbox1">            <label class="custom-control-label" for="checkbox1">记住登录状态</label>        </div>        <div class="h20"></div>        <button class="btn btn-primary btn-block" type="submit">登录</button>    </form></div><div class="h50"></div><div class="m-copyright">copyright&nbsp;©&nbsp;兰谷科技&nbsp;&nbsp;&nbsp; All Rights Reserved.</div><script>    function exchange(obj)    {        $(obj).attr("src", "<?php echo U('Public/verify');?>?random=" + Math.random());    }    //ajax提交登录    $("form").submit(function(){        $.ajax({            type:'post',            url:$('form').attr('action'),            data:$('form').serialize(),            success:function(res){                if(res.status == 0){                    $boot.warn({text:res.info},function(){                        //$('input[name='+res.field+']').focus();                    });                }else{                    $boot.success({text:res.info},function(){                        window.location = "<?php echo U('Index/index');?>";                    });                }            }        });        return false;    });    //输入框z-index切换    $(".js-text").focus(function(){        $(".js-text").css({'z-index':1});        $(this).css({'z-index':2});    })</script>


</body>
</html>