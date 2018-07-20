<?php 
namespace Common\Model;
use Common\Model\_BaseModel;
class ArticleCommentModel extends _BaseModel{
	/**
	 * 自动验证、完成
	 * @var unknown_type
	 */
	protected $_validate = array(

	);
	
	protected $_auto = array(
			array('addtime','time',1,'function'),
	);
	
	
}
?>