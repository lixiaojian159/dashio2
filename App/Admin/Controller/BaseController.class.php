<?php

/**
 * @Author: 李健
 * @Date:   2018-10-24 15:48:59
 * @Last Modified by:   banana
 * @Last Modified time: 2018-10-24 16:07:32
 * @E-mail: 852688838@qq.com
 * @Tel: 18633899381
 */
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller{

    //用于 用户是否登陆后操作的验证
	public function _initialize(){
		$user_id   = cookie('user_id');
		$user_name = cookie('user_name');
		$user_salt = cookie('user_salt');
		$user = D('users')->getUserById($user_id);
		$salt = md5($user['salt'].C('SALT'));
		if(!$user_id || !$user_name || !$user_salt){
			$this->redirect('/Admin/Index/index');
		}

		if($user_name != $user['name']){
			$this->redirect('/Admin/Index/index');
		}

		if($user_salt != $salt){
			$this->redirect('/Admin/Index/index');
		}
	}
}