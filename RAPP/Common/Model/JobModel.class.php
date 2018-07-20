<?php 
namespace  Common\Model;
use Think\Model;
class JobModel extends Model{
	
	/**
	 * 根据id获得一条记录
	 * @param unknown_type $id
	 */
	public function getRow($id){
		$where['id'] = $id;
		return $this->where($where)->find();
	}
	public function deleteById($id){
		return $this->where(array('id'=>$id))->delete();
	}
	public function shieldById($id){
		return $this->where(array('id'=>$id))->setField('is_show',0);
	}
	public function showById($id){
		return $this->where(array('id'=>$id))->setField('is_show',1);
	}
	/**
	 * 根据id置顶
	 * @param unknown_type $id
	 */
	public function stick($id){
		$where['id'] = $id;
		return $this->where($where)->setField('update_time',time());
	}
	
}

?>