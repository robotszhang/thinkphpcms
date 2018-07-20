//文本编辑器
function _editor(obj){
	return UE.getEditor(obj);
}

//文本编辑器
function _meditor(obj){
	return UM.getEditor(obj);
}

// array unique
Array.prototype.unique = function()
{
    this.sort();
    var re=[this[0]];
    for(var i = 1; i < this.length; i++)
    {
        if( this[i] !== re[re.length-1])
        {
            re.push(this[i]);
        }
    }
    return re;
}

//颜色选择器

function colorpicker($id,param){
	$("#"+$id).spectrum({
		allowEmpty: true,
		preferredFormat:"hex",
		allowEmpty:true,
	    showInput:true,
	    hideAfterPaletteSelect:true,
	    showPalette: true,
	    showPaletteOnly: true,
	    togglePaletteOnly: true,
	    palette:[
	             ["#000000", "#434343", "#666666", "#999999", "#b7b7b7", "#cccccc", "#d9d9d9", "#efefef", "#f3f3f3", "#ffffff"],
	             ["#980000", "#ff0000", "#ff9900", "#ffff00", "#00ff00", "#00ffff", "#4a86e8", "#0000ff", "#9900ff", "#ff00ff"],
	             ["#e6b8af", "#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d9ead3", "#c9daf8", "#cfe2f3", "#d9d2e9", "#ead1dc"],
	             ["#dd7e6b", "#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#a4c2f4", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
	             ["#cc4125", "#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6d9eeb", "#6fa8dc", "#8e7cc3", "#c27ba0"],
	             ["#a61c00", "#cc0000", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3c78d8", "#3d85c6", "#674ea7", "#a64d79"],
	             ["#85200c", "#990000", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#1155cc", "#0b5394", "#351c75", "#741b47"],
	             ["#5b0f00", "#660000", "#783f04", "#7f6000", "#274e13", "#0c343d", "#1c4587", "#073763", "#20124d", "#4c1130"]
	         ],
	   change: param.change
	});
}


/**
 * input焦点
 */
/*
function focus_blur(id){
	$("#"+id).css({'color':'#999'});
	$("#"+id).focus(function(){
		var default_val = $(this).attr('default_val');
		var $text = $.trim($(this).val());
		if($text==default_val){
			$(this).val('').css({'color':'#444'});
		}
	}).blur(function(){
		var default_val = $(this).attr('default_val');
		var $text = $.trim($(this).val());
		if($text==''){
			$(this).val(default_val).css({'color':'#999'});
		}
	});	
}
*/

//默认初始化新日历控件方法
function init_calendar(id,format) {
    format = format?format:'Y-m-d H:i';
    $(id).flatpickr({
        enableTime: true,
        dateFormat: format,
        locale: "zh"
    });
}


/*ajax表单提交*/
function ajax_form(form_id,fun){
	$(form_id).submit(function(){
		var url = $(this).attr('action');
		var form_data = $(this).serialize();
		$.ajax({
			url:url,
			type:"post",
			data:form_data,
			success:fun
		});
		return false;
	});
	
}

//写cookies
function setCookie(c_name,value,expiredays) {
	var exdate=new Date();
	var expiredays = 66666;
	exdate.setDate(exdate.getDate()+expiredays);
	//path=/;
	document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString())+";";
}
//获取cookies
function getCookie(c_name)
{
	if (document.cookie.length>0)
	{
		c_start=document.cookie.indexOf(c_name + "=")
		if (c_start!=-1)
		{
			c_start=c_start + c_name.length+1
			c_end=document.cookie.indexOf(";",c_start)
			if (c_end==-1) c_end=document.cookie.length
			return unescape(document.cookie.substring(c_start,c_end))
		}
	}
	return ""
}
//删除cookies
function delCookie(name)
{
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval=getCookie(name);
	if(cval!=null)
		document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

//默认初始化新日历控件方法
function _init_calendar() {
	$('.input_cxcalendar').each(function(){
		var a = new Calendar({
			targetCls: $(this),
			//type: 'yyyy-mm-dd' 或者 ‘yyyy-mm-dd HH:MM:SS’ 或者 ‘yyyy-mm-dd HH:MM’;
			type: 'yyyy-mm-dd HH:MM:SS',
			//wday:2
		},function(val){
			console.log(val);
		});
	});
}
