<?php

/**
 * @Author: 李健
 * @Date:   2018-10-29 14:14:43
 * @Last Modified by:   banana
 * @Last Modified time: 2018-10-29 14:19:18
 * @E-mail: 852688838@qq.com
 * @Tel: 18633899381
 */

namespace Admin\Controller;

use Think\Controller;

class VerifyController extends Controller{

	//生成验证码
    public function verify(){
    	$Verify = new \Think\Verify();
		$Verify->fontSize = 30;
		$Verify->length   = 4;
		$Verify->useNoise = false;
		$Verify->useCurve = false;
		$Verify->entry();
    }

    //检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = ''){
	    $verify = new \Think\Verify();
	    return $verify->check($code, $id);
    }
}