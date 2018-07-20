<?php
namespace Common\Model;
use Common\Model\_BaseModel;
class AuthRuleModel extends _BaseModel{
	/**
	 * 自动验证、完成
	 * @var array
	 * @author zjf
	 */
	protected $_validate = array(
		array('title','require','规则名称不能为空！'), //默认情况下用正则进行验证
		array('name','check_unique','该节点规则已经存在！',1,'callback'),
	);
	
	protected $_auto = array(
		array('status','1',1),
	);

	/**
	 * 验证节点是否存在或是否为空
	 *@param  string  节点规则(a-b-c)
	 *@return  boolean  false-存在   true-不存在
	 *@create 2014-12-12
	 *@author  zjf
	 */  
	protected function check_unique($name){
		$res = $this->where(array('name'=>$name))->select();
		if(!$res){
			return true;
		}else{
			foreach($res as &$val){
				if(!empty($val['name'])&&$val['name'] == $name){
					return false;
				}
			}
		}	
		return true;
	}

}