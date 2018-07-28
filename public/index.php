<?php
/**
 * Auth: sjh
 * Created: 2018/7/26 14:04
 * 项目单一入口文件
 */
// autoload 自动载入
require '../vendor/autoload.php';
//生产环境下建议设置为off
ini_set('display_errors',1);
//设置PHP错误报告级别
ini_set('error_reporting',E_ALL);

//获取根目录
$root = $_SERVER['DOCUMENT_ROOT'];

//定义根目录常量
define('DOCUMENT_ROOT',$root);

//引入路由文件
require '../config/routes.php';
