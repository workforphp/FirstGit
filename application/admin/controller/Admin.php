<?php 
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Loader;
use app\admin\model\Admin as AdminModel;

class Admin extends Base {

	public function index(){
		return $this->fetch();
	}

	public function login() {
		return $this->fetch();
	}

	public function checkLogin() {
		$amodel = new AdminModel();
		$data = $amodel->checkLogin();
		// return $data;
		if($data == '1'){
			return 1;
		}else if($data == '0'){
			return '用户名或密码错误...';
		}else{
			return '验证码错误...';
		}
	}

	public function logout() {


	}

	public function lst(){
		// $result = db('admin')->select();
		// $result = AdminModel::paginate(3);
		$result = db('adinfo')->paginate(3);
		$this->assign('result',$result);
		return $this->fetch();
	}

	public function edit() {

		$id = input('id');
		$admins = db('admin')->find($id);
		if(request()->isPost()){
			$data = [
				'admin_name' => input('admin_name'),
			];
			$validate = \think\Loader::validate('Admin');
			if(!$validate->scene('edit')->check($data)){
				$this->error($validate->getError());die;
			}
			$save = db('admin')->where('id',$id)->update($data);
			if($save !== false){
				$this->success('修改信息成功！！！','admin/lst');
			}else{
				$this->error('修改信息失败...');
			}
			return;
		}

		$this->assign('admins',$admins);
		return $this->fetch();
	}

	public function delete(){

		$id = input('id');
		if(db('admin')->delete($id)) {
			$this->success('删除该管理员信息成功！','admin/lst');
		}else{
			$this->error('删除信息失败...');
		}

		return $this->fetch();
	}

}



?>