<?php

function rawRequest($action, $bodyArr)
{
    $config =  array(
        // 接口地址
        'macaroonApi'           => 'http://macaroon-app.dev.vipwifi.com/Open/Index/index',
        // api key
        'macaroonApiKey'        => '6805955EF1A0ECF04DE221C63753877C',
        // 版本号
        'version'               => '3.0.0',
        // 接口账户
        'accountId'             => 'test_macaroon',
    );

    $request['body'] = $bodyArr;
    $request['header'] = [
        "accountId" => $config['accountId'],
        "requestTime" => date('Y-m-d H:i', time()),
        "serviceName" => $action,
        "version" => $config['version']
    ];
    // 组建签名
    $request['header']['sign'] = md5(
        $request['header']['accountId'] .
        $request['header']['serviceName'] .
        $request['header']['requestTime'] .
        base64_encode(json_encode(['body' => $bodyArr], JSON_UNESCAPED_UNICODE)) .
        $request['header']['version'] .
        $config['macaroonApiKey']
    );
    $data_string = json_encode($request);
    $url = $config['macaroonApi'];

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
    curl_close($ch);
    return json_decode($data, true);
}


// eg:
// 下单接口其他接口类似
$action = 'doDataPackageOrder';

// 下单参数
$data['partner_id']         = '3694'; // 合作伙伴id
$data['user_message']       = '';
$data['amount']             = '70.00'; // 商品总金额
$data['privilege_amount']   = 0;
$data['real_amount']        = '70.00';
$data['start_time']         = '2018/09/22';
$data['user_id']            = '2615314';
$data['coupon']             = '';
$data['imei']               = '866084030024779';
$data['product_id']         = '55'; // 商品id
$data['num']                = '1';
$data['end_time']           = '2018/09/23';
$data['pay_method']         = 'alipay';
$data['language']           = '0';  // 语言0中文1英文


$result = rawRequest($action,$data);
var_dump($result);