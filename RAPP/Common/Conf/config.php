<?php
return array(
    //'SHOW_PAGE_TRACE' 		=>  true, 								        // 显示页面Trace信息
    'DEFAULT_FILTER'        => 'strip_tags,trim',                           // strip_tags,stripslashes,htmlspecialchars
    //'TAGLIB_PRE_LOAD'		=> 'Common\TagLib\Rg',					        // 需要额外加载的标签库(须指定标签库名称)，多个以逗号分隔
    'URL_CASE_INSENSITIVE' 	=> true,
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    'LOAD_EXT_CONFIG'		=> 'db',						            // 扩展配置
    'MODULE_ALLOW_LIST'     => array('Home', 'Admin'), 	// 允许访问的模块列表
    'DEFAULT_MODULE'        => 'Home',
    'DATA_AUTH_KEY'			=> 'whrango',
    'DATA_CACHE_KEY'		=> 'whrango',
    'DATA_CACHE_TIME'		=> '1',//'21600',								        // 默认6小时
    'LOG_RECORD' 			=> false, 								        // 开启日志记录
    'DB_DEBUG'              => false,                                       // 数据库调试模式 3.2.3新增

    'TMPL_ACTION_ERROR' => './Public/Common/dispatch_jump_mobile.html', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => './Public/Common/dispatch_jump_mobile.html', // 默认成功跳转对应的模板文件
);