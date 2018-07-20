var $boot={};

/**
 * confirm确认框
 * @param obj  {text:''}
 * @param callback
 * @returns {boolean}
 */
$boot.confirm = function(obj,callback){
    if(!obj.text){
        return false;
    }
    if($('#js-boot-confirm').length){
        var $dom = $('#js-boot-confirm');
    }else{
        var $dom = $(
        '<div class="modal fade" id="js-boot-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
            '<div class="modal-dialog" role="document">'+
                '<div class="modal-content">'+
                    '<div class="modal-header">'+
                        '<h5 class="modal-title" id="js-boot-confirm-title">提示</h5>'+
                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                            '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>'+
                    '<div class="modal-body" id="js-boot-confirm-body"></div>'+
                    '<div class="modal-footer">'+
                        '<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>'+
                        '<button type="button" class="btn btn-primary" id="js-yes">确定</button>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>');
    }
    $dom.find('#js-boot-confirm-title').text(obj.title?obj.title:'提示');
    $dom.find('#js-boot-confirm-body').text(obj.text);
    $dom.appendTo('body').modal({show:true,focus:false});

    $dom.find('#js-yes').click(function(){
        $dom.modal('hide');
        callback && callback();
    });
}


/**
 * 成功提示框
 * @param obj  {text:''}
 * @returns {boolean}
 */
$boot.success = function(obj,callback){
    if(!obj.text){
        return false;
    }
    if($('#js-boot-success').length){
        var $dom = $('#js-boot-success');
    }else{
        var $dom = $(
        '<div class="modal fade" id="js-boot-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
            '<div class="modal-dialog" role="document">'+
                '<div class="modal-content" style="border: none;">'+
                    '<div style="margin:0; text-align: center;" class="alert alert-success" role="alert" id="js-boot-success-body"></div>'+
                '</div>'+
            '</div>'+
        '</div>');
    }
    $dom.find('#js-boot-success-body').text(obj.text);
    $dom.appendTo('body').modal({show:true,focus:false,backdrop:false});
    setTimeout(function(){
        $dom.modal('hide');
        callback && callback();
    },obj.delay?obj.delay:1200);
}


/**
 * 错误提示框
 * @param obj  {text:''}
 * @returns {boolean}
 */
$boot.error = function(obj,callback){
    if(!obj.text){
        return false;
    }
    if($('#js-boot-error').length){
        var $dom = $('#js-boot-error');
    }else{
        var $dom = $(
        '<div class="modal fade" id="js-boot-error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
            '<div class="modal-dialog" role="document">'+
                '<div class="modal-content" style="border: none;">'+
                    '<div style="margin:0;text-align: center;" class="alert alert-danger" role="alert" id="js-boot-error-body"></div>'+
                '</div>'+
            '</div>'+
        '</div>');
    }
    $dom.find('#js-boot-error-body').text(obj.text);
    $dom.appendTo('body').modal({show:true,focus:false,backdrop:false});
    setTimeout(function(){
        $dom.modal('hide');
        callback && callback();
    },obj.delay?obj.delay:1200);
}


/**
 * 警告提示框
 * @param obj  {text:''}
 * @returns {boolean}
 */
$boot.warn = function(obj,callback){
    if(!obj.text){
        return false;
    }
    if($('#js-boot-warn').length){
        var $dom = $('#js-boot-warn');
    }else{
        var $dom = $(
        '<div class="modal fade" id="js-boot-warn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
            '<div class="modal-dialog" role="document">'+
                '<div class="modal-content" style="border: none;">'+
                    '<div style="margin:0;text-align: center;" class="alert alert-warning" role="alert" id="js-boot-warn-body"></div>'+
                '</div>'+
            '</div>'+
        '</div>');
    }
    $dom.find('#js-boot-warn-body').text(obj.text);
    $dom.appendTo('body').modal({show:true,focus:false,backdrop:false});
    setTimeout(function(){
        $dom.modal('hide');
        callback && callback();
    },obj.delay?obj.delay:1200);
}


/**
 * alert框
 * @param obj {text:''}
 * @returns {boolean}
 */
$boot.alert = function(obj){
    if(!obj.text){
        return false;
    }
    if($('#js-boot-alert').length){
        var $dom = $('#js-boot-alert');
    }else{
        var $dom = $(
        '<div class="modal fade" id="js-boot-alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
            '<div class="modal-dialog" role="document">'+
                '<div class="modal-content">'+
                    '<div class="modal-header">'+
                        '<h5 class="modal-title" id="js-boot-alert-title">提示</h5>'+
                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                            '<span aria-hidden="true">&times;</span>'+
                        '</button>'+
                    '</div>'+
                    '<div class="modal-body" id="js-boot-confirm-body"></div>'+
                    '<div class="modal-footer">'+
                        '<button type="button" class="btn btn-primary" data-dismiss="modal">知道了</button>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>');
    }
    $dom.find('#js-boot-alert-title').text(obj.title?obj.title:'提示');
    $dom.find('#js-boot-alert-body').text(obj.text);
    $dom.appendTo('body').modal({show:true,focus:false});
}


/**
 * win框
 * @param obj  {id:'#as',size:'lg'}  id:页面中载入的内容块id,size:窗体大小设置，默认小窗口
 * @returns {boolean}
 */
$boot.win = function(obj,obj_callback){
    if(!obj.id){
        return false;
    }
    if($('#js-boot-win').length){
        var $dom = $('#js-boot-win');
    }else{
        var $dom = $(
            '<div class="modal fade" id="js-boot-win" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                '<div class="modal-dialog" role="document">'+
                    '<div class="modal-content">'+
                        '<div class="modal-header">'+
                            '<h5 class="modal-title" id="js-boot-win-title"></h5>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                        '</div>'+
                        '<div class="modal-body" id="js-boot-win-body"></div>'+
                    '</div>'+
                '</div>'+
            '</div>');
    }
    if(obj.size=='lg'){
        $dom.find('.modal-dialog').addClass('modal-lg');
    }else{
        $dom.find('.modal-dialog').removeClass('modal-lg');
    }
    $dom.find('#js-boot-win-title').text(obj.title?obj.title:'默认窗口');
    $dom.find('#js-boot-win-body').append($(obj.id).children());
    $dom.appendTo('body');

    $dom.on('hidden.bs.modal', function (e) {
        $(obj.id).append($dom.find('#js-boot-win-body').children());
    })


    /*if(obj_callback.show){
        $dom.on('show.bs.modal', function (e) {
            obj_callback.show(e);
        })
    }
    if(obj_callback.shown){
        $dom.on('shown.bs.modal', function (e) {
            obj_callback.show(e);
        })
    }
    if(obj_callback.hide){
        $dom.on('hide.bs.modal', function (e) {
            obj_callback.show(e);
        })
    }
    if(obj_callback.hidden){
        $dom.on('hidden.bs.modal', function (e) {
            obj_callback.show(e);
        })
    }*/
    $dom.modal({show:true,focus:false});
}

/**
 * loading框
 * @param obj  {bg:'rgba(0,0,0,0.1)',text:'加载中...'}  bg:加载背景，默认没有，text:加载提示,默认没有
 * @returns {boolean}
 */
$boot.loading = function(obj){
    obj = obj?obj:{};
    var str = '<div style=" position: fixed;left:0px;top:0px;width:100%; height: 100%;background:'+(obj.bg?obj.bg:'rgba(0,0,0,0)')+';z-index:1051;transition: all 1s;-webkit-transition: all 1s;-moz-transition: all 1s;-o-transition: all 1s;"><img src="/Public/bootstrap/loading.gif" style="position:absolute;left:50%;top:50%;width:60px;height: 60px;margin:-60px 0 0 -30px; z-index:1052;transition: all 1s;-webkit-transition: all 1s;-moz-transition: all 1s;-o-transition: all 1s;" /><div style="position:absolute;left:0;top:50%;width:100%;height:1.4rem;line-height:1.4rem; text-align: center;">'+(obj.text?obj.text:'')+'</div></div>';
    var $dom = $(str);
    $dom.appendTo('body');
    $dom.close = function(){
        $dom.css({opacity:0});
        setTimeout(function(){
            $dom.remove();
        },1000);
    }
    return $dom;
}