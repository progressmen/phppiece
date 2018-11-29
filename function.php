<?php

// 打印数据
function dump($v = ''){
    echo "<pre>";
    var_dump($v);
    echo "</pre>";
}

// 打印数据并终止
function dd($v = 'END'){
    echo "<pre>";
    var_dump($v);
    echo "</pre>";
    die;
}

// 判断链接状态码
function httpcode($url){
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_exec($ch);
    $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpcode;
}

// 取大文件后几行
function fileLastLines($filename, $n, $preg = false){
    if(!$fp=fopen($filename,'r')){
        echo "打开文件失败，请检查文件路径是否正确，路径和文件名不要包含中文";
        return false;
    }
    $pos=-2;
    $eof="";
    $str="";
    while($n>0){
        while($eof!="\n"){
            if(!fseek($fp,$pos,SEEK_END)){
                $eof=fgetc($fp);
                $pos--;
            }else{
                break;
            }
        }

        if($preg){
            $s = fgets($fp);
            if(preg_match($preg,$s,$ma)){
                $s = str_replace($ma[0],'<span style="color: red;"><b>'.$ma[0].'</b></span>',$s);
            }
            $str.=$s;
        }else{
            $str.=fgets($fp);
        }
        $eof="";
        $n--;
    }
    return $str;
}


function tail($file,$num,$preg = false){
    $fp = fopen($file,"r");
    $pos = -2;
    $eof = "";
    $head = false;   //当总行数小于Num时，判断是否到第一行了
    $lines = array();
    while($num>0){
        while($eof != "\n"){
            if(fseek($fp, $pos, SEEK_END)==0){    //fseek成功返回0，失败返回-1
                $eof = fgetc($fp);
                $pos--;
            }else{                               //当到达第一行，行首时，设置$pos失败
                fseek($fp,0,SEEK_SET);
                $head = true;                   //到达文件头部，开关打开
                break;
            }

        }
        $s = fgets($fp);
        if(preg_match($preg,$s,$ma)){
            $s = str_replace($ma[0],'<span style="color: red;"><b>'.$ma[0].'</b></span>',$s);
        }
        array_unshift($lines,$s);
        if($head){ break; }                 //这一句，只能放上一句后，因为到文件头后，把第一行读取出来再跳出整个循环
        $eof = "";
        $num--;
    }
    fclose($fp);
    return $lines;
}


function setTimeMark() {
    global $startTime;
    $mtime1 = explode(" ", microtime());
    $startTime = $mtime1[1] + $mtime1[0];
}

function getTimeExc()
{ // 大概比实际多0.2毫秒
    global $startTime;
    $mtime2 = explode(" ", microtime());
    $endtime = $mtime2[1] + $mtime2[0];
    $totaltime = ($endtime - $startTime);
    $totaltime = number_format($totaltime, 7);
    echo "<br/>process time: " . $totaltime;
}

