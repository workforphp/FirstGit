<?php 
namespace app\admin\model;
use think\Model;

class Teacher extends Model {

	public function grade() {
		return $this->belongsTo('Grade');
	}

    // public function getDegreeAttr($value) {
    //      $degree = [
    //         1=>'专科',
    //         2=>'本科',
    //         3=>'研究生'
    //     ];
    //     //根据表中数据返回对应值
    //     // return $degree[$value];
    // }


	
}















?>