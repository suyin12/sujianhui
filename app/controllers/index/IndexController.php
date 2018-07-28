<?php
/**
 * Auth: sjh
 * Created: 2018/7/28 10:07
 */
class IndexController{
    public function index(){
        require (__DIR__).'../../../views/index/index.php';
    }
    public function login(){
        require (__DIR__).'../../../views/index/login.php';
    }
}