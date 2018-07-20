<?phpnamespace Common\Model;use Common\Model\_BaseModel;class ManagerModel extends _BaseModel{	/**	 * 自动验证、完成	 * @var unknown_type	 */	protected $_validate = array(		array('user','require','用户名不能为空！'), //默认情况下用正则进行验证		array('user','check_manager_user','用户名已经存在！',0,'callback',1),		array('pass','require','密码不能为空！'),	);		protected $_auto = array(		array('pass','md5',1,'function'),	);		protected $prefix;	protected function _initialize(){		$this->prefix = C('DB_PREFIX');	}		/**	 * 检查用户名是否存在	 * @param string  用户名	 * @return 存在 返回 false  , 不存在返回true	 * @author zjf	 */	protected function check_manager_user($user){
		return !$this->where(array('user'=>$user))->field('id')->find();
	}
	/**
	 * 判断用户是否存在
	 * @param 用户名
	 * @return 存在返回记录，不存在返回false
	 * @author zjf
	 */
	public function exist_manager($mixuser){
		$where['user'] = $mixuser;
		return $this->where($where)->find();
	}
	/**
	 * 检测用户名密码是否合法
	 * @param array [用户名,密码]
	 * @return array [状态,详情]
	 * @author zjf
	 */
	public function check_account($arr){
		$res = $this->exist_manager($arr['user']);
		if(!$res){
			return array('status'=>0,'error'=>'用户名不存在！');
		}elseif($res['pass'] != md5($arr['pass'])){
			return array('status'=>0,'error'=>'密码不正确！');
		}else{
			return array('status'=>1,'data'=>$res);
		}
	}		/**	 * 写入管理员签名	 * @param array [id,用户名[,...]]	 * @author zjf	 */	public function sign_account($arr){		session('auth_manager',$arr);		session('auth_manager_sign',auth2code($arr));	}		/**	 * 清除管理员签名	 * @author zjf	 */	public function clear_account(){		session('auth_manager',NULL);		session('auth_manager_sign',NULL);	}		/**	 * 判断管理员是否登录	 * @return number 0-未登录    number >0-用户id	 * @author zjf	 */	function is_login(){		$auth_manager = session('auth_manager');		if (empty($auth_manager)) {			return 0;		} else {			return session('auth_manager_sign') == auth2code($auth_manager) ? $auth_manager['id'] : 0;		}	}				}