<?php

/**
 * @Author: 李健
 * @Date:   2018-10-29 11:30:39
 * @Last Modified by:   banana
 * @Last Modified time: 2018-10-29 11:38:13
 * @E-mail: 852688838@qq.com
 * @Tel: 18633899381
 */

function makeRandNum($len){
	$str  = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
	$num  = strlen($str);
	$code = '';
	for($i=0;$i<$len;$i++){
		$code .= $str[rand(0,$num)];
	}
	return $code;
}