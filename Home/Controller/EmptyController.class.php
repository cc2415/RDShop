<?php

namespace Home\Controller;
use Think\Controller;
//空控制器  用来防黑
class EmptyController extends Controller{
//    空方法
    public function _empty(){
        echo "空控制，空方法";
    }
}
