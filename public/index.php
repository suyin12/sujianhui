<?php
/**
 * Auth: sjh
 * Created: 2018/7/26 14:04
 */
// Autoload 自动载入
require '../vendor/autoload.php';
//获取根目录
$root = $_SERVER['DOCUMENT_ROOT'];
//获取主机
define('SERVER_NAME','http://'.$_SERVER['SERVER_NAME'].'/');
//获取项目目录名称
define('PROJECT_NAME',$arr[1]);
//定义根目录
define('DOCUMENT_ROOT',$root);
//定义项目根目录绝对路径
define('PROJECT_ROOT',DOCUMENT_ROOT.'/'.PROJECT_NAME);
//定义服务器路径
define('SERVER_PROJECT',SERVER_NAME.PROJECT_NAME);
// 路由配置
require '../config/routes.php';