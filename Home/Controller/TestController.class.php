<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
    function newhtml(){
        $this->display();
    }
    function upload(){       
        $upload=new \Think\Upload();
        $upload->maxSize=3145728 ;
        $upload -> exts=array('jpg','gif','png');
//        $upload->savePath='./Uploads/';
        $upload->rootPath = "./public/Uploads/";       
        //上传文件
        $info=$upload->upload();
        if(!$info){
            $this->error($upload->getError());
        }else{
            $this->success('上传成功！');
        }
        
    }
    function _empty(){
        echo '空方法';
    }
}