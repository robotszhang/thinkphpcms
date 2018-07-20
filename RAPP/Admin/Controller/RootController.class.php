<?php
namespace Admin\Controller;
class RootController extends \Common\TopController
{
    protected function _initialize()
    {
        parent::_initialize();
        // 判断文件上传session_id
        $session_name = session_name();
        if (isset($_POST[$session_name])) {
            session_id($_POST[$session_name]);
        }
        session_start();


        // 权限判断
        if (!D("Manager")->is_login()) {
            $this->redirect('Public/login');
        }

        // 管理员信息
        $manager = session('auth_manager');
        $this->manager = D('Manager')->get_item(array('id' => $manager ['id']), 0);

        //rg_print($this->manager);
        $this->assign('manager', $this->manager);

            // 管理后台导航
            C('ADMIN_NAV', array(
                array(
                    'name' => '基础站',
                    'child' => array(
                        array(
                            'name' => '默认',
                            'child' => array(
                                array(
                                    'name' => '首页',
                                    'url' => U('Index/index_index')
                                ),
                                array(
                                    'name' => '导航设置',
                                    'url' => U('Nav/index')
                                ),
                            )
                        ),
                        array(
                            'name' => '文章',
                            'child' => array(
                                array(
                                    'name' => '文章列表',
                                    'url' => U('Article/index')
                                ),
                                array(
                                    'name' => '文章分类',
                                    'url' => U('ArticleCate/index')
                                ),
                            )
                        ),
                        array(
                            'name' => '留言反聩',
                            'child' => array(
                                array(
                                    'name' => '客户留言',
                                    'url' => U('Guestbook/index')
                                )
                            )
                        ),
                        array(
                            'name' => '地图',
                            'child' => array(
                                array(
                                    'name' => '地图列表',
                                    'url' => U('Map/index')
                                ),
                            )
                        ),
                        array(
                            'name' => '链接',
                            'child' => array(
                                array(
                                    'name' => '链接',
                                    'url' => U('Ad/index')
                                ),
                                array(
                                    'name' => '链接组',
                                    'url' => U('AdCate/index')
                                )
                            )
                        ),
                    )
                ),

                array(
                    'name' => '工具',
                    'child' => array(
                        /*array(
                            'name' => '客服',
                            'child' => array(
                                array(
                                    'name' => 'QQ客服',
                                    'url' => U('ToolQq/lists')
                                ),
                                array(
                                    'name' => '电话客服',
                                    'url' => U('ToolPhone/lists')
                                ),
                            )
                        ),
                        array(
                            'name' => '属性库',
                            'child' => array(
                                array(
                                    'name' => '图片库',
                                    'url' => U('Picture/piclist')
                                ),
                                array(
                                    'name' => '文件库',
                                    'url' => U('File/filelist')
                                ),
                                array(
                                    'name' => '回收站',
                                    'url' => U('Picture/piclist_rubbish')
                                ),
                            )
                        ),*/
                        array(
                            'name' => '数据库管理',
                            'child' => array(
                                array(
                                    'name' => '备份操作',
                                    'url' => U('Backup/index')
                                ),
                                array(
                                    'name' => '历史备份',
                                    'url' => U('Backup/reback')
                                ),
                            )
                        ),
                    )
                ),
                array(
                    'name' => '设置',
                    'child' => array(
                        array(
                            'name' => '基本设置',
                            'child' => array(
                                array(
                                    'name' => '站点设置',
                                    'url' => U('Setting/index')
                                ),
                            )
                        ),
                        array(
                            'name' => '管理员',
                            'child' => array(
                                array(
                                    'name' => '管理员',
                                    'url' => U('Manager/index')
                                ),
                            )
                        )
                    )
                )
            ));

    }
}