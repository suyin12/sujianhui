<?php
/**
 * Created by PhpStorm.
 * User: sjh
 * Date: 2018/6/29
 * Time: 23:30
 */
//获取文件路径信息
$pathInfo = pathinfo(__FILE__);
//获取根目录
$root = $_SERVER['DOCUMENT_ROOT'];
//获取主机
define('SERVER_NAME','http://'.$_SERVER['SERVER_NAME'].'/');
//获取项目目录名称
$arr = explode('/',$_SERVER['PHP_SELF']);
define('PROJECT_NAME',$arr[1]);
//定义根目录
define('DOCUMENT_ROOT',$root);
//定义项目根目录绝对路径
define('PROJECT_ROOT',DOCUMENT_ROOT.'/'.PROJECT_NAME);
//定义服务器路径
define('SERVER_PROJECT',SERVER_NAME.PROJECT_NAME);
