<?php

// 打印数据
function dump($v){
    echo "<pre>";
    var_dump($v);
    echo "</pre>";
}

// 打印数据并终止
function dd($v){
    echo "<pre>";
    var_dump($v);
    echo "</pre>";
    die;
}