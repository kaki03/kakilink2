<?php
	require('./profile.php');
	require('./getlinkdata.php')
?>

<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=euc-jp" />
<title>����� ���ɤ�</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H2>����󥯣�<?php echo $version; ?>+�ޤͤ�����</H2>���ɤ߲���
<HR>
<HR>
|<A href="./link.php">��Ʋ���</A>|
|<A href="./i.php">�������</A>|
| 
|<A href="http://www.yahoo.co.jp">Yahoo</a>|
|<A href="http://www.google.co.jp">Google</a>|
<HR>

<?php
	@getlinkdata(0,1000, $db_server);
?>

