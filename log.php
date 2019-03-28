<?php

// 取大文件后几行
include 'function.php';


// 获取方法参数和传递值
$arr = explode("/",$_SERVER['REQUEST_URI']);

$dir_arr = [
    'tspackage' => 'data/runtime/Logs/TsPackge/2018_',
    'tsstorage' => 'data/runtime/Logs/TsStorage/2018_',
    'partner' => 'data/runtime/Logs/Partner/18_',
    'open' => 'data/runtime/Logs/Open/18_',
    'datapackage_shipment' => 'data/log/datapackage_shipment/18_',
    'mklFlowWxRemind' => 'data/log/mklFlowWxRemind/18_',
    'openApiLog' => 'data/runtime/Logs/openApiLog/2018_',
    'region' => 'data/runtime/Logs/Region/2018_',
];

if(empty($arr[2])){
    $html = '<ul>';
    foreach ($dir_arr as $k => $v){
        $html .='<li><a href="/'.$arr[1].'/'.$k.'">'.$k.'</a></li>';
    }
    $html .= '</ul>';
    echo $html;
    exit();
}

if(empty($arr[3])){
    $arr[3] = date('m_d',time());
}
@file_put_contents('log_contents', file_get_contents('http://mos.umacaroon.com/'.$dir_arr[$arr[2]].$arr[3].'.log'));
echo "<body style='background-color: bisque;'>";
echo 'http://mos.umacaroon.com/'.$dir_arr[$arr[2]].$arr[3].'.log '.' <a href="javascript:history.go(-1);">返回</a>'
.'<br/>';
//$a = @fileLastLines('http://mos.umacaroon.com/'.$dir_arr[$arr[2]].$arr[3].'.log',2000,'/^\[.+\]/');
//$a = @fileLastLines('./log_contents',5000,'/^\[.+\]/');
$a = @tail('./log_contents',50, '/^\[.+\]/');
//$a = file_get_contents('./log_contents');
echo join('<br>',$a);
echo "</body>";

