<?php
 require_once'inc/info.php';
 require_once'inc/parser.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>播放页</title>
</head>
<body>
<iframe src="<?php echo $ym.$ytproxy;?>/browse.php?u=http://www.ytapi.com/embed/<?php echo $_GET['v']?>?autoplay=0&showinfo=0&vq=medium&iv_load_policy=3" frameborder="0" allowfullscreen scrolling="no" seamless="seamless">
</iframe>
</body>
</html>