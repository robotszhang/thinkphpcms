<?php
namespace Admin\Controller;
use Admin\Controller;
class MapController extends RootController{

    /**
     * 地图列表
     * @author zjf ${date}
     */
	public function index(){
        $where = [];
        if($_GET['title']){
            $where['title'] = array('like','%'.$_GET['title'].'%');
        }
        //分页
        $map = M('Map');
        $count = $map->where($where)->count();
        $Page = getpage($count,15);
        $this->assign('pages',$Page->show());
        //主数据
        $adlist = $map->where($where)->field(true)->order(array('id'=>'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$adlist);
        $this->display();
	}

    /**
     * 新增
     * @author zjf ${date}
     */
    public function add(){
        if(IS_POST){
            $_POST['created_at'] = $_POST['updated_at'] = time();
            $_POST['description'] = htmlspecialchars($_POST['description']);
            $res = M('Map')->add($_POST);
            if(!$res){
                $this->error('对不起，发布失败！');
            }else{
                $this->redirect('Map/index',[],1,'发布成功！');
            }
        }else{
            $this->display();
        }
    }

    /**
     * 编辑
     * @author zjf ${date}
     */
    public function edit(){
        if(IS_POST){
            $_POST['updated_at'] = time();
            $_POST['description'] = htmlspecialchars($_POST['description']);
            $res = M('Map')->save($_POST);
            if(!$res){
                $this->error('编辑失败！');
            }else{
                $this->redirect('Map/index',[],1,'编辑成功！');
            }
        }else{
            $page = M('Map')->find($_GET['id']);
            $this->assign('page',$page);
            $this->display();
        }
    }

}