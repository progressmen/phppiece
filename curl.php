<?php
header("Content-type:text/html;Charset=utf8");

include './Curl.class.php';

$curl = new \Curl();


$uri = 'http://oa-mssp.data.aliyun.com/fetch_creative?bidrequest=';
//$bidrequest['imp'][] = ['banner'=>['w'=>300,'h'=>250,'pos'=>1]];
//$bidrequest['device'] = ['ua'=>'chrome','os'=>'macintosh','h'=>537,'w'=>931,'ifa'=>'xxxx-xxxx'];
//$bidrequest['ext'] = ['adslot_id'=>'12595','ssp_id'=>'8857939757'];
$bidrequest = '{"imp":[{"banner":{"w":300,"h":250,"pos":1}}],"device":{"ua":"chrome","os":"macintosh","h":537,"w":931,"ifa":"xxxx-xxxx"},"ext":{"adslot_id":12595,"ssp_id":8857939757}}';
//$bidrequest = '{"imp":[{"banner":{"wmax":2000,"hmax":2000,"pos":1}}],"device":{"os":"ios","h":537,"w":931,"ifa":"xxxx-xxxx"},"ext":{"adslot_id":12595,"ssp_id":8857939757}}';

echo $curl->get($uri.$bidrequest);



