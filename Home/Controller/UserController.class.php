<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    //android
    public function regist(){     
//        if(IS_POST){
            $name=I("post.name");
            $pass=I("post.password");
         //   $name=I("get.name");
          //  $pass=I("get.password");          
            
            $userInfo=D("Userinfo");      
            if($name!=""&&$pass!=""){
                $data['name']=$name;
                $data['password']=$pass;
                $userInfo->add($data);
            }

            echo "哇哈哈哈,你成功了";
            $json=  file_get_contents("php://input");
                    json_decode($json,true);	    
	    echo $json."";
//            $show=$userInfo->select();
//            dump($show);
//        }
    }

    public function login(){
        $this->display();
    }
    public function register(){
        $user= new \Model\UserModel();
        if(!empty($_POST)){
            $z=$user->create();
            if(!$z){
                show_debug($user->getError());
            }else{
                $user -> user_hobby=  implode(',', $_POST['user_hobby']);
                $rst=$user->add();            
            if($rst){
                echo '注册成功';
//                $this->success('注册成功',U('/Home/index'));
            }else{             
                echo '注册失败';
//                $this->error('注册失败',U('/User/register'));
             }
            }            
        }else{
            $this->display();
        }    
        
    }
    public function _empty(){
        echo "空方法";
    }
    
}

