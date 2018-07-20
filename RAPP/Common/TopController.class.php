<?php
namespace Common;
class TopController extends \Think\Controller {

    protected function _initialize() {
        header("Content-type:text/html;charset=utf-8");
        $this->prefix = C('DB_PREFIX');
        //站点信息
		$setting = M('Setting')->field(true)->select();
		foreach ($setting as $key => &$val) {
			$arr[$val['key']] = $val['value'];
		}
        $this->setting = $arr;
        $this->assign('setting', $arr);
    }
}