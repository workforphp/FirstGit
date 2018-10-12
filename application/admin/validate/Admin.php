<?php 
namespace app\admin\validate;
use think\Validate;

class Admin extends validate {

	protected $rule = [
		'username' => 'require|max:25',
		'password'  =>  'require',
	];	

	protected $message = [
		'username.require' => '管理员名称必须填写',
		'username.max' => '管理员名称最大长度不得超过25位',
		'password.require' => '密码必须填写',
	];

	protected $scene = [
		'login' => ['username'=>'require','password'=>'require'],
		'edit' => ['username'=>'require|max:25','password'=>'require'],
	];


}




?>