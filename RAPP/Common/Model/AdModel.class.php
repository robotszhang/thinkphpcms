<?php 
namespace Common\Model; 
use Common\Model\_BaseModel;
class AdModel extends _BaseModel{
	/**
	 * 获取链接列表
	 * @param unknown_type $pid  分类id
	 * @param unknown_type $type
	 */
	public function get_adlist($pid,$type = 1){
		if($type == 1){
			return M('Ad')->where(array('pid'=>$pid))->order(array('sort','id'=>'asc'))->select();
		}elseif($type == 0){
			$ids = D('AdCate')->get_child_ids($pid,0);
			return M('Ad')->where(array('pid'=>array('in',$ids)))->order(array('sort','id'=>'asc'))->select();
		}
	}
}