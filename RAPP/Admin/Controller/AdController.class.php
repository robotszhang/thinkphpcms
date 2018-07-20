<?php
namespace Admin\Controller;
use Admin\Controller;
class AdController extends RootController{
	/*=======================================内容===================================*/
	/**
	 *链接列表
	 *@create 2014-12-16
	 *@author zjf
	 */
	public function index(){
		//载入分类
		$this->assign('catelist',D('AdCate')->get_cate_list());
		//当前分类id
        $where = [];
		if($_GET['cate_id']){
            $where['cate_id'] = $_GET['cate_id'];
        }
		//分页
		$Ad = M('Ad');
		$count = $Ad->where($where)->count();
		$Page = getpage($count,15);
        $this->assign('pages',$Page->show());
		//主数据
		$adlist = $Ad->where($where)->field(true)->order(array('sort','id'=>'asc'))->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$adlist);
		$this->display();
	}

	/**
	 *添加链接
	 *@create 2014-12-16
	 *@author zjf
	 */
	public function add(){
		if(IS_POST){
			$_POST['created_at'] = $_POST['updated_at'] = time();
            $_POST['end_at'] = strtotime($_POST['end_at']);
			$res = M('Ad')->add($_POST);
			if(!$res){
				$this->error('对不起，发布失败！');
			}else{
				$this->redirect('Ad/index',array('cate_id'=>$_POST['cate_id']),1,'发布成功！');
			}
		}else{
			//载入分类
            $catelist = D('AdCate')->get_cate_list();
			$this->assign('catelist',$catelist);
			//分类图片尺寸
            if(!$_GET['cate_id']){
                $_GET['cate_id'] = $catelist[0]['id'];
            }
			$this->assign('cate_pic_size', M('AdCate')->field('width,height')->find($_GET['cate_id']));
			$this->display();
		}
	}

	/**
	 *编辑链接
	 *@create 2014-12-16
	 *@author zjf
	 */
	public function edit(){
		if(IS_POST){
			$_POST['updated_at'] = time();
			$_POST['end_at'] = strtotime($_POST['end_at']);
			$res = M('Ad')->save($_POST);
            if(false !== $res){
                $this->redirect('Ad/index',array_decode($_GET['jump_url']),1,'编辑成功！');
			}else{
                $this->error('对不起，编辑失败！');
			}
		}else{
			//载入分类
			$this->assign('catelist',D('AdCate')->get_cate_list());
			$res = D('Ad')->find($_GET['id']);
			$this->assign('page',$res);
			//分类图片尺寸
			$this->assign('cate_pic_size', M('AdCate')->field('width,height')->where(['id'=>$res['cate_id']])->find());
			$this->display();
		}
	}

	/**
	 *ajax删除链接
	 *@create 2014-12-16
	 *@author zjf
	 */
	public function ajax_del(){
		$res = D('Ad')->del_item(array('id'=>$_POST['id']));
		$this->ajaxReturn($res);
	}

	/**
	 *设置排序
	 *@create 2014-12-16
	 *@author zjf
	 */
	public function ajax_setsort(){
		$data['id'] = $_POST['id'];
		$data['sort'] = $_POST['sort'];
		$res = D('Ad')->save_item($data);
		$this->ajaxReturn($res);
	}
}