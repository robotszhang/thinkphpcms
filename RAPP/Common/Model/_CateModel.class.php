<?php 
namespace Common\Model;
use Common\Model\_BaseModel;
class _CateModel extends _BaseModel{
	
	//定义数据表名称
	protected function _initialize(){
		//$tableName = 'article_cate';
	}
	
	/**
	 * 新增一个分类
	 *@param  array   父id,新增内容
	 *@return  array  array('status',$data)
	 *@create 2015-2-4
	 *@author  zjf
	 */  
	public function add_cate($id,$param){
        unset($param['id']);
		if($id == 0){
			$new = $this->add_item($param);
			$data['id'] = $new['status'];
			$data['path'] = 0;
			$data['fullpath'] = ','.$new['status'].',';
			$data['sort'] = $new['status'];
			return $this->save_item($data);
		}elseif($res = $this->where(array('id'=>$id))->find()){
			$new = $this->add_item($param);
			$data['id'] = $new['status'];
			$data['path'] = $res['fullpath'];
			$data['fullpath'] = $res['fullpath'].$new['status'].',';
			
			//取兄弟分类
			
			$data['sort'] = $res['sort'].','.$new['status'];
			return $this->save_item($data);
		}
	}
	
	/**
	 * 获取分类
	 *@param  array   id,type =0  包含自身  type=1  不包含自身
	 *@return  array  二位数组
	 *@create 2015-2-4
	 *@author  zjf
	 */
	public function get_cate_list($id=0,$type = 0){
		//获取当前记录
		$self = $this->get_item(array('id'=>$id),0);
		$self_deep = count(explode(',',$self['fullpath']));
		$self_deep = $self?$self_deep:0; //当前分类深度

		$where = array();
		//包含自身
		if($id != 0 && $type == 0){
			$where['fullpath'] = array('like',$self['fullpath']."%");
		}
		//不包含本身
		if($id != 0 && $type == 1){
			$where['fullpath'] = array('like',$self['fullpath']."%");
			$where['id'] = array('neq',$self['id']);
		}
		$res = $this->where($where)->order('sort asc')->select();

		foreach($res as &$val){
			$deep = count(explode(',',$val['fullpath']))-3;  //计算深度
			$val['deep'] = $deep-$self_deep;
			if($deep != 0){
				$val['pre'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$deep).'┗';
			}else{
				$val['pre'] = '';
			}
		}
		return $res;
	}
	
	/**
	 * 获取分类 （转成多维数组）
	 *@param  array   id,type =0  包含自身  type=1  不包含自身
	 *@return  array  多维数组
	 *@create 2015-2-4
	 *@author  zjf
	 */
	public function get_cate($id=0,$type = 0, $not_include=0){
		if($id != 0){
			$self = $this->get_item(array('id'=>$id, 'is_show'=>1),0);
		}
		$where = array();
        !in_array($this->name, array('NavCate', 'ArticleCate')) && $where['is_show'] = 1;
		//包含自身
		if($id != 0 && $type == 0){
			$where['fullpath'] = array('like',$self['fullpath']."%");
		}
		//不包含本身
		if($id != 0 && $type == 1){
			$where['fullpath'] = array('like',$self['fullpath']."%");
			$where['id'] = array('neq',$self['id']);
		}

		//add by lf 2016 06 16
		if($not_include != 0) {
			$where['id'] = array('not in', $this->get_child_ids($not_include));
		}

		$list = $this->where($where)->order('sort asc')->select();

		if(!$list){
			return null;
		}
		
		foreach($list as &$val){
			$val['deep'] = count(explode(',',$val['fullpath']));
		}

		//计算深度
		$list_arr = list_sort_by($list,'deep','asc');
		$list_last = end($list_arr);
		$deep_max = $list_last['deep'];
		$deep_min = $list_arr[0]['deep'];

		// 数组横向转纵向
		for($i = $deep_max; $i >= $deep_min; $i --) {
			foreach($list as &$val){
				if($val['deep']==$i){
					//$pid = end(explode(',',$val['path']));
					foreach($list as &$cat){
						if($cat['fullpath'] == $val['path']){
							/*if (! is_array ( $cat['child'] )) {
								$cat['child'] = array ();
								array_push ( $cat['child'], $val );
							} else {
								array_push ( $cat['child'], $val );
							}*/
							if (!isset($cat['child'])) {
								$cat['child'] = array ();
								array_push ( $cat['child'], $val );
							} else {
								array_push ( $cat['child'], $val );
							}
						}
					}
				}
			}	
		}

		// 取得最上层的数据
		$arr = array ();
		foreach ( $list as $key => $vall ) {
			if ($vall ['deep'] == $deep_min) {
				array_push ( $arr, $vall );
			}
		}
		$list = NULL;
		return $arr;
	}
	
	/**
	 * 获取父分类
	 *@param  array
	 *@return  array
	 *@create 2015-2-5
	 *@author  zjf
	 */  
	public function get_parent($id){
		$self = $this->get_item(array('id'=>$id),0);
		$res = $this->get_item(array('fullpath'=>$self['path']),0);
		return $res;
	}
	
	/**
	 * 获取父分类集合
	 *@param  $type 0-包含自身   1-不含自身
	 *@return  array
	 *@create 2015-2-5
	 *@author  zjf
	 */
	public function get_parents($id,$type=1){
		$self = $this->get_item(array('id'=>$id),0);
        $where = array();
		if($type == 0){
            $self['fullpath'] && $where['id'] = array('in', $self['fullpath']);
			$res = $this->get_item($where,1);
		}else{
            $self['path'] && $where['id'] = array('in', $self['path']);
			$res = $this->get_item($where,1);
		}
		return $res;
	}
	
	/**
	 * 获取子分类id集合
	 *@param  array  0-包含自身
	 *@return  array
	 *@create 2015-2-5
	 *@author  zjf
	 */
	public function get_child_ids($id,$type=0){
		$self = $this->get_item(array('id'=>$id),0);
		$where = array();
		//包含自身
		if($id != 0 && $type == 0){
			$where['fullpath'] = array('like',$self['fullpath']."%");
		}
		//不包含本身
		if($id != 0 && $type == 1){
			$where['fullpath'] = array('like',$self['fullpath']."%");
			$where['id'] = array('neq',$self['id']);
		}
		$list = $this->where($where)->getField('id',true);
		return implode(',',$list);
		
	}
	/**
	 * 获取子分类
	 *@param  array
	 *@return  array
	 *@create 2015-2-5
	 *@author  zjf
	 */
	public function get_child($id){
		$where = array();
		$self = $this->get_self($id);
		//包含自身
		if($id != 0 && $type == 0){
			$where['fullpath'] = array('like',$self['fullpath']."%");
		}
		//不包含本身
		if($id != 0 && $type == 1){
			$where['fullpath'] = array('like',$self['fullpath']."%");
			$where['id'] = array('neq',$self['id']);
		}
		$list = $this->where($where)->select();
		return $list;
	}
	
	/**
	 * 删除分类
	 *@param  array
	 *@return  array
	 *@create 2015-2-6
	 *@author  zjf
	 */  
	public function del_cate($id){
		return $this->del_item(array('fullpath'=>array('like',"%,".$id.",%")));
		
	}
	
	/**
	 * 获取单条记录
	 *@param  array
	 *@return  array
	 *@create 2015-2-6
	 *@author  zjf
	 */  
	public function get_self($id){
		return $this->get_item(array('id'=>$id),0);
	}
	
	
	/**
	 * 更新排序
	 *@param  array
	 *@return  array
	 *@create 2015-2-6
	 *@author  zjf
	 */  
	public function update_sort($id,$sort){
		$item = $this->get_self($id);
		$sort_arr = explode(',',$item['sort']);
		array_pop($sort_arr);
		array_push($sort_arr,$sort);
		$data['sort'] = implode(',',$sort_arr);
		$data['id'] = $id;
		$this->save_item($data);
		
		$children = $this->get_child($id);
		foreach($children as &$val){
			$this->where(array('id'=>$val['id']))->setField('sort',str_replace($item['sort'],$data['sort'],$val['sort']));	
		}
		return array('status'=>1);
	}
	
}
?>