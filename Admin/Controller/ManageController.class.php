<?php

namespace Admin\Controller;
use Think\Controller;
class ManageController extends Controller{
    public function login(){
        if(!empty($_POST)){
            $verify=new \Think\Verify();
            $s=$verify->check($_POST['captcha']);
            if(!$s){
                echo '验证错误';
            }else{
                //验证用户名和密码
                $user= new \Model\ManagerModel();
//               $user= D('Manager');                
               $rst= $user ->checkNamePassword($_POST['mg_username'], $_POST['mg_password']);
               if($rst){
                  session('mg_username',$rst['mg_name']);
                  session('mg_id',$rst['mg_id']);
                  $this ->redirect('Index/index');
               }else{
                   echo '登陆失败';
               }
            }
        }        
        $this->display();
    }
    
    function logout(){
        session(null);
        $this ->redirect('Manage/login');
    }
    
    public function verifyImg(){
        $config=array(
            'imageH'    =>  28,               // 验证码图片高度
            'imageW'    =>  110,              // 验证码图片宽度
            'length'    =>  4,                // 验证码位数
            'fontSize'  =>  15,               // 验证码字体大小(px)verifyImg
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点	
        );
        
        ob_clean();        
        $verify=new \Think\Verify($config);
        $verify->entry();
    }
}
