<?php


// json_encode 空数组强制转化为对象 中文字符不转换
$arr = ['123','222'=>'464',['123','456','汉字']];
$josn1 = '[]';
$josn2 = '{}';
var_dump(json_encode($arr,JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE));
var_dump(json_decode($josn1));
var_dump(json_decode($josn2));
die;



$c = 'a';
$c += 1;
echo $c; // 1
die;

$a = $b = 3;
if($a = 5 || $b = 5){ // $a 赋值为 true ture++ 还是true
    $a++;
    $b++;
}
echo $a." ".$b; // 1 4

exit();

// 字符串 a 和数字 0 的比较
$arr = array(0=>2,"a"=>5,7,9);
foreach ($arr as $key=>$val){
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

$handle = fopen('http://www.baidu.com','r');
while (feof($handle) !== true){
    echo fgetc($handle);
}

exit;









class TestExc{
    public static function handlexc($e){
        echo $e->getMessage();
    }
}

// 全局捕捉异常函数
//set_exception_handler(
//    function (Exception $e){
//        echo $e -> getMessage();
//    }
//);
set_exception_handler(['TestExc','handlexc']); // 类里面必须是静态方法


throw new Exception('111123213',100); // 抛出异常throw new Exception('111',100); // 抛出异常
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
function swap(array &$arr,$a,$b){
    $temp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $temp;
}

function Partition(array &$arr,$low,$high){
    $pivot = $arr[$low];   //选取子数组第一个元素作为枢轴
    while($low < $high){  //从数组的两端交替向中间扫描
        while($low < $high && $arr[$high] >= $pivot){
            $high --;
        }
        swap($arr,$low,$high);	//终于遇到一个比$pivot小的数，将其放到数组低端
        while($low < $high && $arr[$low] <= $pivot){
            $low ++;
        }
        swap($arr,$low,$high);	//终于遇到一个比$pivot大的数，将其放到数组高端
    }
    return $low;   //返回high也行，毕竟最后low和high都是停留在pivot下标处
}

function QSort(array &$arr,$low,$high){
    if($low < $high){
        $pivot = Partition($arr,$low,$high);  //将$arr[$low...$high]一分为二，算出枢轴值
        QSort($arr,$low,$pivot - 1);   //对低子表进行递归排序
        QSort($arr,$pivot + 1,$high);  //对高子表进行递归排序
    }
}

function QuickSort(array &$arr){
    $low = 0;
    $high = count($arr) - 1;
    QSort($arr,$low,$high);
}


$arr = array(9,1,5,8,3,7,4,6,2);
QuickSort($arr);
var_dump($arr);

exit;


echo (int) 'a';
exit;

$arr = array(0=>2,'a'=>5,7,9);
foreach ($arr as $key => $value){
    print($key == 'a'?3:$value ); // 考察了一个字符串转数字的问题
}

// 先运行逻辑运算符赋值给a true++ 还是true
$a = $b = 3;
var_dump(5 || $b);
if($a = 5 || $b = 5){
    $a++;
    $b++;
}
echo $a,$b;
exit();

$handle = fopen('./testclass.php',"r");//以只读方式打开一个文件
$i = 0;
while(!feof($handle)){//函数检测是否已到达文件末尾
    if(fgets($handle)){// 从文件指针中读取一行
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
    $n = 5*$n+1;
    $a++;
    if($a == 5)
    {
        return $n;
    }else{
        return get_num_d($n);
    }
}

echo get_num_d(1);  // 因为最少，所以最后一个猴子拿了一个
exit;



// 插入排序
$arr=array(1,43,54,62,21,66,32,78,36,76,39);  
function insert_sort($arr) {  
    //区分 哪部分是已经排序好的  
    //哪部分是没有排序的  
    //找到其中一个需要排序的元素  
    //这个元素 就是从第二个元素开始，到最后一个元素都是这个需要排序的元素  
    //利用循环就可以标志出来  
    //i循环控制 每次需要插入的元素，一旦需要插入的元素控制好了，  
    //间接已经将数组分成了2部分，下标小于当前的（左边的），是排序好的序列  
    for($i=1, $len=count($arr); $i<$len; $i++) {  
        //获得当前需要比较的元素值。  
        $tmp = $arr[$i];     //43
        //内层循环控制 比较 并 插入  
        for($j=$i-1;$j>=0;$j--) {  
   //$arr[$i];//需要插入的元素; $arr[$j];//需要比较的元素  
            if($tmp < $arr[$j]) {  
                //发现插入的元素要小，交换位置  
                //将后边的元素与前面的元素互换  
                $arr[$j+1] = $arr[$j];  
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
$arr=array(1,43,54,62,21,66,32,78,36,76,39);  
function select_sort($arr)
{
    for($i=0,$len=count($arr);$i<$len-1;$i++){
        $p = $i; // 假设$p位置上的是最小的
        for($j=$i+1;$j<$len;$j++){
            if($arr[$p]>$arr[$j]){
                $p = $j;
            }
        }
        if($p != $i){
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
$arr=array(1,43,54,62,21,66,32,78,36,76,39);  
function maopao($arr)
{
    $tmp = 0;
    $len = count($arr);
    for($i = 1;$i < $len; $i++){ // 每一次冒泡把最大的值冒出来，一共需要循环len-1次
        for($j=0;$j< $len - $i;$j++){
            if($arr[$j] > $arr[$j+1]){
                $tmp = $arr[$j+1];
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}
var_dump(maopao($arr));






exit();

function b(){
    static $b;   //static  静态变量之初始化一次
    var_dump($b++);
}

b();
b();
exit();

$a = range(1,3);
$b = each($a);
var_dump($b);
while (list($key,$value) = each($a)){
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

class H{
    use d;
    public function geta(){
//        echo __FUNCTION__."\n";
//        echo __CLASS__."\n";
//        echo __TRAIT__."\n";
        echo __METHOD__."\n";
        echo __NAMESPACE__."\n";
    }
}


trait d{
    public function getb(){
        echo __TRAIT__."\n";
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

$a = range(0,3);
xdebug_debug_zval('a');
$b = &$a;
xdebug_debug_zval('a');
$a = range(0,3);
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
    if ($v==="Dog")
    {
        return "Fido";
    }
    return $v;
}

$a=array("Horse","Dog","Cat");
print_r(array_map("myfunction",$a));

// 不用foreach
function myfunction1($v1,$v2)
{
    if ($v1===$v2)
    {
        return "same";
    }
    return "different";
}

$a1=array("Horse","Dog","Cat");
$a2=array("Cow","Dog","Rat");
print_r(array_map("myfunction1",$a1,$a2));
exit;


// array_walk的使用
$arr = [1,2,3,4,5];
array_walk($arr,function ($v,$k){
    echo $k,$v,PHP_EOL;
});
exit;


// 正则匹配一个img标签
//$str = '<img src="123.png" />';
//$str = "<img src='123.png' />";
/*$pattern = '/<img.*?src=[\"|\'].*?[\"|\'].*?\/?>/';*/
$str = '123@qq.com';
$pattern = '/^[0-9a-zA-z_]*?@[0-9a-zA-z_]*?\.([0-9a-zA-z_]*?)$/';
preg_match($pattern,$str,$match);
var_dump($match);
exit;


// PHP简单实现生成器 yield
function get_num(){
    for($i = 1;$i<100;$i++){
        yield $i;
    }
}

foreach (get_num() as $num){
    echo $num."\n";
}
exit;



// 测试PHP最大可用内存
$p = (1 << 15)-1;
echo $p;
echo "<br/>";
$i = 0;
$a = [];
$b = 1;
for($i;$i<$p;$i++){
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
$arr = [1,2,3,4,5];
foreach ($arr as $key => $value) {
    unset($arr[$key]);
}

$arr[] = 6;
print_r($arr);
exit;


// 递归查询目录所有文件
function get_paths($path = './'){
    $resource = opendir($path);
    while ($name = readdir($resource)){
        echo "<ul>";
        if($name != '.' && $name != '..'){
            if(is_dir($path.$name)){
                echo "<li>";
                echo $name;
                echo "</li>";
                get_paths($path.$name);
            }else{
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
$db_source = mysqli_connect('127.0.0.1','root','root','crm');

// 检测连接
if (!$db_source) {
    die("Connection failed: " . mysqli_connect_error());
}

$re = $db_source->query("select * from crm.agent");
var_dump(mysqli_fetch_row($re));die;

while ($a = mysqli_fetch_assoc($re)){
    print_r($a);
}

$c = '1';
$rst = $c.$db_source->close();

exit;





// 其他类型转化数组
// 8中数据类型 boolean string int float array object resource null
// 分别和数组之间的转换
var_dump((array)false);
var_dump((array)true);
var_dump((array)null);
exit;



// 数组的间接引用 php5.4之后支持
function get_array(){
    return ['1','2','3'];
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
    ['a'=>1,'b'=>2],
    ['a'=>2,'b'=>2],
    ['a'=>3,'b'=>1],
    ['a'=>2,'b'=>1],
];

function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){
    if(is_array($arrays)){
        foreach ($arrays as $array){
            if(is_array($array)){
                $key_arrays[] = $array[$sort_key];
            }else{
                return false;
            }
        }
    }else{
        return false;
    }
    var_dump($key_arrays);die;
    array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
    return $arrays;
}
$arr = my_sort($arr,'a',SORT_DESC);
var_dump($arr);die;



// 属性的重载方法和 方法的重载
class A{
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

    public static function __callStatic($name, $arguments){
        echo $name;
        print_r($arguments);
    }

}
$a = new A();
A::dddd(321);
$a->aaaa(123);
die;

// $this只的是当前调用的这个对象
class A1{
    public $title = 'AAAAAAA';
    public function showA(){
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
class Factory{
    public static function getInstance($name){
        switch($name) {
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
class Student{
    private static $instance;
    private function __construct(){}
    private function __clone(){}
    public static function getInstance(){
        if(!(self::$instance instanceof self)){ // 如果$instance不是这个类的实例化对象
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$obj = Student::getInstance();
var_dump($obj instanceof Student);
die;





// 当把对象当成函数调用的时候 魔术方法 __invoke
class in_str{
    public function __invoke()
    {
        return '我是谁，我在哪，';
    }
}

$obj = new in_str();
echo $obj();
die;


// 实验一下把类当成字符串使用 类的魔术方法 __toString
class str{
    public function __toString()
    {
        return '我是谁，我在哪，';
    }
}

$obj = new str;
echo 'nihao '.$obj;
die;




// 生成昨天的字符串
echo date('Y-m-d H:i:s',strtotime('yesterday'));
echo "<br>";
$a = mktime(0,0,0,date('m'),date('d'),date('Y'));
echo date('Y-m-d H:i:s',$a);

die;

// 类的重写
class C{
    protected static function aa($a){
        echo 'aaa123';
    }
}

class B extends A{
    public static function aa($a){
        echo 'bbb123';
    }
}
$a = new B();
$a->aa();

die;


try{
    dump(123);
}catch (Exception $e){
    var_dump($e->getMessage());
}

die;





// 验证foreach中as是否创建了全局变量
$a = [1,2,3,4,5,6];
foreach($a as $v){
    echo $v,"<br/>";
}
echo $v;
exit;


// PHP 关键字不区分大小写
$a = 123;
FuNctiOn Abc() {
    global $a;
    echo $a;
    echo $GLOBALS['a'];
}

ABC();  // 函数名称不区分大小写
exit;

// php数组求和
$a[] = [1,2,3,4,5,6];
$a[] = [1,2,3,4,5,6];
$a[] = [1,2,3,4,5,6];
var_dump($a);
echo array_sum($a); // 只能求一维数组的和 索引数组和关联数组都可以
exit;


// php数组操作
$a = [1,2,3,4,5,6];
var_dump($a);
echo array_shift($a);
var_dump($a);
echo array_pop($a);
var_dump($a);
echo '长度',array_push($a,6);
var_dump($a);
echo '长度',array_unshift($a,1);
var_dump($a);
die;

// 直接返回数组
$c = require "config.php" ;
var_dump($c);
die;

// 命名空间问题
$a = new \hello\abc();
echo 1;
$a->index();
die;

// 格式化输出小数
echo number_format(10000,2,'.','');
die;

// 获取时间戳
ini_set('date.timezone','Asia/Shanghai');
echo mktime(0,0,0,date('m'),date('d'),date('Y'));
die;


$a = '/c/a/b/c/d/1.txt';
$b = '/a/b/e/f/g/2.txt';
function get_path($a,$b){
    $a_arr = explode("/",$a);
    $b_arr = explode("/",$b);
    $data1 = array_diff_assoc($b_arr,$a_arr);
    $data2 = array_diff_assoc($a_arr,$b_arr);
    $path = implode('/',$data1);
    echo './'.str_repeat("../",count($data2)).$path;

}
get_path($a,$b);
