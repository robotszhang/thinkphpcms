<?php
namespace Admin\Controller;
use Admin\Controller;
class AdCateController extends RootController{

    /**
     * 功能描述
     * @author zjf ${date}
     */
	public function index(){
	    $count = M('AdCate')->count();
        $Page = getpage($count,15);
        $this->assign('pages',$Page->show());
		$catelist = M('AdCate')->field(true)->order('sort asc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($catelist as &$val){
			$val['total'] = M("Ad")->where(array('cate_id'=>$val['id']))->count();
		}
		$this->assign('list',$catelist);
		$this->display();
	}
	
	/**
	 *新增分类
	 *@create 2015-2-6
	 *@author zjf
	 */
	public function add(){
		$res = M('AdCate')->add($_POST);
		if($res){
			$this->redirect('AdCate/index');
		}else{
			$this->error('添加失败！');
		}
	}
	
	/**
	 *编辑分类
	 *@create 2015-2-6
	 *@author zjf
	 */
	public function edit(){
		if(IS_POST){
			$res = M('AdCate')->save($_POST);
			if(false !== $res){
                $this->redirect('AdCate/index',[],1,'编辑成功！');
			}else{
				$this->error('编辑失败！');
			}
		}else{
			$page = M('AdCate')->find($_GET['id']);
			$this->assign('page',$page);
			$this->display();
		}
	
	}
	/**
	 * 删除一个分类
	 * =0(删除失败),=1(删除成功),=2(当前分类下有文章),=3(当前分类有子类)
	 */
	public function ajax_del_cate(){
		$ids = D("AdCate")->get_child_ids($_POST['id']);
		$article = M('Ad')->where(array('pid'=>array('in',$ids)))->find();
		if($article){
			$this->ajaxReturn(array('status'=>0,'error'=>'当前分类或子类下有文章，请删除后进行此操作！'));
		}
		$res = D('AdCate')->del_cate($_POST['id']);
		if($res){
			M('AdAttr')->where(array('cateid'=>$_POST['id']))->delete();
		}
		$this->ajaxReturn(array('status'=>1,'ids'=>explode(',',$ids)));
	}

	/**
	 *ajax设置排序
	 *@create 2014-12-16
	 *@author zjf
	 */
	public function ajax_setsort(){
		$res = D('AdCate')->update_sort($_POST['id'],$_POST['sort']);
		$this->ajaxReturn($res);
	}
	
}