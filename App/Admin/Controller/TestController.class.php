<?php

/**
 * @Author: 李健
 * @Date:   2018-10-25 14:42:39
 * @Last Modified by:   banana
 * @Last Modified time: 2018-10-25 16:21:38
 * @E-mail: 852688838@qq.com
 * @Tel: 18633899381
 */

namespace Admin\Controller;

use Think\Controller;

class TestController extends Controller{

	public function index(){
		$this->display('layouts/layouts');
	}

	public function img(){
		$id = 1;
		$md = D('users')->getUserImgById($id);
	}
}