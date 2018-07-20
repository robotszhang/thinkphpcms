<?php
namespace Home\Controller;
use Common\TopController;
class RootController extends TopController {
    public function _empty($action)
    {
        $this->display(CONTROLLER_NAME. '/'. $action);
    }
    //首页
    public function _initialize() {

        parent::_initialize();
    }
}