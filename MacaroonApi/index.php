<?php


/* * * * * * * * * * * * * * * * * * * *
 * 说明
 * 1.说明通过url直接访问这个文件
 * 2.在配置文件config.php进行配置
 * 3.调用不同方法时修改对应的请求方法和参数
 * * * * * * * * * * * * * * * * * * * */

require './MacaroonApi.php';

$cli = new MacaroonApi();

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


$result = $cli->rawRequest($action,$data);
var_dump($result);