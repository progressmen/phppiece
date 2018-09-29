<?php

class MacaroonApi{

    private $config;


    public function __construct()
    {
        $this->config = require('./config.php');
    }


    public function rawRequest($action, $bodyArr)
    {

        $request['body'] = $bodyArr;
        $request['header'] = [
            "accountId" => $this->config['accountId'],
            "requestTime" => date('Y-m-d H:i', time()),
            "serviceName" => $action,
            "version" => $this->config['version']
        ];
        // 组建签名
        $request['header']['sign'] = md5(
            $request['header']['accountId'] .
            $request['header']['serviceName'] .
            $request['header']['requestTime'] .
            base64_encode(json_encode(['body' => $bodyArr], JSON_UNESCAPED_UNICODE)) .
            $request['header']['version'] .
            $this->config['macaroonApiKey']
        );
        $data_string = json_encode($request);
        $url = $this->config['macaroonApi'];

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



}

