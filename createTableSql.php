<?php
/*
* @Author: 李健
* @Date:   2018-10-24 11:02:29
* @Last Modified by:   banana
* @Last Modified time: 2018-10-24 11:02:29
*/

//创建用户表  (用户登陆验证)
create table users(
	id int(2) auto_increment primary key,
	name varchar(20) not null default '',
	password varchar(32) not null default '',
	remember varchar(32) not null default '',
	salt varchar(10) not null default '',
	email varchar(200) not null default '',
	logintime varchar(100) not null default ''
)engine=InnoDB default charset=utf8;

alter table users add salt varchar(10) not null default '' after remember;

alter table users add email varchar(200) not null default '' after salt;

alter table users add keycode varchar(10) not null default '' after email;

alter table users add route int(1) not null default 0 after keycode;