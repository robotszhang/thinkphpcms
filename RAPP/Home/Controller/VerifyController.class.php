<?php 
namespace Home\Controller;
class VerifyController extends RootController{

	/**
	 * 生成验证码
	 */
	public function verify() {
		$config = array(
			'fontSize' => '16',
			'imageW' => '106',
			'imageH' => '45',
			'length' => '4',
			'useCurve' => false,            // 是否画混淆曲线
			'useNoise' => true,            // 是否添加杂点
			'fontttf' => '4.ttf',
		);
		ob_clean();
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

}