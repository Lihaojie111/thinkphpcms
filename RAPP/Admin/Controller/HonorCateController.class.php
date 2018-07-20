<?phpnamespace Admin\Controller;use Admin\Controller;class HonorCateController extends RootController{	public function index(){	}	/**	 * 分类列表	 */	public function lists(){		$catelist = D('HonorCate')->get_cate_list(0);		foreach($catelist as &$val){			$val['total'] = M("Honor")->where(array('pid'=>$val['id']))->count();			$val['sort'] = end(explode(',',$val['sort']));		}		$this->assign('catelist',$catelist);		$this->display();	}	/**	 *新增分类	 *@create 2015-2-6	 *@author zjf	 */	public function add(){		$res = D('HonorCate')->add_cate($_POST['id'],array('name'=>$_POST['name']));		if($res['status']){			$this->redirect('HonorCate/lists');		}else{			$this->error('添加失败！');		}	}	/**	 *编辑分类	 *@create 2015-2-6	 *@author zjf	 */	public function edit(){		if(IS_POST){			$res = D('HonorCate')->save_item($_POST);			if($res['status']){				$this->success('编辑成功！','HonorCate/lists');			}else{				$this->error('编辑失败！');			}		}else{			$page = D('HonorCate')->get_self($_GET['id']);			$this->assign('page',$page);			$this->display();		}	}	/**	 * 删除一个分类	 * =0(删除失败),=1(删除成功),=2(当前分类下有文章),=3(当前分类有子类)	 */	public function ajax_del_cate(){		$ids = D("HonorCate")->get_child_ids($_POST['id']);		$article = M('Honor')->where(array('pid'=>array('in',$ids)))->find();		if($article){			$this->ajaxReturn(array('status'=>0,'error'=>'当前分类或子类下有内容，请删除后进行此操作！'));		}		$res = D('HonorCate')->del_cate($_POST['id']);		if($res){			M('HonorAttr')->where(array('cateid'=>$_POST['id']))->delete();		}		$this->ajaxReturn(array('status'=>1,'ids'=>explode(',',$ids)));	}	/**	 *文章分类新增附加属性	 *@create 2015-2-6	 *@author zjf	 */	public function ajax_add_attr(){		$res = M("HonorAttr")->data($_POST)->add();		if($res){			$data['status'] = 1;			$data['content'] = $_POST;			$data['content']['id'] = $res;		}		$this->ajaxReturn($data);	}	/**	 *ajax设置排序	 *@create 2014-12-16	 *@author zjf	 */	public function ajax_setsort(){		$res = D('HonorCate')->update_sort($_POST['id'],$_POST['sort']);		$this->ajaxReturn($res);	}}