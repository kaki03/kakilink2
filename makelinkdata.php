<?php

	require("./profile.php");

//�����ȥ��ʸ�������äƤ���������񤭹��ߤ�¹Ԥ��ޤ���
if( $_POST["TITLE"] != ""){
		//�ե����������
		$title   = @stripslashes(@htmlspecialchars($_POST["TITLE"]));
		$url     = @stripslashes(@htmlspecialchars($_POST["URL"]));
		$message = @stripslashes(@htmlspecialchars($_POST["MESSAGE"]));
		$ref     = $_POST["REF"];
		$flag    = 0;
		if($ref == TRUE){
			//$url = "./ref.cgi?" . $url;
			$flag = 1;
		}
		$dt = getdate();
		$youbi = array('��', '��', '��', '��', '��', '��', '��');
		$datetime = "$dt[year]/$dt[mon]/$dt[mday](" . $youbi["$dt[wday]"] . ") $dt[hours]��$dt[minutes]ʬ$dt[seconds]��"; 

		//�����꡼����
		$query = "insert into $table_name (title, url, message, up_date, up_time, date_time, flag )";
		$query .= " values (\"" . $title . "\",\"" . $url . "\",\"" . $message . "\", CURDATE() , CURTIME() , \"" . $datetime .  "\",\"" . $flag . "\")";

		//�ǡ����١�������³���񤭹���
		$db_id = @mysql_connect($db_server, $user, $pass) or exit("��³�˼��Ԥ��ޤ���");
		@mysql_select_db($db_name) or exit("�ǡ����١���������Ǥ��ޤ���");
//		@mysql_query("SET NAMES utf8") or exit("�����꡼�μ¹Ԥ˼��Ԥ��ޤ��� <BR> $query");
		$q_result = @mysql_query($query) or exit("�����꡼�μ¹Ԥ˼��Ԥ��ޤ��� <BR> $query");
		@mysql_close($db_id);

} else {
	header('Location:./link.php');
	exit();
}

?>

<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<title>�����</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H2>����󥯣�<?php echo $version; ?>+�ޤͤ�����</H2>
<HR>
<font size="+3"><a href="./link.php">�񤭹��ߴ�λ</a></font>
<HR>
<?php
echo $query;
?>
</body>
</html>
