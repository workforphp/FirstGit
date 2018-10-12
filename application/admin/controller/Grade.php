<?php 
namespace app\admin\controller;
use app\admin\controller\Base;

class Grade extends Base {

	public function gradeList() {

		$this->assign('title','班级界面');
		$this->assign('keywords','班级');
		$this->assign('desc','描述');
		return $this->fetch();
	}
}






?>