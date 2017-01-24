<?php

namespace Model;
use Think\Model;
class ManagerModel extends Model{
    public function checkNamePassword($name,$password){
        //getByxxx  获得一个字段的信息，xxx是表的一个字段
        
        $info=$this->getByMg_name($name);
        if($info!=null){
            if($info['mg_pwd']!=$password){
                return false;                
            }
            else{
                return  $info;
            }
        }else{
            return false;
        }
        show_debug($info);
    }
}

