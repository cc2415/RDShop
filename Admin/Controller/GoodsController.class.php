<?php

namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller{
//    商品列表展示
    public function showlist(){
        $goods = D("Goods");          
//        $info = $goods -> select();//输出二维数组
//        dump($info);
        
        //获取当前记录总数
        $total=$goods->count();
        $per=7;
        //实例化分页类对象
        $page=new \Component\Page($total,$per);//autoload第二个是总页数
        //拼装sql语句获得每页信息
        $sql="select * from sw_goods ".$page->limit;
        $info=$goods->query($sql);
        //获得页码列表
        $pagelist=$page->fpage();
        

        $this -> assign('info', $info);//使用assign把数据发送倒info标记中，让html页面引用
        $this->assign('pagelist',$pagelist);        
        $this -> display();       
    }
//    添加商品
    public function add(){
//        echo __SELF__;
//        /withAndroid/index.php/Admin/Goods/add
        //两个逻辑，1.添加信息 2.展示页面
        $goods=D('Goods');
        if(!empty($_POST)){
            //判断是否有提交文件
            $config = array(
                'rootPath' =>  './public/',//。/是在index.php文件下的目录
                'savePath' => 'Uploads/',//保存文件的路径
            );
            if(!empty($_FILES)){
                $upload = new \Think\Upload($config);
                $z = $upload ->uploadOne($_FILES['goods_img']);
                if(!$z){
                    show_debug($upload ->getError());//获得上传附件产生的错误
                }else{
                    //拼装图片的路径名
                    //show_debug($z);
                    //echo '<br>';
                     
                    $bigimg = $z['savepath'].$z['savename'];
                    $_POST['goods_big_img'] =$bigimg;
                    
                    $image = new \Think\Image();
                    $srcimg = $upload->rootPath.$bigimg;
                    $image->open($srcimg);
                    $image->thumb(150, 150);
                    //缩略图src
                    $smallimg = $z['rootPath']."small_".$z['savename'];
                    $image->save($upload->rootPath.$smallimg);
                    $_POST['goods_small_img'] = $smallimg;
                    //echo 'srcima<br>';
                    //show_debug($srcimg);
                    //echo 'smallimg<br>';
                    //show_debug($smallimg);
                    
                }
                
            }
            
            $goods->create();//默认上传的时post方式，create进行了数据的收集和过滤
            $ar=$goods->add();
            if($ar){
//                $this->success("数据添加成功",  U('/Goods/showlist/'));
                echo 'success';
            }else{
//                $this->error("数据添加失败",U('/Goods/add'));
                echo 'faile';
            }
        }else{  
            $this->display(); 
        }       
    }
//    修改商品
    public function upd($goods_id){        
        $goods=D('Goods');
        if(!empty($_POST)){
            $goods->create();
            $ar=$goods->save();
            if($ar){
                echo 'scurss';
            }else{
                echo 'failue';
            }
        }else{
            $info=$goods->find($goods_id);
            $this->assign("info", $info);
            $this->display();            
        }
    }
    public function _empty(){
        echo "空方法展示";
    }
    
}

