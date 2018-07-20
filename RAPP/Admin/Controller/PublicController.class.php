<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{

	protected function _initialize(){
		session_start();
	}

	/**
	 * 后台登录入口
	 * @author zjf
	 */
	public function login(){
		if(IS_POST){
			$_POST = I('post.');
            if(empty($_POST['user'])){
                $this->error('用户名不能为空！');
            }
            if(empty($_POST['pass'])){
                $this->error('密码不能为空！');
            }
            if(empty($_POST['verify'])){
                $this->error('验证码不能为空！');
            }
            if(!check_verify($_POST['verify'])){
                $this->error('验证码错误！');
            }
            $res = D('Manager')->check_account($_POST);
            if(!$res['status']){
                $this->error($res['error']);
            }else{
                D('Manager')->sign_account(array('id'=>$res['data']['id'],'user'=>$res['data']['user']));
                $arr['id'] = $res['data']['id'];
                $arr['lastlogintime'] = time();
                $arr['lastloginip'] = get_client_ip();
                $arr['logintimes'] = $res['data']['logintimes']+1;
                D('Manager')->save_item($arr);
                $this->success('登录成功');
            }
		}else{
			$this->display();
		}
	}

	/**
	 * 登出
	 * @author zjf
	 */
    public function logout(){
        D('Manager')->clear_account();
		$this->success('退出成功！','Public/login');

	}

	/**

	 * 生成验证码

	 */

	public function verify(){
		$config = array(
			'fontSize' => '16',
			'imageW' => '400',
			'imageH' => '38',
			'length' => '4',
			'useCurve'  =>  false,            // 是否画混淆曲线
			'useNoise'  =>  true,            // 是否添加杂点
			'fontttf'   =>  '4.ttf',
		);
		ob_clean();
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

}