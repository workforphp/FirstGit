<?php 
namespace app\admin\model;
use think\Model;
use think\Request;
use think\Db;
use app\admin\validate\Admin as AdminValidate;

class Admin extends Model {

	public function checkLogin() {
		if(request()->isPost()){
			$captcha = new \think\captcha\Captcha();
			$data = input('post.');
			$uresult = db('adinfo')->where('admin_id', '=', $data['username'])->find();
			//1代表通过，0代表用户名或密码错误，-1代表验证码错误
			if(!$captcha->check($data['code'])){
				return -1;
			}else{
				$uresult = db('adinfo')->where('admin_id', '=', $data['username'])->find();
				//1代表通过，0代表用户名或密码错误，-1代表验证码错误
				if($uresult){
					if($uresult['password'] == $data['password']){
						return 1;
					}else{
						return 0;
					}
				}else{
					return 0;
				}
			}
		}
		
		
		// return 1;
	}
	

}




?>