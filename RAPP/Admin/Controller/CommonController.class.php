<?php
namespace Admin\Controller;
use Admin\Controller;
class CommonController extends RootController{

    /**
     *ajax删除内容
     * param ids = [1,2,3]
     *@create 2014-12-19
     *@author zjf
     */
    public function ajax_del(){
        $_POST = I('post.');
        $res = M($_POST['mod'])->where(array('id'=>array('in',$_POST['ids'])))->delete();
        if($res){
            $this->ajaxReturn(['status'=>1,'msg'=>'删除成功']);
        }else{
            $this->ajaxReturn(['status'=>0,'msg'=>'删除失败']);
        }
    }

    /**
     *ajax置顶文章
     * param ids = [1,2,3]
     *@create 2014-12-19
     *@author zjf
     */
    public function ajax_stick(){
        $_POST = I('post.');
        $res = M($_POST['mod'])->where(array('id'=>array('in',$_POST['ids'])))->save(array('is_stick'=>1,'sort'=>500,'updated_at'=>time()));
        if(false != $res){
            $this->ajaxReturn(['status'=>1,'msg'=>'置顶成功']);
        }else{
            $this->ajaxReturn(['status'=>0,'msg'=>'置顶失败']);
        }
    }

    /**
     *取消置顶文章
     * param id = 1
     *@create 2014-12-19
     *@author zjf
     */
    public function ajax_unstick(){
        $_POST = I('post.');
        $res = M($_POST['mod'])->where(array('id'=>array('in',$_POST['ids'])))->save(array('is_stick'=>0,'updated_at'=>time()));
        if(false != $res){
            $this->ajaxReturn(['status'=>1,'msg'=>'取消置顶成功']);
        }else{
            $this->ajaxReturn(['status'=>0,'msg'=>'取消置顶失败']);
        }

    }

    /**
     *ajax批量排序
     *$_POST = ['mod'=>'','sort_data'=>[['id'=>'','sort'=>''],...]]
     *@create 2014-12-16
     *@author zjf
     */
    public function ajax_setsort(){
        $sort_data = I('post.sort_data');
        foreach($sort_data as $val){
            M($_POST['mod'])->save($val);
        }
        $this->ajaxReturn(['status'=>1,'msg'=>'更新成功']);
    }


    /**
     * ajax移动内容到...
     * $_POST = ['mod'=>,'ids'=>[1,2,3],'to_id'=>]
     * @author zjf ${date}
     */
    public function ajax_move_content(){
        $_POST = I('post.');
        $res = M($_POST['mod'])->where(array('id'=>array('in',$_POST['ids'])))->save(array('cate_id'=>$_POST['to_id']));
        if(false != $res){
            $this->ajaxReturn(['status'=>1,'msg'=>'移动成功']);
        }else{
            $this->ajaxReturn(['status'=>0,'msg'=>'移动失败']);
        }
    }


    /**
     * ajax开启
     * param ids = [1,2,3]
     * @create 2014-12-19
     * @author zjf
     */
    public function ajax_show(){
        $_POST = I('post.');
        $res = M($_POST['mod'])->where(array('id'=>array('in',$_POST['ids'])))->save(array('is_show'=>1));
        if(false != $res){
            $this->ajaxReturn(['status'=>1,'msg'=>'开启成功']);
        }else{
            $this->ajaxReturn(['status'=>0,'msg'=>'开启失败']);
        }
    }

    /**
     * ajax关闭
     * param ids = [1,2,3]
     * @create 2014-12-19
     * @author zjf
     */
    public function ajax_unshow(){
        $_POST = I('post.');
        $res = M($_POST['mod'])->where(array('id'=>array('in',$_POST['ids'])))->save(array('is_show'=>0));
        if(false != $res){
            $this->ajaxReturn(['status'=>1,'msg'=>'关闭成功']);
        }else{
            $this->ajaxReturn(['status'=>0,'msg'=>'关闭失败']);
        }
    }


    /**
     * 上传图片
     * @author zjf ${date}
     */
    public function upload_pic_one(){
        $config=array(
            /* 图片上传相关配置 */
            'picture_upload' => array(
                'mimes'    => '', //允许上传的文件MiMe类型
                'maxSize'  => 64*1024*1024, //上传的文件大小限制 (0-不做限制)
                'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
                'autoSub'  => true, //自动子目录保存文件
                'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
                'rootPath' => './Uploads/picture/', //保存根路径
                'savePath' => '', //保存路径
                'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
                'saveExt'  => '', //文件保存后缀，空则使用原后缀
                'replace'  => false, //存在同名是否覆盖
                'hash'     => true, //是否生成hash编码
                'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
            ), //图片上传相关配置（文件上传类配置）

            'picture_upload_driver'=>'local',
            //本地上传文件驱动配置
            'upload_local_config'=>array(),
        );

        /* 调用文件上传组件上传文件 */
        $Picture = D('Picture');
        $pic_driver = $config['file_upload_driver'];
        $info = $Picture->upload(
            $_FILES,
            $config['picture_upload'],
            $config['picture_upload_driver'],
            $config["upload_{$pic_driver}_config"]
        );
        /* 记录图片信息、返回标准数据 */
        $return  = array('status' => 1, 'info' => '上传成功', 'data' => '');
        if($info){
            $return['status'] = 1;
            $return = array_merge($info['file'], $return);
        } else {
            $return['status'] = 0;
            $return['info']   = $Picture->getError();
        }
        /* 返回JSON数据 */
        $this->ajaxReturn($return);
    }

    /**
     * 上传图片（商品）
     * @author zjf ${date}
     */
    public function upload_pic_goods(){
        $config=array(
            /* 图片上传相关配置 */
            'picture_upload' => array(
                'mimes'    => '', //允许上传的文件MiMe类型
                'maxSize'  => 64*1024*1024, //上传的文件大小限制 (0-不做限制)
                'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
                'autoSub'  => true, //自动子目录保存文件
                'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
                'rootPath' => './Uploads/picture/', //保存根路径
                'savePath' => '', //保存路径
                'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
                'saveExt'  => '', //文件保存后缀，空则使用原后缀
                'replace'  => false, //存在同名是否覆盖
                'hash'     => true, //是否生成hash编码
                'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
            ), //图片上传相关配置（文件上传类配置）

            'picture_upload_driver'=>'local',
            //本地上传文件驱动配置
            'upload_local_config'=>array(),
            'upload_bcs_config'=>array(
                'AccessKey'=>'',
                'SecretKey'=>'',
                'bucket'=>'',
                'rename'=>false
            ),
            'upload_qiniu_config'=>array(
                'accessKey'=>'__ODsglZwwjRJNZHAu7vtcEf-zgIxdQAY-QqVrZD',
                'secrectKey'=>'Z9-RahGtXhKeTUYy9WCnLbQ98ZuZ_paiaoBjByKv',
                'bucket'=>'onethinktest',
                'domain'=>'onethinktest.u.qiniudn.com',
                'timeout'=>3600,
            )
        );
        /* 返回标准数据 */
        $return  = array('status' => 1, 'info' => '上传成功', 'data' => '');

        /* 调用文件上传组件上传文件 */
        $Picture = D('Picture');
        $pic_driver = $config['picture_upload_driver'];
        $info = $Picture->upload(
            $_FILES,
            $config['picture_upload'],
            $config['picture_upload_driver'],
            $config["upload_{$pic_driver}_config"]
        );
        /* 记录图片信息 */
        if($info){
            $return['status'] = 1;
            $return = array_merge($info['file'], $return);
        } else {
            $return['status'] = 0;
            $return['info']   = $Picture->getError();
        }
        /* 添加水印
        $image = new \Think\Image();
        $image->open('.'.$return['path']);
        $image->water('./Public/Common/images/water.png',9,50)->save('.'.$return['path']);
        */
        /* 返回JSON数据 */
        $this->ajaxReturn($return);
    }

    /**
     *ajax进行分词
     *@create 2015-1-13
     *@author zjf
     */
    public function ajax_split_words(){
        $key = split_words($_POST['word']);
        if($key){
            $this->ajaxReturn(array('status'=>1,'msg'=>'分词成功','keyword'=>$key));
        }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>'分词失败'));
        }
    }


}