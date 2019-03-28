<?php


// 引入函数
include 'function.php';


$email = 'wangzq1993@foxmail.com';
$phone = 13730112012;

dd(true);
dd(preg_match("/^[1-9][3,4,5,6,7,8][0-9]{9}$/",$phone));
dd(preg_match("/^\w+\@\w+\.\w+$/",$email));


$arr = [1,2,3];
$a = var_export($arr, true);

dd($a);

class Abc{

    function justecho()
    {
        echo 123;
    }
}

$a  = new Abc;
$a = serialize($a);
//$a->justecho();
// 对象反序列化之后可以直接使用
$b = unserialize($a);
$b->justecho();
die;

// 单引号双引号解析问题

//echo "\x41\x42";
//echo '\x41\x42';

$a = <<<EOT
 这里是字符串
 \x41\x42
EOT;

$a = '123';
$a[3.4] = 123;
echo $a;
//$b = explode('',$a);
//$b = str_split($a,1);
//dd($b);
//echo $b;

die;



// 直接插入排序
$arr = [20, 100, 50, 10, 5, 1, 0.5, 0.1];

function insertSort($a) {
//    $temp;
//    $i;
//    $j;
    $size_a = count($a);
    # 从第二个元素开始
    for ($i = 1; $i < $size_a; $i++) {
        if ($a[$i] < $a[$i-1]) {
            $j = $i; # 保存当前元素的位置
            $temp = $a[$i]; # 当前元素的值

            # 比较左边的元素，如果找到比自己更小的，向右移动元素，否则插入元素到当前位置
            while($j>0 && $temp<$a[$j-1]) {
                $a[$j] = $a[$j-1];
                $j--;
            }

            # 插入元素
            $a[$j] = $temp;
        }
    }
    return $a;
}
$arr = insertSort($arr);
print_r($arr);die;


// 冒泡排序
$arr = [100, 50, 20, 10, 5, 1, 0.5, 0.1];
for ($i = 1; $i < count($arr); $i++) {
    for ($j = 0; $j < count($arr) - $i; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            $temp = $arr[$j + 1];
            $arr[$j + 1] = $arr[$j];
            $arr[$j] = $temp;
        }
    }
}
print_r($arr);
die;


// 贪婪算法
$aa = 103.3;
$arr = [];
$miane = [100, 50, 20, 10, 5, 1, 0.5, 0.1];
foreach ($miane as $val) {
    $chu = intval($aa / $val);
    if ($chu > 0) {
        $intime['num'] = $chu;
        $intime['amount'] = $val;
        $arr[] = $intime;
        $aa = $aa - ($chu * $val);
        if ($aa == 0) {
            break;
        }
    }
}
dd($arr);


// 穷举法
setTimeMark();
$a = $b = $c = $d = $e = 0;
for ($i = 1; $i < 10; $i++) {
    $a = $i;
    for ($j = 0; $j < 10; $j++) {
        if ($a == $j) continue;
        $b = $j;
        for ($k = 0; $k < 10; $k++) {
            if ($a == $k || $b == $k) continue;
            $c = $k;
            for ($l = 0; $l < 10; $l++) {
                if ($a == $l || $b == $l || $c == $l) continue;
                $d = $l;
                for ($m = 1; $m < 10; $m++) {
                    if ($a == $m || $b == $m || $c == $m || $d == $m) continue;
                    $e = $m;
//                    if(($a*10000 + $b*1000 + $c*100 + $d*10 + $e) * $a == ($e*100000 + $e*10000 + $e*1000 + $e*100 + $e*10 + $e)){
//                        echo ($a*10000+$b*1000+$c*100+$d*10+$e);
//                    }
                    for ($n = 1; $n < 10; $n++) {
                        if (($a * 10000 + $b * 1000 + $c * 100 + $d * 10 + $e) * $n == ($e * 10000 + $d * 1000 + $c * 100 + $b * 10 + $a)) {
                            echo($a * 10000 + $b * 1000 + $c * 100 + $d * 10 + $e);
                            echo $n;
                        }
                    }

                }
            }
        }
    }
}
getTimeExc();
die;


function getrealprice($min, $max)
{
    static $i = 0;
    global $tru;
    $i++;
    $mid = (int)(($min + $max) / 2);
    echo $i . ':' . ' middle:' . $mid . ' min:' . $min . ' max:' . $max . '<br>';
    if ($mid > $tru) {
        return getrealprice($min, $mid);
    } elseif ($mid < $tru) {
        return getrealprice($mid, $max);
    } elseif ($mid == $tru) {
        return $i;
    }
    return false;
}

$tru = 436;
$aaa = getrealprice(0, 1000);
dd($aaa);


$a = 'abcabcabc';
$b = preg_replace_callback("/(ab)/", function ($matches) {
    dd($matches);
}, $a);
exit();


function shutexec()
{
    setTimeMark();
    sleep(3);
    echo '123';
    getTimeExc();
}

register_shutdown_function('shutexec');
echo 'asdf' . PHP_EOL;
exit();


$a = 'aaaa';
$t = &$a;
unset($a);
echo $t;
die; // delete relation

$a = '2017-2-5';
$b = '2017-3-6';
$aa = new \DateTime($a);
$bb = new \DateTime($b);

$day = $bb->diff($aa)->days;
dd($day);


$a = '你好，你是卖咖啡的嘛？';
$b = iconv('UTF-8', 'GB2312', $a);
echo $b;
$b = iconv('GB2312', 'UTF-8', $b);
echo $b;
die;


$response = [];
if (empty($response)) $response = new \ArrayObject();
//$response = json_encode( $response, JSON_FORCE_OBJECT);
$a = json_encode(['response' => $response]);
dd($a);

$a1 = array(1, 2, 3, 6); // l
$a2 = array(1, 2, 3, 4, 5); // z

$result = array_diff($a1, $a2);
print_r($result);
die;

$a = DateTime::createFromFormat('m/d/Y', '8/20/2033');

dd($a);

$str = file_get_contents('http://mos.umacaroon.com/data/runtime/Logs/TsPackge/2018_11_13.log');
echo $str;
die;


$partner_id = 1;
$is_force = false;
$a = 'ts_auth_info' . $partner_id && !$is_force;
$a = (string)$a;
dd($a);


// strrev
$a = 'asdfghjkl;';
$b = strrev($a);
dd($b);

// array_diff
$arr1 = [0, 1, 2, 3, 4, 5];
$arr2 = [1, 2, 3, 4];
$a = array_diff($arr1, $arr2);
dd($a);

// str_replace
$str = 'sadfafd，sfs';
//$err_msg = str_replace('，',',',$str);
dd($str);
$a = explode('，', $str);
dd($a);

$can_buy_days = (strtotime('2018-11-06') - strtotime(date('Y-m-d', time()))) / 86400;
dd($can_buy_days);


$pattern = '/GOOgle.+123/Ui';
$subject = 'I love google__123123123123123123';

$matches = array();
preg_match($pattern, $subject, $matches);

dd($matches);


$str = 'https://dddd';
$r = strpos($str, 'https://');
dd($r);
$contact = '123@qqq.cc';
$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
dd(preg_match($pattern, $contact, $matches));


//function httpcode($url){
//    $ch = curl_init();
//    $timeout = 5;
//    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
//    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//    curl_setopt($ch, CURLOPT_HEADER, 1);
//    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//    curl_setopt($ch,CURLOPT_URL,$url);
//    curl_exec($ch);
//    return $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
//    curl_close($ch);
//}
//echo "判断脚本之家的链接：".httpcode('http://macaroon.com/index.php?s=/Admin/Index/index');
//dd('123');

try {
//    $a = @get_headers('https://www.google.com');
    $a = @get_headers('https://www.baidu.com');
} catch (\Exception $e) {
    dd($e->getMessage());
}

dd($a);


//file_put_contents('aaa','aaa');

//$rst = \DateTime::createFromFormat( 'Y-m-d H:i:s', '2018-03-02' . ' 00:00:00' );
//dd($rst);
echo 'begin';
sleep(60);
echo 'end';
exit();


$str = '2018-09-012';

dd(date('Y-m-d', strtotime($str)) == $str);
$str = substr($str, 0, strpos($str, ' '));
dd($str);

$a = null;
dd((string)$a);
dd($a['ss']);
dd(json_decode('dddd', true));


/**解析serilize**/
$data = unserialize('a:16:{s:2:"id";s:3:"240";s:9:"device_id";s:1:"2";s:8:"goods_id";s:1:"0";s:8:"order_id";s:3:"140";s:11:"data_number";s:8:"pgso_140";s:9:"data_type";s:1:"1";s:9:"countries";s:2:"27";s:10:"start_time";s:19:"2018-09-28 00:00:00";s:8:"end_time";s:19:"2018-09-28 23:59:59";s:3:"max";s:3:"500";s:5:"limit";s:3:"400";s:12:"created_time";s:19:"2018-09-28 13:28:45";s:6:"status";s:1:"0";s:13:"synced_status";s:1:"1";s:11:"synced_time";s:19:"0000-00-00 00:00:00";s:6:"source";s:1:"1";}');
dd($data);

$a = [] ? 1 : 0;
echo $a;
die;

// 二维数组排序
$array[] = array('id' => 1, 'price' => 50);
$array[] = array('id' => 2, 'price' => 70);
$array[] = array('id' => 3, 'price' => 30);
$array[] = array('id' => 4, 'price' => 20);
foreach ($array as $key => $value) {
    $id[$key] = $value['id'];
    $price[$key] = $value['price'];
}
array_multisort($price, SORT_NUMERIC, SORT_ASC, $array);
echo '<pre>';
print_r($array);
echo '</pre>';
die;


$img = file_get_contents('http://dev.uibp.uroaming.cn/data/upload/image/macaroon_201809101331369556.jpeg', true);
file_put_contents('bbb.png', $img);
die;

date_default_timezone_set("Etc/GMT-8");//这里比林威治标准时间快8小时
//date_default_timezone_set('America/Los_Angeles');
$script_tz = date_default_timezone_get();


function StrCode($string, $salt, $action = 'ENCODE')
{
    $action != 'ENCODE' && $string = base64_decode($string);
    $code = '';
    $key = substr(md5($salt), 12, 6);
    $keyLen = strlen($key);
    $strLen = strlen($string);
    for ($i = 0; $i < $strLen; $i++) {
        $k = $i % $keyLen;
        $code .= $string[$i] ^ $key[$k];
    }
    return ($action != 'DECODE' ? base64_encode($code) : $code);
}


$salt1 = 'MacaroonWIFI';
$salt2 = date('Y-m-d');
$key = '123456789';
var_dump($key);
$key = strrev($key);
var_dump($key);
$sk1 = StrCode($key, $salt1);
var_dump($sk1);
$sk2 = StrCode($sk1, $salt2);
var_dump($sk2);
echo 'end~';


$sk1 = StrCode($sk2, $salt2, 'DECODE');
var_dump($sk1);
$key = StrCode($sk1, $salt1, 'DECODE');
var_dump($key);
$key = strrev($key);
var_dump($key);

die;


$timezone = 'UTC+08:00';


$time = str_replace('UTC', '', strtoupper($timezone));
$ac = substr($time, 0, 1);
$time = substr($time, 1);
list($hour, $min) = explode(':', $time);
$hour = (int)$hour;
$min = (int)$min;
var_dump($min);
die;

echo strtotime('08:00');
echo '<br>';
echo strtotime('today');
echo '<br>';
echo 3600 * 8;
die;

$device_data = substr('1234567890', -7);
var_dump($device_data);
die;

echo 24 * 60 * 60;
die;
$str = 'a:3:{s:6:"status";i:0;s:3:"msg";s:15:"参数不合法";s:10:"error_type";N;}';
$arr = unserialize($str);
var_dump($arr);
die;

//echo '1' . print(2) + 3;
die;

$bidrequest['imp'][] = ['banner' => ['w' => 300, 'h' => 250, 'pos' => 1]];
$bidrequest['device'] = ['ua' => 'chrome', 'os' => 'macintosh', 'h' => 537, 'w' => 931, 'ifa' => 'xxxx-xxxx'];
$bidrequest['ext'] = ['adslot_id' => '12595', 'ssp_id' => '8857939757'];

$json = '{"imp":[{"banner":{"w":300,"h":250,"pos":1}}],"device":{"ua":"chrome","os":"macintosh","h":537,"w":931,"ifa":"xxxx-xxxx"},"ext":{"adslot_id":12595,"ssp_id":8857939757}}';
echo $json;
echo '<br>';
echo json_encode($bidrequest);
die;


$msg1 = '租赁还机提醒#UE测试专用套餐Song 已完成使用#07-17 17:51';
echo $msg1;

$msg_arr = explode('#', $msg1);
$longtime = array_pop($msg_arr);
$time_arr = explode(' ', $longtime);
$ymd_arr = explode('-', $time_arr[0]);
if (0) { // 中文
    $ymd_str = implode('/', $ymd_arr);
} else {
    $ymd_arr = array_reverse($ymd_arr);
    $ymd_str = implode('/', $ymd_arr);
}
$time_finish = $ymd_str . ' ' . $time_arr[1];
$time = str_replace($longtime, $time_finish, $msg1);
var_dump($time);
die;


//$msg1 = '订单号：201803281154566625的设备取机成功！#套餐：韩国WiFi#2018-03-28 19:04:57';
if (preg_match('/\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}/', $msg1, $m1)) {
    $msg1 = str_replace($m1[0], date('Y/m/d H:i', strtotime($m1[0])), $msg1);
} elseif (preg_match('/\d{2}-\d{2}\s\d{2}:\d{2}/', $msg1, $m2)) {
    var_dump($m2);
    var_dump($m2);
    die;
    $msg2 = str_replace($m1[0], date('Y/m/d H:i', strtotime($m2[0])), $msg2);
}
var_dump($msg1);
var_dump($msg2);
die;

$html = file_get_contents('http://www.webmasterhome.cn/huilv/forexGet.min.asp?amount=100&from=USD&to=CNY&t=0.971846959942994');
var_dump($html);
die;

$n = 1.50;
var_dump(sprintf("%.1f", $n));
var_dump((string)floatval(sprintf("%.1f", $n)));
die;

$time = '07/31/2018 05:23:23';
$arr = explode(' ', $time);
var_dump($arr);
die;
list($d, $m, $y) = explode('/', $time);
var_dump($d);
var_dump($m);
var_dump($y);
die;

echo date('Y-m-d', strtotime('07/31/2018'));
echo date('Y-m-d', strtotime('2018/07/31'));
die;

$start_html = '<!DOCTYPE html><html lang="zh-CN"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"><style type="text/css">
      p {
        width: 100%;
        height: auto;
        word-wrap:break-word;
        word-break:break-all;
        overflow: hidden;
    }
    </style></head><body><div class="container-fluid"><div class="row"><div class="col-xs-12">';
$end_html = '</div></div></div></body></html>';
echo $start_html . '123' . $end_html;
die;

ini_set('post_max_size', '30M');

echo ini_get("upload_max_filesize");
echo ini_get("post_max_size");
echo ini_get("memory_limit");
echo ini_get("max_execution_time");
die;

$time1 = '2018-07-19 13:40:45';
$time2 = '2018-07-19 13:50:58';

var_dump($time2 < $time1);
die;

$orderRetaildata[] = ['id' => 1];
$orderRetaildata = array_column($orderRetaildata, 'id');
var_dump($orderRetaildata);
die;

$url = 'http://special.meirixue.com/2018goldvote/html/g';
$opts['go_id'] = 394;
$opts['action'] = 'votes';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 不验证证书
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 不验证HOST
curl_setopt($ch, CURLOPT_SSLVERSION, 1); // http://php.net/manual/en/function.curl-setopt.php页面搜CURL_SSLVERSION_TLSv1
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-type:application/x-www-form-urlencoded;charset=UTF-8'
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $opts);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);

var_dump($html);
die;


function my_sort1($a, $b)
{
    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
}

$a = array(4, 2, 8, 6);
usort($a, "my_sort1");
print_r($a);
die;

$str = '{"gmt_create":"2018-07-12 19:59:34","charset":"UTF-8","seller_email":"youlin@uroaming.com.cn","subject":"\u8ba2\u5355:201807121535008113772 \u7eed\u79df 1\u5929","sign":"Vebqvx9vAjUsnHqlPEHxCIsioD1QNulR+zZE3UjEljt7xZ1rR8ph+se+Ak5grOogk7SC1x8LafZsiSOMF46S2eGYL\/iB1zNAODC\/83QR5mNDtYWYTZf3qe+NUMIBOnCKT\/fakbqJD+T5XClweLgtGFK4EIkkVilGsahF4refecoL\/ba5oKsS9vAyE9CfgT4wWCcT6s96Lv0DtedHefqxvLYO7b6nuJqRanftqOsQHfQX6ZkY8cuhzdzqHRPByrWuMijj3ylWH+l3u5jmRxpp+NLj+i84LmHIX+zVt+uVbbu8MBgbrammc1j3Hph2VGm4exC\/xcer+Vhx2ruozo7tIQ==","body":"\u8ba2\u5355:201807121535008113772 \u7eed\u79df 1\u5929","buyer_id":"2088502028141469","invoice_amount":"0.01","notify_id":"98abb969e96903f8cdeae3398a8291fjjx","fund_bill_list":"[{&quot;amount&quot;:&quot;0.01&quot;,&quot;fundChannel&quot;:&quot;ALIPAYACCOUNT&quot;}]","notify_type":"trade_status_sync","trade_status":"TRADE_SUCCESS","receipt_amount":"0.01","app_id":"2017081708241905","buyer_pay_amount":"0.01","sign_type":"RSA2","seller_id":"2088611029003905","gmt_payment":"2018-07-12 19:59:35","notify_time":"2018-07-12 19:59:35","version":"1.0","out_trade_no":"201807121535008113772relet65653","total_amount":"0.01","trade_no":"2018071221001004460518276258","auth_app_id":"2017081708241905","buyer_logon_id":"lim***@126.com","point_amount":"0.00"}';
$arr = json_decode($str, true);
var_dump($arr
);
die;


$arr = ['id' => 100001169269154];
var_dump($arr);
$json = json_encode($arr);
echo $json;
//$arr = json_decode($json,true);
$arr = json_decode($json, false, 512, JSON_BIGINT_AS_STRING);
var_dump($arr);
die;
die;


echo date('Y-m-d', 1 * 86400 + strtotime('2018-07-11'));;
die;

echo strtotime("201807040930");
echo 'asd';
echo strtotime("20180704 09:30:00");
die;
$unbund_code = "1231231";

$html = <<<EMAIL
            <html>
                <head>
                    <meta charset="utf-8" />
                    <style type="text/css">*{ margin:0; padding:0;}</style>
                </head>
                <body>
                    <div>
                        <div style="font-size:14px; border-bottom:1px solid #292929;">
                            <img src="http://static.img.vipwifi.com/statics/Web/images/macaroon_logo.png" width="40" height="40" style="float:left" />
                            <span style=" float:left;display:inline-block; padding:20px 0 0 5px;">Macaroon MiFi</span>
                            <div style="clear:both;"></div>
                        </div>
                        <div style="font-size:12px; line-height:20px; padding:10px;">
                            [Macaroon MiFi],您正在进行Macaroon MiFi设备解绑操作<br />您的邮箱验证码为：<b>$unbund_code</b> 如果您暂时没有此需求，请忽略此邮件。
                        </div>
                    </div>
                </body>
            </html>
EMAIL;

echo $html;
die;


$a = '';
if (!$a) {
    echo 1;
}
die;

// json_encode 空数组强制转化为对象 中文字符不转换
$arr = ['123', '222' => '464', ['123', '456', '汉字']];
$josn1 = '[]';
$josn2 = '{}';
var_dump(json_encode($arr, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE));
var_dump(json_decode($josn1));
var_dump(json_decode($josn2));
die;


$c = 'a';
$c += 1;
echo $c; // 1
die;

$a = $b = 3;
if ($a = 5 || $b = 5) { // $a 赋值为 true ture++ 还是true
    $a++;
    $b++;
}
echo $a . " " . $b; // 1 4

exit();

// 字符串 a 和数字 0 的比较
$arr = array(0 => 2, "a" => 5, 7, 9);
foreach ($arr as $key => $val) {
    print($key == "a" ? 3 : $val);
}
// 3379
exit();


var_dump(1 | 0); // 位运算
exit();
// 测试一下PHP文件函数
//echo __DIR__.'/config.php';
//$rr = file_get_contents('file://'.__DIR__.'/config.php');
//var_dump($rr);

$handle = fopen('http://www.baidu.com', 'r');
while (feof($handle) !== true) {
    echo fgetc($handle);
}

exit;


class TestExc
{
    public static function handlexc($e)
    {
        echo $e->getMessage();
    }
}

// 全局捕捉异常函数
//set_exception_handler(
//    function (Exception $e){
//        echo $e -> getMessage();
//    }
//);
set_exception_handler(['TestExc', 'handlexc']); // 类里面必须是静态方法


throw new Exception('111123213', 100); // 抛出异常throw new Exception('111',100); // 抛出异常
// 主动抛出异常

//try{ // 捕获异常
//    throw new Exception('111',100); // 抛出异常
//}catch (Exception $e){
//    echo $e->getMessage();
//    echo PHP_EOL;
//    echo $e->getCode();
//    echo PHP_EOL;
//}

echo 123;
exit();


// 快速排序算法
function swap(array &$arr, $a, $b)
{
    $temp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $temp;
}

function Partition(array &$arr, $low, $high)
{
    $pivot = $arr[$low];   //选取子数组第一个元素作为枢轴
    while ($low < $high) {  //从数组的两端交替向中间扫描
        while ($low < $high && $arr[$high] >= $pivot) {
            $high--;
        }
        swap($arr, $low, $high);    //终于遇到一个比$pivot小的数，将其放到数组低端
        while ($low < $high && $arr[$low] <= $pivot) {
            $low++;
        }
        swap($arr, $low, $high);    //终于遇到一个比$pivot大的数，将其放到数组高端
    }
    return $low;   //返回high也行，毕竟最后low和high都是停留在pivot下标处
}

function QSort(array &$arr, $low, $high)
{
    if ($low < $high) {
        $pivot = Partition($arr, $low, $high);  //将$arr[$low...$high]一分为二，算出枢轴值
        QSort($arr, $low, $pivot - 1);   //对低子表进行递归排序
        QSort($arr, $pivot + 1, $high);  //对高子表进行递归排序
    }
}


function QuickSort(array &$arr)
{
    $low = 0;
    $high = count($arr) - 1;
    QSort($arr, $low, $high);
}


$arr = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
QuickSort($arr);
var_dump($arr);

exit;


echo (int)'a';
exit;

$arr = array(0 => 2, 'a' => 5, 7, 9);
foreach ($arr as $key => $value) {
    print($key == 'a' ? 3 : $value); // 考察了一个字符串转数字的问题
}

// 先运行逻辑运算符赋值给a true++ 还是true
$a = $b = 3;
var_dump(5 || $b);
if ($a = 5 || $b = 5) {
    $a++;
    $b++;
}
echo $a, $b;
exit();

$handle = fopen('./testclass.php', "r");//以只读方式打开一个文件
$i = 0;
while (!feof($handle)) {//函数检测是否已到达文件末尾
    if (fgets($handle)) {// 从文件指针中读取一行
        $i++;
    };
}
echo $i;//6
fclose($handle);
die;


var_dump(php_sapi_name());
die;

function get_num_d($n)
{
    static $a = 0;
    $n = 5 * $n + 1;
    $a++;
    if ($a == 5) {
        return $n;
    } else {
        return get_num_d($n);
    }
}

echo get_num_d(1);  // 因为最少，所以最后一个猴子拿了一个
exit;


// 插入排序
$arr = array(1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39);
function insert_sort($arr)
{
    //区分 哪部分是已经排序好的  
    //哪部分是没有排序的  
    //找到其中一个需要排序的元素  
    //这个元素 就是从第二个元素开始，到最后一个元素都是这个需要排序的元素  
    //利用循环就可以标志出来  
    //i循环控制 每次需要插入的元素，一旦需要插入的元素控制好了，  
    //间接已经将数组分成了2部分，下标小于当前的（左边的），是排序好的序列  
    for ($i = 1, $len = count($arr); $i < $len; $i++) {
        //获得当前需要比较的元素值。  
        $tmp = $arr[$i];     //43
        //内层循环控制 比较 并 插入  
        for ($j = $i - 1; $j >= 0; $j--) {
            //$arr[$i];//需要插入的元素; $arr[$j];//需要比较的元素
            if ($tmp < $arr[$j]) {
                //发现插入的元素要小，交换位置  
                //将后边的元素与前面的元素互换  
                $arr[$j + 1] = $arr[$j];
                //将前面的数设置为 当前需要交换的数  
                $arr[$j] = $tmp;
            } else {
                //如果碰到不需要移动的元素  
                //由于是已经排序好是数组，则前面的就不需要再次比较了。
                break;
            }
        }
    }
    //将这个元素 插入到已经排序好的序列内。  
    //返回  
    return $arr;
}

var_dump(insert_sort($arr));
exit();


// 选择排序
$arr = array(1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39);
function select_sort($arr)
{
    for ($i = 0, $len = count($arr); $i < $len - 1; $i++) {
        $p = $i; // 假设$p位置上的是最小的
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$p] > $arr[$j]) {
                $p = $j;
            }
        }
        if ($p != $i) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$p];
            $arr[$p] = $tmp;
        }
    }
    return $arr;
}

var_dump(select_sort($arr));

exit();


// 冒泡排序算法
$arr = array(1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39);
function maopao($arr)
{
    $tmp = 0;
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) { // 每一次冒泡把最大的值冒出来，一共需要循环len-1次
        for ($j = 0; $j < $len - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}

var_dump(maopao($arr));


exit();

function b()
{
    static $b;   //static  静态变量之初始化一次
    var_dump($b++);
}

b();
b();
exit();

$a = range(1, 3);
$b = each($a);
var_dump($b);
while (list($key, $value) = each($a)) {
    var_dump($key);
    var_dump($value);
}


//global
//$GLOBALS['111'];


exit;

$a = true;
$a++;
//echo $a; =1;
var_dump($a);

//namespace a;
//echo __FILE__."\n";
//echo __LINE__."\n";
//echo __DIR__."\n";

class H
{
    use d;

    public function geta()
    {
//        echo __FUNCTION__."\n";
//        echo __CLASS__."\n";
//        echo __TRAIT__."\n";
        echo __METHOD__ . "\n";
        echo __NAMESPACE__ . "\n";
    }
}


trait d
{
    public function getb()
    {
        echo __TRAIT__ . "\n";
    }
}

$a = new H();
$a->geta();
$a->getb();

exit();


// zval 结构体 变量容器   zend引擎中
//$a = range(0,3);
//var_dump($a);
//xdebug_debug_zval('a');
//$b = $a;
//xdebug_debug_zval('a');
//$a = '123231';
//xdebug_debug_zval('a');
//exit();

$a = range(0, 3);
xdebug_debug_zval('a');
$b = &$a;
xdebug_debug_zval('a');
$a = range(0, 3);
xdebug_debug_zval('a');

/*
 (refcount=2, is_ref=1)
array (size=4)
  0 => (refcount=0, is_ref=0)int 0
  1 => (refcount=0, is_ref=0)int 1
  2 => (refcount=0, is_ref=0)int 2
  3 => (refcount=0, is_ref=0)int 3
*/
exit();


// array_map
//单数组形式
function myfunction($v)
{
    if ($v === "Dog") {
        return "Fido";
    }
    return $v;
}

$a = array("Horse", "Dog", "Cat");
print_r(array_map("myfunction", $a));

// 不用foreach
function myfunction1($v1, $v2)
{
    if ($v1 === $v2) {
        return "same";
    }
    return "different";
}

$a1 = array("Horse", "Dog", "Cat");
$a2 = array("Cow", "Dog", "Rat");
print_r(array_map("myfunction1", $a1, $a2));
exit;


// array_walk的使用
$arr = [1, 2, 3, 4, 5];
array_walk($arr, function ($v, $k) {
    echo $k, $v, PHP_EOL;
});
exit;


// 正则匹配一个img标签
//$str = '<img src="123.png" />';
//$str = "<img src='123.png' />";
/*$pattern = '/<img.*?src=[\"|\'].*?[\"|\'].*?\/?>/';*/
$str = '123@qq.com';
$pattern = '/^[0-9a-zA-z_]*?@[0-9a-zA-z_]*?\.([0-9a-zA-z_]*?)$/';
preg_match($pattern, $str, $match);
var_dump($match);
exit;


// PHP简单实现生成器 yield
function get_num()
{
    for ($i = 1; $i < 100; $i++) {
        yield $i;
    }
}

foreach (get_num() as $num) {
    echo $num . "\n";
}
exit;


// 测试PHP最大可用内存
$p = (1 << 15) - 1;
echo $p;
echo "<br/>";
$i = 0;
$a = [];
$b = 1;
for ($i; $i < $p; $i++) {
    $a[] = 1;
}
echo memory_get_usage(true) . "\n";
$a['as1'] = 1;
echo memory_get_usage(true) . "\n";
$a['as2'] = 1;
echo memory_get_usage(true) . "\n";
exit();


$a = [1];
$a['a'] = $a;
print_r($a);

exit;


// 循环删除键值
$arr = [1, 2, 3, 4, 5];
foreach ($arr as $key => $value) {
    unset($arr[$key]);
}

$arr[] = 6;
print_r($arr);
exit;


// 递归查询目录所有文件
function get_paths($path = './')
{
    $resource = opendir($path);
    while ($name = readdir($resource)) {
        echo "<ul>";
        if ($name != '.' && $name != '..') {
            if (is_dir($path . $name)) {
                echo "<li>";
                echo $name;
                echo "</li>";
                get_paths($path . $name);
            } else {
                echo "<li>";
                echo $name;
                echo "</li>";
            }
        }
        echo "</ul>";
    }
}

get_paths();
exit;

// 连接数据库
$db_source = mysqli_connect('127.0.0.1', 'root', 'root', 'crm');

// 检测连接
if (!$db_source) {
    die("Connection failed: " . mysqli_connect_error());
}

$re = $db_source->query("select * from crm.agent");
var_dump(mysqli_fetch_row($re));
die;

while ($a = mysqli_fetch_assoc($re)) {
    print_r($a);
}

$c = '1';
$rst = $c . $db_source->close();

exit;


// 其他类型转化数组
// 8中数据类型 boolean string int float array object resource null
// 分别和数组之间的转换
var_dump((array)false);
var_dump((array)true);
var_dump((array)null);
exit;


// 数组的间接引用 php5.4之后支持
function get_array()
{
    return ['1', '2', '3'];
}

echo get_array()[1];
exit;


//echo trim(false).'1';
echo trim(true);

exit;

// 数组的键能是什么值
$arr = [
    true => 'aaaa',
    '2' => '2222',
    2 => '33333',
    null => 'null'
];
print_r($arr['']);

exit;


// 多值排序
$arr = [
    ['a' => 1, 'b' => 2],
    ['a' => 2, 'b' => 2],
    ['a' => 3, 'b' => 1],
    ['a' => 2, 'b' => 1],
];

function my_sort($arrays, $sort_key, $sort_order = SORT_ASC, $sort_type = SORT_NUMERIC)
{
    if (is_array($arrays)) {
        foreach ($arrays as $array) {
            if (is_array($array)) {
                $key_arrays[] = $array[$sort_key];
            } else {
                return false;
            }
        }
    } else {
        return false;
    }
    var_dump($key_arrays);
    die;
    array_multisort($key_arrays, $sort_order, $sort_type, $arrays);
    return $arrays;
}

$arr = my_sort($arr, 'a', SORT_DESC);
var_dump($arr);
die;


// 属性的重载方法和 方法的重载
class A
{
    private $title = 'AAAAAAA';

    public function showA()
    {
        echo $this->title;
    }

    /*属性的重载*/
    public function __set($name, $value)
    {
        echo '错误的赋值';
    }

    public function __get($name)
    {
        echo '错误的获取';
    }

    public function __isset($name)
    {
        echo '不能判断私有属性';
    }

    public function __unset($name)
    {
        echo '不能删除私有属性';
    }

    /*方法的重载*/
    public function __call($name, $arguments)
    {
        echo $name;
        print_r($arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        echo $name;
        print_r($arguments);
    }

}

$a = new A();
A::dddd(321);
$a->aaaa(123);
die;

// $this只的是当前调用的这个对象
class A1
{
    public $title = 'AAAAAAA';

    public function showA()
    {
        echo $this->title;
    }
}

class newB extends A1
{
    public $title = 'BBBBB';

    public function showB()
    {
        parent::showA();
    }
}

// 工厂类
class Factory
{
    public static function getInstance($name)
    {
        switch ($name) {
            case 'A':
                return new A();
                break;
            case 'B':
                return new newB();
                break;
        }
    }
}

$b = Factory::getInstance('B');
$b->showB();
die;

// 单利模式的实现
class Student
{
    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) { // 如果$instance不是这个类的实例化对象
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$obj = Student::getInstance();
var_dump($obj instanceof Student);
die;


// 当把对象当成函数调用的时候 魔术方法 __invoke
class in_str
{
    public function __invoke()
    {
        return '我是谁，我在哪，';
    }
}

$obj = new in_str();
echo $obj();
die;


// 实验一下把类当成字符串使用 类的魔术方法 __toString
class str
{
    public function __toString()
    {
        return '我是谁，我在哪，';
    }
}

$obj = new str;
echo 'nihao ' . $obj;
die;


// 生成昨天的字符串
echo date('Y-m-d H:i:s', strtotime('yesterday'));
echo "<br>";
$a = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
echo date('Y-m-d H:i:s', $a);

die;

// 类的重写
class C
{
    protected static function aa($a)
    {
        echo 'aaa123';
    }
}

class B extends A
{
    public static function aa($a)
    {
        echo 'bbb123';
    }
}

$a = new B();
$a->aa();

die;


try {
    dump(123);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

die;


// 验证foreach中as是否创建了全局变量
$a = [1, 2, 3, 4, 5, 6];
foreach ($a as $v) {
    echo $v, "<br/>";
}
echo $v;
exit;


// PHP 关键字不区分大小写
$a = 123;
FuNctiOn Abc()
{
    global $a;
    echo $a;
    echo $GLOBALS['a'];
}

ABC();  // 函数名称不区分大小写
exit;

// php数组求和
$a[] = [1, 2, 3, 4, 5, 6];
$a[] = [1, 2, 3, 4, 5, 6];
$a[] = [1, 2, 3, 4, 5, 6];
var_dump($a);
echo array_sum($a); // 只能求一维数组的和 索引数组和关联数组都可以
exit;


// php数组操作
$a = [1, 2, 3, 4, 5, 6];
var_dump($a);
echo array_shift($a);
var_dump($a);
echo array_pop($a);
var_dump($a);
echo '长度', array_push($a, 6);
var_dump($a);
echo '长度', array_unshift($a, 1);
var_dump($a);
die;

// 直接返回数组
$c = require "config.php";
var_dump($c);
die;

// 命名空间问题
$a = new \hello\abc();
echo 1;
$a->index();
die;

// 格式化输出小数
echo number_format(10000, 2, '.', '');
die;

// 获取时间戳
ini_set('date.timezone', 'Asia/Shanghai');
echo mktime(0, 0, 0, date('m'), date('d'), date('Y'));
die;


$a = '/c/a/b/c/d/1.txt';
$b = '/a/b/e/f/g/2.txt';
function get_path($a, $b)
{
    $a_arr = explode("/", $a);
    $b_arr = explode("/", $b);
    $data1 = array_diff_assoc($b_arr, $a_arr);
    $data2 = array_diff_assoc($a_arr, $b_arr);
    $path = implode('/', $data1);
    echo './' . str_repeat("../", count($data2)) . $path;

}

get_path($a, $b);
