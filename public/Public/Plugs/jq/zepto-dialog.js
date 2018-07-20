;(function($){
	$.confirm = function(param,callback){
		return new kConfirm(param,callback);
	};
	$.alert = function(param,callback){
		return new kAlert(param,callback);
	};
	$.ktext = function(param,callback){
		new kText(param,callback);
	};
	$.mtext = function(param,callback){
		new kMtext(param,callback);
	};
	$.win = function(param,callback){
		return new kWin(param,callback);
	};
	$.iframe = function(param,callback){
		param.contain = "<iframe style='width:100%;height:"+(param.height-40)+"px;border:none;' src='"+param.location+"'></iframe>";
		return kIframe(param,callback);
	};
	$.link = function(param,callback){
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
	};

	/**
	 * 屏幕锁
	 * @param $opacity
	 * @returns {*|HTMLElement}
     */
	function kLock($opacity){
		var $dom = $("<div></div>"),
			h = $(window).height()>$(document).height()?$(window).height():$(document).height();
		$dom.css({zIndex:10001,width:$(window).width(),height:h,background:'rgba(0,0,0,0.3)',position:"absolute",left:0,top:0}).appendTo("body");
		return $dom;
	}

	/**
	 * 弹出对话框
	 */
	function kConfirm(param,callback){
		var w = $(window).width(),h = $(window).height();
		var html_btn = '<div class="btns">'+ '<a class="cancel">取消</a>'+ '<a class="confirm">确认</a>'+ '</div>';
		var
			$dom = $(
				'<div class="g_confirm" style="width:'+(w-40)+'px;">'+
				'<div class="content">'+(typeof(param) == "string" ? param : param.text)+'</div>'+
				html_btn+
				'</div>'
			);
		var $lock = kLock(param.opacity);
		$dom.appendTo("body");
		$dom.css({left:w/2-$dom.width()/2,top:h/2-$dom.height()/2});
		//$dom.addClass("g_confirm_show");
		function remove(){
			$dom.remove();
			$lock.remove();
		}
		$dom.find(".cancel").bind("click",function(){
			remove();
		});
		$dom.find(".confirm").bind("click",function(){
			remove();
			if(callback){callback();}
		});
	}

	/**
	 * 弹出对话框
	 */
	function kAlert(param,callback){
		var w = $(window).width(),h = $(window).height();
		var html_btn = '<div class="btns">'+ '<a class="confirm">确认</a>'+ '</div>';
		var
			$dom = $(
				'<div class="g_alert" style="width:'+(w-40)+'px;">'+
				'<div class="content">'+(typeof(param) == "string" ? param : param.text)+'</div>'+
				html_btn+
				'</div>'
			);
		var $lock = kLock(param.opacity);
		$dom.appendTo("body");
		$dom.css({left:w/2-$dom.width()/2,top:h/2-$dom.height()/2});
		function remove(){
			$dom.remove();
			$lock.remove();
		}
		$dom.find(".confirm").bind("click",function(){
			remove();
			if(callback){callback();}
		});
	}

	/**
	 * 弹出文字提示
	 */
	function kText(param,callback){
		var zindex = param.zindex ? "z-index:"+param.zindex+";":"";
		var
			w = $(window).width(),
			h = $(window).height(),
			$dom = $(
				'<div class="g_text" style="width:'+(w-40)+'px;'+zindex+'">'+(typeof(param) == "string" ? param : param.text)+
				'</div>'
			);

		var lock = kLock(param.opacity);
		$dom.appendTo("body");
		var dom_left=w/2-$dom.width()/2;
		var dom_top=h/2-$dom.height()/2;
		$dom.css({'left':dom_left,'top':dom_top});

		setTimeout(remove,param.delay?param.delay:800);
		function remove(){
			lock.remove();
			$dom.remove();
			if(callback){callback();}
		}
	}

	/**
	 * 弹出小文字提示
	 */
	function kMtext(param,callback){
		var zindex = param.zindex ? "z-index:"+param.zindex+";":"";
		var
			w = $(window).width(),
			h = $(window).height(),
			$dom = $(
				'<div class="g_mtext" style="'+zindex+'">'+(typeof(param) == "string" ? param : param.text)+
				'</div>'
			);
		$dom.appendTo("body");
		var dom_left=w/2-$dom.width()/2;
		var dom_bottom = h/2-30/2;
		$dom.css({'left':dom_left,'bottom':dom_bottom});

		setTimeout(remove,param.delay?param.delay:800);
		function remove(){
			$dom.remove();
			if(callback){callback();}
		}
	}

	/**
	 * 弹出窗口容器
	 */
	function kWin(param,callback){
		var $dom =$(
			'<div class="g_win">'+
			'<div class="head">'+(param.title?param.title:"")+'</div>'+
			'<a class="close">×</a>'+
			'<div class="g_win_container">'+
			'</div>'+
			'</div>	');
		var w = $(window).width(),
			h = $(window).height();
		var lock = kLock(param.opacity);
		$dom.appendTo("body");
		$dom.css({height:param.height});
		$dom.find(".g_win_container").css({height:param.height-40,width:w}).scroll(function(e){
			e.preventDefault()
		});
		if(param.id)
		{
			var $content = $(param.id).css({visibility:"visible"}).show();

			//特殊情况-添加的是select框
			//$(param.id).find('.m-select_body').css({height:param.height-40-45});
			$dom.find(".g_win_container").html($content);
		}

		$dom.find(".close").bind("click",function(){
			remove();
		});
		this.drop = function(){
			remove();
		};
		function remove(){
			if($content){
				$content.css({visibility:"hidden"}).hide().appendTo("body");
			}
			$dom.remove();
			lock.remove();

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
			'<div class="head">'+(param.title?param.title:"")+'</div>'+
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
})(Zepto);