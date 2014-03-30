<?php
	require('./profile.php');
	require('./getlinkdata.php')
?>

<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
<title>柿リンク ログ読み</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H2>柿リンクｖ<?php echo $version; ?>+まねくずは</H2>ログ読み画面
<HR>
<HR>
|<A href="./link.php">投稿画面</A>|
|<A href="./i.php">アイモド</A>|
| 
|<A href="http://www.yahoo.co.jp">Yahoo</a>|
|<A href="http://www.google.co.jp">Google</a>|
<HR>

<?php
	@getlinkdata(0,1000, $db_server);
?>

