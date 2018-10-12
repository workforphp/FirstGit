<?php 
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\Teacher as TeacherModel;
use think\Request;

class Teacher extends Base {
	public function teacherList() {

		$data = TeacherModel::all();
		$this->assign('teacherInfo',$data);
		$this->assign('title','教师界面');
		$this->assign('keywords','关键字');
		$this->assign('desc','描述');
		return $this->fetch();
	}

	public function teacherEdit(Request $request) {
		//获取全部从表单提交过来的数据
		$data = $request->param();
		$result = db('teacher')->where('id','=',$data['id'])->update($data);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}

	public function teacherAdd(Request $request) {

		if($request->isPost()){
			$addInfo = $request->param();
			return var_dump($addInfo);
			// var_dump($addInfo);die;
			// $result = TeacherModel::create($addInfo);
			// if($result){
			// 	return 1;
			// }else{
			// 	return 0;
			// }
		}

		$data = Model('grade')->all();
		$this->assign('title','教师界面');
		$this->assign('keywords','关键字');
		$this->assign('desc','描述');
		$this->assign('gradeInfo',$data);
		return $this->fetch();
	}

	public function teacherDel(Request $request) {

		$del_id = $request('id');
	}

}







?>