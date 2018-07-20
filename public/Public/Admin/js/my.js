

//列表页checkbox选择
$('.checkbox-all').change(function(){
    if($(this).is(':checked')){
        $('.checkbox-item').prop('checked',true);
    }else{
        $('.checkbox-item').prop('checked',false);
    }
});
$('.checkbox-item').change(function(){
    if($('.checkbox-item').filter(':checked').length == $('.checkbox-item').length){
        $('.checkbox-all').prop('checked',true);
    }else{
        $('.checkbox-all').prop('checked',false);
    }
});




/**
 * ajax删除一个
 * @param mod
 * @param id
 * @returns {boolean}
 */
function del_one(mod,id){
    $boot.confirm({text:'确认删除？'},function(){
        $.ajax({
            type:"post",
            url: "/Admin/Common/ajax_del",
            data: {'mod':mod,ids:[id]},
            success: function(res){
                if(res.status == 1)
                {
                    $boot.success({text:res.msg},function(){
                        window.location = window.location;
                    });
                }else
                {
                    $boot.error({text:res.msg});
                }
            }
        });
    });
    return false;
}

/**
 * ajax删除所选
 * @param mod
 * @returns {boolean}
 */
function del_all(mod){
    var ids = [];
    $('.checkbox-item').filter(':checked').each(function(){
        ids.push($(this).attr('data-id'));
    });
    if(ids.length < 1){
        $boot.error({text:'请至少选择一个选项'});
        return false;
    }
    $boot.confirm({text:'确认删除所选？'},function(){
        $.ajax({
            type:"post",
            url: "/Admin/Common/ajax_del",
            data: {mod:mod,ids:ids},
            success: function(res){
                if(res.status == 1)
                {
                    $boot.success({text:res.msg},function(){
                        window.location = window.location;
                    });
                }else
                {
                    $boot.error({text:res.msg});
                }
            }
        });
    });
    return false;
}

/**
 * ajax置顶一个
 * @param mod
 * @param $id
 * @returns {boolean}
 */
function stick_one(mod,id){
    $boot.confirm({text:'确认置顶？'},function(){
        $.ajax({
            type:"post",
            url: "/Admin/Common/ajax_stick",
            data: {mod:mod,ids:[id]},
            success: function(res){
                if(res)
                {
                    $boot.success({text:res.msg},function(){
                        window.location = window.location;
                    });
                }else
                {
                    $boot.error({text:res.msg});
                }
            }
        });
    });
    return false;
}

/**
 * ajax置顶所选
 * @param mod
 * @param $id
 * @returns {boolean}
 */
function stick_all(mod){
    var ids = [];
    $('.checkbox-item').filter(':checked').each(function(){
        ids.push($(this).attr('data-id'));
    });
    if(ids.length < 1){
        $boot.error({text:'请至少选择一个选项'});
        return false;
    }
    $boot.confirm({text:'确认置顶？'},function(){
        $.ajax({
            type:"post",
            url: "/Admin/Common/ajax_stick",
            data: {mod:mod,ids:ids},
            success: function(res){
                if(res)
                {
                    $boot.success({text:res.msg},function(){
                        window.location = window.location;
                    });
                }else
                {
                    $boot.error({text:res.msg});
                }
            }
        });
    });
    return false;
}

/**
 * ajax取消置顶一个
 * @param mod
 * @param id
 * @returns {boolean}
 */
function unstick_one(mod,id){
    $boot.confirm({text:'确认取消置顶？'},function(){
        $.ajax({
            type:"post",
            url: "/Admin/Common/ajax_unstick",
            data: {mod:mod,ids:[id]},
            success: function(res){
                if(res)
                {
                    $boot.success({text:res.msg},function(){
                        window.location = window.location;
                    });
                }else{
                    $boot.error({text:res.msg});
                }
            }
        });
    });
    return false;
}

/**
 * ajax取消置顶所选
 * @param mod
 * @param id
 * @returns {boolean}
 */
function unstick_all(mod){
    var ids = [];
    $('.checkbox-item').filter(':checked').each(function(){
        ids.push($(this).attr('data-id'));
    });
    if(ids.length < 1){
        $boot.error({text:'请至少选择一个选项'});
        return false;
    }
    $boot.confirm({text:'确认取消置顶？'},function(){
        $.ajax({
            type:"post",
            url: "/Admin/Common/ajax_unstick",
            data: {mod:mod,ids:ids},
            success: function(res){
                if(res)
                {
                    $boot.success({text:res.msg},function(){
                        window.location = window.location;
                    });
                }else{
                    $boot.error({text:res.msg});
                }
            }
        });
    });
    return false;
}

/**
 * ajax排序一个
 * @param mod
 * @param id
 * @param obj
 * @returns {boolean}
 */
function sort_one(mod,id){
    var old_sort = $('input[sort-id='+id+']').attr('old-sort');
    var now_sort = $('input[sort-id='+id+']').val();
    if(old_sort == now_sort){
        $boot.warn({text:"排序值未变化！"});
        return false;
    }
    $.ajax({
        type:"post",
        url:"/Admin/Common/ajax_setsort",
        data:{mod:mod,sort_data:[{'id':id,'sort':now_sort}]},
        success:function(res){
            if(res.status == 1){
                $boot.success({text:res.msg},function(){
                    window.location = window.location;
                });
            }else{
                $boot.error({text:res.msg});
            }
        }
    });
    return false;
}

/**
 * ajax排序所选
 * @param mod
 * @returns {boolean}
 */
function sort_all(mod){
    var sort_data = [];
    $("input[name=sort]").each(function(){
        var $id = $(this).attr('data-id'),$sort = $(this).val(),$old_sort = $(this).attr('old_sort');
        if($old_sort!=$sort){
            sort_data.push({id:$id,sort:$sort});
        }
    });
    $.ajax({
        type:"post",
        url:"/Admin/Common/ajax_setsort",
        data:{mod:mod,sort_data:sort_data},
        success:function(res){
            if(res.status == 1){
                $boot.success({text:res.msg},function(){
                    window.location = window.location;
                });
            }else{
                $boot.error({text:res.msg});
            }
        }
    });
    return false;
}

/**
 * 移动内容到
 * @param mod
 * @param to_id
 * @returns {boolean}
 */
function move_content_all(mod,to_id){
    var ids = [];
    $('.checkbox-item').filter(':checked').each(function(){
        ids.push($(this).attr('data-id'));
    });
    if(ids.length < 1){
        $boot.error({text:'请至少选择一个选项'});
        return false;
    }
    $.ajax({
        type:"post",
        url: "/Admin/Common/ajax_move_content",
        data: {mod:mod,ids:ids,to_id:to_id},
        success: function(res){
            if(res)
            {
                $boot.success({text:res.msg},function(){
                    window.location = window.location;
                });
            }else{
                $boot.error({text:res.msg});
            }
        }
    });
    return false;
}

/**
 * 显示所选
 * $_POST = ['mod'=>'','ids'=>[1,2,3]]
 * @returns {boolean}
 */
function show_all(mod){
    var ids = [];
    $('.checkbox-item').filter(':checked').each(function(){
        ids.push($(this).attr('data-id'));
    });
    if(ids.length < 1){
        $boot.error({text:'请至少选择一个选项'});
        return false;
    }
    $.ajax({
        type:"post",
        url: "/Admin/Common/ajax_show",
        data: {mod:mod,ids:ids},
        success: function(res){
            if(res)
            {
                $boot.success({text:res.msg},function(){
                    window.location = window.location;
                });
            }else{
                $boot.error({text:res.msg});
            }
        }
    });
    return false;
}

/**
 * 显示一个
 * $_POST = ['mod'=>'','ids'=>[1,2,3]]
 * @returns {boolean}
 */
function show_one(mod,id){
    $.ajax({
        type:"post",
        url: "/Admin/Common/ajax_show",
        data: {mod:mod,ids:[id]},
        success: function(res){
            if(res)
            {
                $boot.success({text:res.msg},function(){
                    window.location = window.location;
                });
            }else{
                $boot.error({text:res.msg});
            }
        }
    });
    return false;
}

/**
 * 关闭所选
 * $_POST = ['mod'=>'','ids'=>[1,2,3]]
 * @returns {boolean}
 */
function unshow_all(mod){
    var ids = [];
    $('.checkbox-item').filter(':checked').each(function(){
        ids.push($(this).attr('data-id'));
    });
    if(ids.length < 1){
        $boot.error({text:'请至少选择一个选项'});
        return false;
    }
    $.ajax({
        type:"post",
        url: "/Admin/Common/ajax_unshow",
        data: {mod:mod,ids:ids},
        success: function(res){
            if(res)
            {
                $boot.success({text:res.msg},function(){
                    window.location = window.location;
                });
            }else{
                $boot.error({text:res.msg});
            }
        }
    });
    return false;
}

/**
 * 关闭一个
 * $_POST = ['mod'=>'','ids'=>[1,2,3]]
 * @returns {boolean}
 */
function unshow_one(mod,id){
    $.ajax({
        type:"post",
        url: "/Admin/Common/ajax_unshow",
        data: {mod:mod,ids:[id]},
        success: function(res){
            if(res)
            {
                $boot.success({text:res.msg},function(){
                    window.location = window.location;
                });
            }else{
                $boot.error({text:res.msg});
            }
        }
    });
    return false;
}