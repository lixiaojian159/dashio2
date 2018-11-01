<?php

/**
 * @Author: 李健
 * @Date:   2018-10-24 11:38:09
 * @Last Modified by:   banana
 * @Last Modified time: 2018-11-01 10:12:46
 * @E-mail: 852688838@qq.com
 * @Tel: 18633899381
 */
namespace Admin\Model;

use Think\Model;

class UsersModel extends Model{

	public $db;

	public function __construct(){
		parent::__construct();
		$this->db = M('users');
	}

    /**
     * [getUserByName 根据用户名获取用户整体信息, 查看是否存在此用户]
     * @param  [string]       $name  用户名
     * @return [array/null]   $user  有此用户,返回以为数组; 无此用户,返回null 
     */
	public function getUserByName($name){
		$data['name'] = $name;
		$user = $this->db->where($data)->find();
		return $user;
	}

    /**
     * [getUserById 根据ID获得用户信息]
     * @param  [int]    $id  用户ID
     * @return [array]  
     */
	public function getUserById($id){
		return $this->db->find($id);
	}
    
    /**
     * [getUserImgById 通过ID获取用户的邮箱,然后生成gravatar,并返回]
     * @param  [int]     $id   用户ID
     * @return [string]  $src  用户头像src
     */
	public function getUserImgById($id){
		$user  = $this->getUserById($id);
		$email = md5(strtolower(trim($user['email'])));
		$src   = 'https://www.gravatar.com/avatar/'.$email;
		return $src;
	}

    /**
     * [getRouteById  通过用户ID获取用户角色]
     * @param  [int]  $id  用户ID
     * @return [int]  1 超级管理员  0 普通管理员
     */
	public function getRouteById($id){
		$user = $this->getUserById($id);
		return $user['route'];
	}

    /**
     * [getBykeycode  判断授权码的正确与否]
     * @param  [string]   $keycode 授权码 
     * @return [int/null]  正确：id   错误: null
     */
	public function getBykeycode($keycode){
		$data['keycode'] = $keycode;
		$user = $this->db->where($data)->select();
		return $user[0]['id'];
	}

	/**
	 * [getByEmail 通过邮箱,判断是否邮箱已存在]
	 * @param  [string]    $email   邮箱
	 * @return [boolean]   存在：false ; 不存在：true   
	 */
	public function getByEmail($email){
		$data['email'] = $email;
		$user = $this->db->where($data)->find();
		if($user){
			return false;
		}else{
			return true;
		}
	}

    /**
     * [getByName 通过账户,判断账户是否已存在]
     * @param  [string]   $name 账户名
     * @return [boolean]  存在:false ; 不存在: true
     */
	public function getByName($name){
		$data['name'] = $name;
		$user = $this->db->where($data)->find();
		if($user){
			return false;
		}else{
			return true;
		}
	}

}