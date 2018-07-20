$k = {
	dialog:function(param,callback){
		return new kDialog(param,callback);
	},
	text:function(param,callback){
		new kText(param,callback);	
	},
	win:function(param,callback){
		return new kWin(param,callback);	 
	},
	indcate:function(callback){
		return kWin({title:'选择行业类别',width:800,height:440,content:'.g_indcate',btn:true},callback);
	},
	indcate_link:function(callback){
		return kWin({title:'选择行业类别',width:800,height:380,content:'.g_indcate_link'},callback);
	},
	jobcate:function(callback){
		return kWin({title:'选择职位类别',width:900,height:520,content:'.g_jobcate',btn:true},callback);
	},
	jobcate_link:function(callback){
		return kWin({title:'选择职位类别',width:900,height:500,content:'.g_jobcate_link'},callback);
	},
	traincate:function(callback){
		return kWin({title:'选择培训类别',width:900,height:500,content:'.g_traincate',btn:true},callback);
	},
	traincate_link:function(callback){
		return kWin({title:'选择培训类别',width:900,height:500,content:'.g_traincate_link'},callback);
	},
	iframe:function(param,callback){
		param.contain = "<iframe style='width:100%;height:"+(param.height-40)+"px;border:none;' src='"+param.location+"'></iframe>";
		return kIframe(param,callback);
	},
	link:function(param,callback){
		var o = new kDialog(param,callback);
		var html = $("<p>"+param.content+"&nbsp;<a href='#' class='un reset'>继续发布</a>&nbsp;&nbsp;或&nbsp;&nbsp;<a href='#' class='un preview'>预览</a></p>");
		o.contain(html);
		o.dom().find("a.reset").bind("click",function(){
			o.drop();
			param.reset();
		});
		o.dom().find("a.preview").bind("click",function(){
			o.drop();
			param.preview();
		});
		return o;
	}
};

function kLock($opacity){
	$opacity = $opacity?$opacity:0.2;
	var $dom = $("<div></div>"),
    h = $(window).height()>$(document).height()?$(window).height():$(document).height();
	$dom.css({zIndex:10001,width:$(window).width(),height:h,background:'#000',opacity:$opacity,position:"absolute",left:0,top:0}).appendTo("body");
	return $dom;	
}

/**
  * 弹出对话框
*/
function kDialog(param,callback){
	var html_btn = param.btn?'<div class="btns" style="width:70px;">'+
			'<button class="confirm">'+param.btn+'</button>'+
		'</div>':'<div class="btns">'+
		'<a class="confirm">确定</a>'+
		'<a class="cancel">取消</a>'+
	'</div>';
	var
	$dom = $(
		'<div class="g_dialog">'+
			'<div class="head">'+(param.title = param.title?param.title:"提示")+'</div>'+
			'<a class="close">×</a>'+
			'<div class="content">'+param.text+'</div>'+
			html_btn+
		'</div>'
	),
	w = $(window).width()/2,
	h = $(window).height()/2;
	if(param.lock!=false){
		var lock = kLock(param.opacity);
	}
	$dom.appendTo("body");
	$dom.css({left:w-$dom.width()/2,top:h-$dom.height()/2});
	function remove(){
		$dom.remove();
		if(param.lock!=false){
			lock.remove();
		}

	}
	$dom.find(".close,.cancel").bind("click",function(){
		remove();
	});
	$dom.find(".confirm").bind("click",function(){
		remove();
		if(callback)
		{
			callback();
		}
	});	
}

/**
  * 弹出文字提示
*/
function kText(param,callback){
	var 
	$dom = $(
		'<div class="g_text">'+param.text+
		'</div>'
	),
	w = $(window).width()/2,
	h = $(window).height()/2
	;

	if(param.lock!=false){
		var lock = kLock(param.opacity);
	}
	$dom.appendTo("body");
	var dom_left=w-$dom.width()/2;
	var dom_top=h-$dom.height()/2;
	$dom.css({'left':dom_left,'top':dom_top});
	
	setTimeout(remove,param.delay?param.delay:800);
	function remove(){
		if(param.lock!=false){
			lock.remove();
		}
		$dom.remove();
		if(callback)
		{
			callback();
		}
		//lock.remove();
	}	
}

/**
 * 弹出窗口容器
*/
function kWin(param,callback){
	var html_btn = param.btn?'<div class="bottom"><div class="btns">'+
			'<a class="btn confirm">'+(param.btn.yes?param.btn.yes:"确定")+'</a>'+
			'<a class="btn cancel">'+(param.btn.no?param.btn.no:"取消")+'</a>'+
		'</div></div>':'';
	var $dom =$(
	'<div class="g_win">'+
		'<div class="head">'+(param.title?param.title:"窗口")+'</div>'+
		'<a class="close">×</a>'+
   	'<div class="g_win_container">'+
   	'</div>'+html_btn
   	+
	'</div>	');
	var w = $(window).width()/2,
	h = $(window).height()/2,
	s = $(window).scrollTop()
	;
	var container_h = param.btn?param.height-90:param.height-40;
	if(param.lock!=false){
		var lock = kLock(param.opacity);
	}
	$dom.appendTo("body");
	$dom.css({width:param.width,height:param.height});
	$dom.css({left:w-param.width/2,top:h-param.height/2+s});
	$dom.find(".g_win_container").css({height:container_h,width:param.width});
	if(param.content)
	{
		var $content = $(param.content).css({visibility:"visible"}).show();
		$dom.find(".g_win_container").html($content);
	}
	if(param.contain){
		$dom.find(".g_win_container").html(param.contain);
	}
	$dom.find(".g_win_container").jScrollPane();
	$dom.draggable({ handle: ".head" //containment:"body" 
	});
	$dom.find(".close,.cancel").bind("click",function(){
		remove();
	});
	$dom.find(".confirm").bind("click",function(){
		if(callback)
		{
			callback();
		}
		remove();
	}).focus();	
	this.drop = function(){
		remove();
	};
	this.contain = function(str){
		$dom.find(".jspPane").append(str);
	};
	this.dom = function(){
		return $dom.find(".jspPane");
	};
	function remove(){
		if($content){
			$content.css({visibility:"hidden"}).hide().appendTo("body");
		}
		$dom.remove();
		if(param.lock!=false){
			lock.remove();
		}
		
	}
	return this;
}
/**
 * 弹出iframe窗口容器
*/
function kIframe(param,callback){
	var html_btn = param.btn?'<div class="bottom"><div class="btns">'+
			'<a class="btn confirm">'+(param.btn.yes?param.btn.yes:"确定")+'</a>'+
			'<a class="btn cancel">'+(param.btn.no?param.btn.no:"取消")+'</a>'+
		'</div></div>':'';
	var $dom =$(
	'<div class="g_win">'+
		'<div class="head">'+(param.title?param.title:"窗口")+'</div>'+
		'<a class="close">×</a>'+
   	'<div class="g_win_container">'+
   	'</div>'+html_btn
   	+
	'</div>	');
	var w = $(window).width()/2,
	h = $(window).height()/2,
	s = $(window).scrollTop()
	;
	var container_h = param.btn?param.height-90:param.height-40;
	if(param.lock!=false){
		var lock = kLock(param.opacity);
	}
	$dom.appendTo("body");
	$dom.css({width:param.width,height:param.height});
	$dom.css({left:w-param.width/2,top:h-param.height/2+s});
	$dom.find(".g_win_container").css({height:container_h,width:param.width});
	if(param.content)
	{
		var $content = $(param.content).css({visibility:"visible"}).show();
		$dom.find(".g_win_container").html($content);
	}
	if(param.contain){
		$dom.find(".g_win_container").html(param.contain);
	}
	$dom.draggable({ handle: ".head"  //,containment:"body" 
	});
	$dom.find(".close,.cancel").bind("click",function(){
		remove();
	});
	$dom.find(".confirm").bind("click",function(){
		if(callback)
		{
			callback();
		}
		remove();
	}).focus();	
	this.drop = function(){
		remove();
	};
	this.contain = function(str){
		$dom.find(".g_win_container").append(str);
	};
	this.dom = function(){
		return $dom.find(".g_win_container");
	};
	function remove(){
		if($content){
			$content.css({visibility:"hidden"}).hide().appendTo("body");
		}
		$dom.remove();
		if(param.lock!=false){
			lock.remove();
		}
		
	}
	return this;
}