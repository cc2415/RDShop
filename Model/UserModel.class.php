<?php

namespace Model;
use Think\Model;
class UserModel extends Model{
    //获得全部验证错误
    protected $patchValidate=true;
    protected $_validate        =   array(
//       array('username','require','用户名必须填写'),
         array('username','require','用户名必须填写'),        
        array('password','require','密码必须填写'),        
        
        //可以为一个字段设置多个验证     
        array('password2','require','确认密码必须填写'),
        array('password2','password','与密码信息不一致',0,'confirm'),
        //邮箱
        array('user_email','email','邮箱格式不正确'),
         //验证qq
        //都是数字的、长度5-10位、 首位不为0
        //正则验证  /^[1-9]\d{4,9}$/
        array('user_qq',"/^[1-9]\d{4,9}$/",'qq格式不正确'),
        
        //学历，必须选择一个，值在2,3,4,5范围内即可
        array('user_xueli',"2,3,4,5",'必须选择一个学历',0,'in'),
        
        //爱好项目至少选择两项以上
        //爱好的值是一个数组，判断其元素个数即可知道结果
        //callback利用当前model里边的一个指定方法进行验证
        array('user_hobby','check_hobby','爱好必须两项以上',1,'callback'),
        
        //
       
   );  // 自动验证定义    
    //自定义方法验证
    function check_hobby($name){
        if(count($name)<2){
            return false;
        }else{
            return true;
        }
    }
}













