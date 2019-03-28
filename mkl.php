<?php

include 'function.php';

//$accountId = 'bolan';
//$accountId = 'baxi';
//$accountId = 'macaroon';
$accountId = 'JP-Freedata';
switch ($accountId) {
    case 'bolan':
        $sign = '5EA7404608E801AC1921661BAD45C84C';
        break;
    case 'baxi':
        $sign = 'ASDFGHJKL';
        break;
    case 'macaroon':
        $sign = '5EA7404608E801AC1921661BAD45C84C';
        break;
    case 'JP-Freedata':
        $sign = 'AMS4TJ6ZGRNKXUIV98FW71HQBPEDC5YO';
        break;
}


$app_id = 2;
$requestTime = date('Y-m-d H:i:s');

$version = '1.3.0';

//$action = 'getHomePage';
//$action = 'getCountryPackage';
//$action = 'NewgetUeUsage';
//$action = 'newGetProductDetail';
//$action = 'doPackageOrder'; // 下单
$action = $_GET['a'];
switch ($action) {
    case 'getHomePage':
        $bodyArr = [
            'app_type' =>1,
            'language' => 1,
        ];
        break;
    case 'getCountryPackage':
        $bodyArr = [
            'country_id' =>34,
            'language' => 1,
        ];
        break;
    case 'NewgetUeUsage':
        $bodyArr = [
            'device_id' =>1,
            'language' => 1,
        ];
        break;
    case 'newGetProductDetail':
        $bodyArr = [
            'package_id' => 219,
            'language' => 1,
        ];
        break;
    case 'doPackageOrder':
        $dataaa = '{
        "amount": "40.00",
        "end_time": "2018/11/21",
        "imei": "866084030022104",
        "language": "0",
        "num": "1",
        "pay_method": "alipay",
        "product_id": "53",
        "real_amount": "40.00",
        "start_time": "2018/11/15",
        "user_account": "1383838438"
        }';
        $bodyArr = json_decode($dataaa, true);
        break;
    case 'doSynOrder':
        $bodyArr = [
            'order_id' => 440,
            'language' => 1,
        ];
        break;
    case 'getOrderList':
        $bodyArr = [
            'user_account' => 1383838438,
            'language' => 0,
        ];
        break;
    case 'getOrderDetail':
        $bodyArr = [
            'user_account' => 1383838438,
            'id' => 440,
            'language' => 0,
        ];
        break;
    case 'GetDeviceMap':
        $bodyArr = [
            'user_account' => 1383838438,
            'language' => 0,
        ];
        break;
    case 'changeDeviceStatus':
        $bodyArr = [
            'user_account' => 1383838438,
            'device_id' => 1,
            'status' => 2, // 停用
            'user_device_type' => 2, // 零售
            'language' => 0,
        ];
        break;

    case 'confirmOrder':
        $bodyArr = [
            'user_account' => 1383838438,
            'product_id' => '53',
            'num' =>1
        ];
        break;
    case 'youaresb':
        $bodyArr = [
            'jishizheyang' => 'buxianggzm',

        ];
        break;
}


$request['body'] = $bodyArr;
$request['header'] = [
    "accountId" => $accountId,
    "requestTime" => $requestTime,
    "serviceName" => $action,
    "version" => $version
];
// 组建签名
$request['header']['sign'] = md5(
    $request['header']['accountId'] .
    $request['header']['serviceName'] .
    $request['header']['requestTime'] .
    base64_encode(json_encode(['body' => $bodyArr], JSON_UNESCAPED_UNICODE)) .
    $request['header']['version'] .
    $sign
);
$data_string = json_encode($request);
//echo $data_string;die;
$url = 'http://macaroon.com/Open/Index/index';

// 初始化curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-AjaxPro-Method:ShowList',
        'Content-Type: application/json; charset=utf-8',
        'Content-Length: ' . strlen($data_string))
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
$data = curl_exec($ch);
exit($data);
//var_dump((json_decode($data, true)));
