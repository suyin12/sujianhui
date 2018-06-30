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
//获取项目目录名称
$projectName = substr($pathInfo['dirname'],strripos($pathInfo['dirname'],'\\'));
//定义根目录
define('DOCUMENT_ROOT',$root);
//定义项目根目录
define('PROJECT_ROOT',DOCUMENT_ROOT.$projectName);
