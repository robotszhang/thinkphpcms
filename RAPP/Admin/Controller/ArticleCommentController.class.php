<?php
namespace Admin\Controller;
use Admin\Controller;
class ArticleCommentController extends RootController{
	/**
	 * 文章评论列表
	 * @author zjf
	 */
	public function commentlist(){
		if($_GET['articleid']){$where['articleid'] = $_GET['articleid'];}
		if($_GET['id']){$where['id'] = $_GET['id'];}
		if($_GET['user']){$where['user'] = $_GET['user'];}
		if($_GET['email']){$where['email'] = $_GET['email'];}
		$_GET['status'] = isset($_GET['status'])?$_GET['status']:1;
		$where['status'] = $_GET['status'];
		if($_GET['body']){
			$where['body'] = array('like','%'.$_GET['body'].'%');
		}
		//分页
		$count = D('ArticleCommentView')->where($where)->count();
		$Page = new \Think\Page($count,30);
		$show = $Page->show();
		//主数据
		$alist = D('ArticleCommentView')->where($where)->field(true)->order('status desc,addtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('pages',$show);
		$this->assign('commentlist',$alist);
		$this->display();
	}
	
	/**
	 * 评论编辑
	 * @author zjf
	 */
	public function edit(){
		if(IS_POST){
			$post = I('post.');
			$res = D('ArticleComment')->save_item($post);
			if(!$res['status']){
				$this->error($res['error']);
			}else{
				$this->success('编辑成功！');
			}
		}else{
			$page = D('ArticleCommentView')->where(array('id'=>$_GET['id']))->find();
			$this->assign('page',$page);
			$this->display();
		}
	}
	
	/**
	 * ajax返回禁用结果
	 * @ajaxRreturn 0-失败  1-成功
	 * @author zjf
	 */
	public function ajax_forbidden(){
		$res = D("ArticleComment")->set_status(array('id'=>$_POST['id']),0);
		$this->ajaxReturn($res);
	}
	
	/**
	 * ajax返回开启结果
	 * @ajaxRreturn 0-失败  1-成功
	 * @author zjf
	 */
	public function ajax_open(){
		$res = D("ArticleComment")->set_status(array('id'=>$_POST['id']),1);
		$this->ajaxReturn($res);
	}
}