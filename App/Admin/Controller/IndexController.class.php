<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {

	//后台登陆
    public function index(){

        //验证是否用户已经登陆过, 如果已经登录过,直接跳转到后台首页; 否则, 渲染后台登录页
        $user_id   = cookie('user_id');
        $user_name = cookie('user_name');
        $user_salt = cookie('user_salt');
        $user = D('users')->getUserById($user_id);
        $salt = md5($user['salt'].C('SALT'));
        if($user_id && $user_name && $user_salt && $user_name == $user['name'] && $user_salt == $salt){
            $this->redirect('/admin/Admin/index');
        }else{
            $this->display('Login:login');
        }
    }

    public function successpass(){
    	$name     = I('post.name');
    	$password = I('post.password');
    	$verify   = I('post.verify');
    	$remember = I('post.remember');  //选中是string 1, 未选中是 string 0

    	$user = D('users')->getUserByName($name);

    	//验证验证码
    	$verify_model = new VerifyController();
        $res_verify   = $verify_model->check_verify($verify);
    	if(!$res_verify){
    		$info['code'] = 0;
    		$info['msg']  = '验证码错误';
    		$info['url']  = U('Admin/Index/index');
    		echo json_encode($info);
    		exit;
    	}

    	//验证是否存在此用户
    	if(!$user){
    		$info['code'] = 0;
    		$info['msg']  = '用户不存在';
    		$info['url']  = U('Admin/Index/index');
    		echo json_encode($info);
    		exit;
    	}
    	//检测用户密码
    	if($user['password'] != md5($password.$user['salt'])){
    		$info['code'] = 0;
    		$info['msg']  = '用户名或者密码错误';
    		$info['url']  = U('Admin/Index/index');
    		echo json_encode($info);
    		exit;
    	}

    	//验证成功保存session和cookie, 用于是否登陆后操作的验证
    	cookie('user_id',$user['id']);
    	cookie('user_name',$user['name']);
    	$salt = md5($user['salt'].C('SALT'));
    	cookie('user_salt',$salt);
        
        //登录成功后的返回json格式
    	$info['code'] = 1;
    	$info['msg']  = '登陆成功!';
    	$info['url']  = U('Admin/Admin/index');
    	echo json_encode($info);
    }

    //退出系统
    public function logout(){
        cookie('user_id',null);
        cookie('user_name',null);
        cookie('user_salt',null);
        $arr['code'] = 1;
        $arr['msg']  = '安全退出!';
        $arr['url']  = U('Admin/Index/index');
        echo json_encode($arr);
    }


    //接口: 注册用户
    public function register(){
        $data = I('post.');
        //验证授权码
        $is_keycode = $id = D('users')->getBykeycode($data['keycode']);
        if($is_keycode == null){
            echo json_encode(['code'=>0 , 'msg'=>'授权码错误,请联系超级管理员', 'url'=>U('Admin/Index/index')]);
            exit;
        }
        //判断邮箱唯一
        $is_unique_email = D('users')->getByEmail($data['email']);
        if(!$is_unique_email){
            echo json_encode(['code'=>0 , 'msg'=>'此邮箱已经注册', 'url'=>U('Admin/Index/index')]);
            exit;
        }
        //判断账户唯一
        $is_unique_name = D('users')->getByName($data['name']);
        if(!$is_unique_name){
            echo json_encode(['code'=>0 , 'msg'=>'此账户已经注册', 'url'=>U('Admin/Index/index')]);
            exit;
        }

        if($data['password'] != $data['password_confirmation']){
            echo json_encode(['code'=>0 , 'msg'=>'两次密码不一致', 'url'=>U('Admin/Index/index')]);
            exit;
        }

        $data['salt']     = makeRandNum(5);
        $data['password'] = md5($data['password'].$data['salt']);
        $data['keycode']  = '';
        $data['logintime']= time();
        unset($data['password_confirmation']);
        $res = M('users')->where('id ='.$id)->setField($data);
        if($res){
            $arr['code'] = 1;
            $arr['msg']  = '注册成功';
            $arr['url']  = U('Admin/Index/index');
        }else{
            $arr['code'] = 0;
            $arr['msg']  = '注册失败';
            $arr['url']  = U('Admin/Index/index');
        }
        echo json_encode($arr);
    }


}