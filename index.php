<?php
//header("Content-Type:text/html; charset=utf-8");

function show_debug($msg){
        echo '<pre>';
        var_dump($msg);
        echo '</pre>';
}

header("Content-Type:text/html; charset=utf-8");
define("APP_DEBUG", true);//开启调试模式

define("SITE_URL", "http://localhost/withAndroid/");
//home
define("CSS_URL", SITE_URL."public/Home/css/");
define("IMG_URL", SITE_URL."public/Home/images/");
define("JS_URL", SITE_URL."public/Home/js/");
//admin
define("ADMIN_CSS_URL", SITE_URL."public/Admin/css/");
define("ADMIN_IMG_URL", SITE_URL."public/Admin/img/");

require 'ThinkPHP/ThinkPHP.php';


 






















