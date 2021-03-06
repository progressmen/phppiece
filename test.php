<?php

namespace Index;

class Index{
    public function __construct() {
        // 注册自动加载函数
        spl_autoload_register(array($this, 'loader'));
    }
    private function loader($className) {
        $filename       =   __DIR__ . "/" . str_replace('\\', '/', $className) . ".php";
        include($filename);
    }

    /**
     * 测试自动加载函数的使用
     */
    public function testAutoLoad(){
        new \testAutoLoad\X('123');
    }

    /**
     * 验证手机号
     */
    public function testPhone($input){
        $mobile = $input[0];
        $rst = preg_match("/^1[34578]\d{9}$/", $mobile);
        dump($rst);
    }

    /**
     * 调用不存在方法
     */
    public function __call($name, $arguments)
    {
        throw new \Exception("访问的方法不存在");
    }
}


// 定义的一些函数
include "function.php";

// 实例化index对象
$test = new Index();

// 获取方法参数和传递值
$arr = explode("/",$_SERVER['REQUEST_URI']);


// 调用对应的方法
if(isset($arr[2])){
    $func = $arr[2];
    $argv = array_slice($arr,3);
    $test->$func($argv);
}else{
    die('参数不正确');
}
