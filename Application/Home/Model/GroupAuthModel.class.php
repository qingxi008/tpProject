<?php
namespace Home\Model;
use Think\Model;

class GroupAuthModel extends BaseModel{
    protected $visitor = null;//用户
    
    public function getControllerAuth(){
        $flag = false;//标志，是否有权限访问
        $controllerId = null;//定义 Controller的ID
        //假设是admin用户
        //得到他的Action权限 范围
        $authAction = M('Action')->getFieldByUserId(1);
        $controllerArray = M('Action')->where(array('action_id' => array('exp',' in ('.$authAction.')'),'parent_id'=>0))->field('action_name,action_id')->select();
        foreach($controllerArray as $v){
            if(CONTROLLER_NAME == $v['action_name']){
                $flag = true;
                $controllerId = $v['action_id'];
                break;
            }
            continue;
        }
        if(!flag) return false;
        $actionArray = M('Action')->where(array('parent_id'=>$controllerId))->field('action_name')->select();
            foreach($actionArray as $vv){
            if(ACTION_NAME == $vv['action_name']){
                return true;
            }
            continue;
        }
        return false;
    }
    
    
    
}