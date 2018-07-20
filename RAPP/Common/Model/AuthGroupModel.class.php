<?php
namespace Common\Model;
use Common\Model\_BaseModel;
class AuthGroupModel extends _BaseModel{
	/**
	 * 自动验证、完成
	 * @var array
	 * @author zjf
	 */
	protected $_validate = array(
		array('title','require','权限组名称不能为空！'), //默认情况下用正则进行验证
	);
	
	protected $_auto = array(
		array('status','1',1),
	);

}