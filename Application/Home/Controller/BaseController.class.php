<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller{
    public function _initialize(){
        if(D('GroupAuth')->getControllerAuth()) {
            echo '可以访问下级页面<br /><br />============<br /><br /><br />';
        }else{
            exit('无权限访问下级页面');
        }
        
    }
    
    public function test(){
        echo 'test';
    }
}