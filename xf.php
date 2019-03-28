<?php


class Demo{
    function testWebaiui($dataArray){
        $URL = "http://openapi.xfyun.cn/v2/aiui";
        $APPID = "5c076c57";
        $API_KEY = "fed2e34756ff4193ba58051225af3aaa";
        $AUTH_ID = "4c43e6394dda4bd9b7deebdb1e9a2b0f";
        $AUE = "raw";
        $SAMPLE_RATE = "16000";
//        $DATA_TYPE = "audio";
        $DATA_TYPE = "text";
        $SCENE = "main";
        $RESULT_LEVEL = "complete";
        $LAT = "39.938838";
        $LNG = "116.368624";
        // 个性化参数，需转义
        $PERS_PARAM = "{\\\"auth_id\\\":\\\"4c43e6394dda4bd9b7deebdb1e9a2b0f\\\"}";
        $FILE_PATH = "./xf.pcm";

        $Param= array(
            "result_level"=>$RESULT_LEVEL,
//            "aue"=>$AUE,
            "scene"=>$SCENE,
            "auth_id"=>$AUTH_ID,
            "data_type"=>$DATA_TYPE,
//            "sample_rate"=>$SAMPLE_RATE,
//            "lat"=>$LAT,
//            "lng"=>$LNG,
            //如需使用个性化参数：
            //"pers_param"=>$PERS_PARAM,
        );
        $curTime = time();
        $paramBase64 = base64_encode(json_encode($Param));
        $checkSum = md5($API_KEY.$curTime.$paramBase64);

        $headers = array();
        $headers[] = 'X-CurTime:'.$curTime;
        $headers[] = 'X-Param:'.$paramBase64;
        $headers[] = 'X-CheckSum:'.$checkSum;
        $headers[] = 'X-Appid:'.$APPID;

//        $fp = fopen($FILE_PATH, "rb");
//        $dataArray = fread($fp,filesize($FILE_PATH));
//        $dataArray = '翻译 你是谁';
//        var_dump($headers);die;

        echo $this->https_request($URL, $dataArray, $headers);
        echo "\n";
    }
    function https_request($url, $post_data, $headers) {
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => $headers,
                'content' => $post_data,
                'timeout' => 10
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        echo $result;
    }
}
$dataArray = $_GET['t'];
$demo = new Demo();
$demo->testWebaiui($dataArray);