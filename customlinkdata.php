
<?php

	require("./profile.php");
	require("./getlinkdata.php");
	require("./getlinkurl.php");

?>

<?php

	$id = $_GET["id"];
	
	$db_id = @mysql_connect($db_server, $user, $pass) or exit("��³�˼��Ԥ��ޤ���<BR> $db_server");
	mysql_select_db($db_name) or exit("�ǡ����١���������Ǥ��ޤ���");
//	@mysql_query("SET NAMES utf8") or exit("�����꡼�μ¹Ԥ˼��Ԥ��ޤ��� <BR> $query");
	$result = mysql_query("SELECT * FROM $table_name WHERE id=$id ");
	

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 	= $row['id'];
		$title	= $row['title'];
		$url	= $row['url'];
		$message = $row['message'];
		$up_date = $row['up_date'];
		$up_time = $row['up_time'];
		$date_time = $row['date_time'];
		$flag	= $row['flag'];
		$hidden = $row['hidden'];
		
	}

	
?>

<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<title>����� �Խ�����</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H2>����󥯣�<?php echo $version; ?>+�ޤͤ�����</H2>
�Խ�����<BR>
<a href="./link.php">���</a>
<HR>
<FORM METHOD=POST ACTION="customlinkdata.php">
�����ȥ롧<INPUT TYPE=text NAME=TITLE VALUE="<?php echo $title; ?>" SIZE=54><BR>
URL������<INPUT TYPE=text NAME=URL VALUE="<?php echo $url; ?>" SIZE=54>��<INPUT name=REF type=checkbox value=checked>:��ե��顼�õ�<BR>
������<BR>
<TEXTAREA ROWS=5 COLS=100 NAME=MESSAGE VALUE="<?php echo $message; ?>" wrap=hard></TEXTAREA><BR>
<P><INPUT TYPE=submit VALUE="�Խ�����">
</FORM>
<HR>
id = <?php echo $id ?>
<?php echo $title . $message; ?>
<HR>
<a href="./link.php">���</a>
</body>
</html>

