<?php

namespace test;

class Test{
    public function __construct() {
        // 注册自动加载函数
        spl_autoload_register(array($this, 'loader'));
    }
    private function loader($className) {
        $filename       =   __DIR__ . "/" . str_replace('\\', '/', $className) . ".php";
        include($filename);
    }

    public function testAutoLoad(){
        echo '123';
        $x = new \testAutoLoad\X('123');
        var_dump($x);
    }
}

$test = new Test();

$b = $test->testAutoLoad();
