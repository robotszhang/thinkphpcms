<?php
namespace Admin\Controller;
use Admin\Controller;
class AuthController extends RootController{
	
	/*======================================规则表auth_rule===================================*/
	/**
	 * 规则列表
	 *@create 2014-12-12
	 *@author  zjf
	 */  
	public function rulelist(){
		$where = array();
		if(isset($_GET['status'])){
			$where['status'] = $_GET['status'];
		}
		$count = M("AuthRule")->where($where)->count();
		$Page = new \Think\Page($count,20);
		$show = $Page->show();
		$list = M("AuthRule")->where($where)->limit($Page->firstRow.','.$Page->listRows)->order(array('id'=>'desc'))->select();
		$this->assign('pages',$show);
		$this->assign('rulelist',$list);
		$this->display();
	}
	
	/**
	 * 新增规则
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function ruleadd(){
		if(IS_POST){
			$res = D('AuthRule')->add_item($_POST);
			if(!$res['status']){
				$this->error($res['error']);
			}else{
				$this->success('添加成功！','Auth/rulelist');
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 编辑规则
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function ruleedit(){
		if(IS_POST){
			$res = D('AuthRule')->save_item($_POST);
			if(!$res['status']){
				$this->error($res['error']);
			}else{
				$this->success('添加成功！','Auth/rulelist');
			}
		}else{
			$page = D('AuthRule')->get_item(array('id'=>$_GET['id']),0);
			$this->assign('page',$page);
			$this->display();
		}
	}
	
	/**
	 *ajax删除规则
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function ajax_ruledel(){
		$res = D('AuthRule')->del_item(array('id'=>$_POST['id']));
		$this->ajaxReturn($res);
	}
	
	/**
	 *ajax禁用规则
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function ajax_ruleforbidden(){
		$res = D('AuthRule')->set_status(array('id'=>$_POST['id']),0);
		$this->ajaxReturn($res);
	}
	
	/**
	 *ajax开启规则
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function ajax_ruleopen(){
		$res = D('AuthRule')->set_status(array('id'=>$_POST['id']),1);
		$this->ajaxReturn($res);
	}
	
	/*======================================权限组表auth_group===================================*/
	
	/**
	 *权限组列表
	 *@create 2014-12-12
	 *@author zjf
	 */
	public function grouplist(){
		$where = array();
		if(isset($_GET['status'])){
			$where['status'] = $_GET['status'];
		}
		$count = M("AuthGroup")->where($where)->count();
		$Page = new \Think\Page($count,20);
		$show = $Page->show();
		$list = M("AuthGroup")->where($where)->limit($Page->firstRow.','.$Page->listRows)->order(array('id'=>'desc'))->select();
		foreach($list as &$val){
			$res = D('AuthRule')->get_item(array('id'=>array('in',$val['rules'])),1);
			$names = array();  
			$names = array_reduce($res, function($v,$w){$v[]="[".$w["title"]."]";return $v;}); 
			$val['rules'] = implode(' , ',$names);
		}
		$this->assign('pages',$show);
		$this->assign('rulelist',$list);
		$this->display();
	}
	  
	/**
	 *新增权限组
	 *@create 2014-12-12
	 *@author zjf
	 */
	public function groupadd(){
	if(IS_POST){
			$_POST['rules'] = implode(',',$_POST['rules']);
			$res = D('AuthGroup')->add_item($_POST);
			if(!$res['status']){
				$this->error($res['error']);
			}else{
				$this->success('添加成功！','Auth/grouplist');
			}
		}else{
			$rulelist = D("AuthRule")->get_item(array(),1,array('id'=>'desc'));
			$this->assign('rulelist',$rulelist);
			$this->display();
		}
	}
	
	/**
	 * 编辑权限组
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function groupedit(){
		if(IS_POST){
			$_POST['rules'] = implode(',',$_POST['rules']);
			$res = D('AuthGroup')->save_item($_POST);
			if(!$res['status']){
				$this->error($res['error']);
			}else{
				$this->success('编辑成功！','Auth/grouplist');
			}
		}else{
			$rulelist = D("AuthRule")->get_item(array(),1,array('id'=>'desc'));
			$this->assign('rulelist',$rulelist);
			$page = D('AuthGroup')->get_item(array('id'=>$_GET['id']),0);
			$this->assign('page',$page);
			$this->display();
		}
	}
	
	/**
	 *ajax删除权限组
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function ajax_groupdel(){
		$res = D('AuthGroup')->del_item(array('id'=>$_POST['id']));
		$this->ajaxReturn($res);
	}
	
	/**
	 *ajax禁用权限组
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function ajax_groupforbidden(){
		$res = D('AuthGroup')->set_status(array('id'=>$_POST['id']),0);
		$this->ajaxReturn($res);
	}
	
	/**
	 *ajax开启权限组
	 *@create 2014-12-12
	 *@author  zjf
	 */
	public function ajax_groupopen(){
		$res = D('AuthGroup')->set_status(array('id'=>$_POST['id']),1);
		$this->ajaxReturn($res);
	}
	
}