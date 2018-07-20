<?php 
namespace Admin\Controller;

class EmptyController extends \Think\Controller {

    public function unified_ajax_option() {
        $post = $_POST;
        if($post['type'] == 'delete') {
            if(false !== M($post['mod'])->delete($post['data'])) {
                $this->ajaxReturn(1, '删除成功^ ^');
            } else {
                $this->ajaxReturn(0, '删除失败啦= =');
            }
        } else {
            $res = M($post['mod'])->saveAll($data);
            if(false !== $res) {
                $this->ajaxReturn(1, '成功^ ^', $res);
            } else {
                $this->ajaxReturn(0, '失败= =', $res);
            }
        }

    }

}