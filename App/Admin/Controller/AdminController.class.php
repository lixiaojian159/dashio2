<?php

/**
 * @Author: 李健
 * @Date:   2018-10-24 14:40:23
 * @Last Modified by:   lijian
 * @Last Modified time: 2018-10-26 22:50:26
 * @E-mail: 852688838@qq.com
 * @Tel: 18633899381
 */
namespace Admin\Controller;

use Think\Controller;

class AdminController extends BaseController{

	//后台首页
	public function index(){
		$title = '后台首页';
		$id = cookie('user_id');
		$name = cookie('user_name');
		$this->display();
	}
}