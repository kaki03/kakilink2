<?php

	require("./profile.php");

	$myaction = $_GET['action'];	// ư�������ѿ���
	$myid = $_GET['id'];			// ���򤹤�id
	$myname="deletelinkdata.php";			// �ե������̾�����⤷����URL��
	$backname="link.php";			// �ᥤ��php��URL��
	
	if( $myid == "" ){	// id���������äˤʤ�ʤ��Τǥ��顼�ˤ���
	
		$myaction = -1;

	}else{

		if( $myaction == "" ){	//myaction�����������Ƥ�������������å����̤ˤ���

			$myaction = "check";
		
		}
	
	}

function getiddata($myid, $db_server){

	require("./profile.php");

	//�ǡ����١�������³
	$db_id = @mysql_connect($db_server, $user, $pass) or exit("��³�˼��Ԥ��ޤ���");
	@mysql_select_db($db_name) or exit("�ǡ����١���������Ǥ��ޤ���");
//	mysql_query("SET NAMES utf8");
	$result = mysql_query("SELECT * FROM $table_name WHERE id IN ($myid)");

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 	= $row['id'];
		$title	= $row['title'];
		$url	= $row['url'];
		$message = $row['message'];
		$up_date = $row['up_date'];
		$up_time = $row['up_time'];
		$date_time = $row['date_time'];
		$flag	= $row['flag'];
		//��ե��顼�õ�CGI�򶴤�
		if($flag == 1) {
			$url = "./ref.cgi?" . $url;	
		}
		
		if($encode_type == "shift-jis"){
			echo @mb_convert_encoding("change to sjis<BR>", "SJIS", "auto");
			echo @mb_convert_encoding("<A name=\"" . $num . "\"></A>", "SJIS", "auto");
			echo @mb_convert_encoding("<!-- " . $num . " -->", "SJIS", "auto");
			echo @mb_convert_encoding("<FONT size=\"+1\" color=\"#fffffe\">�����ȥ롧<B><A href='" . $url . "'>" . $title . "</A></B></FONT>", "SJIS", "auto");
			echo @mb_convert_encoding("<FONT size=\"-1\">���������" . $date_time, "SJIS", "auto");
			echo @mb_convert_encoding("  </FONT>", "SJIS", "auto");
			echo @mb_convert_encoding("<BLOCKQUOTE>", "SJIS", "auto");
			echo @mb_convert_encoding("<PRE>", "SJIS", "auto");
			echo @mb_convert_encoding($message . "</PRE>", "SJIS", "auto");
			echo @mb_convert_encoding("</BLOCKQUOTE>", "SJIS", "auto");
			echo @mb_convert_encoding("<HR>", "SJIS", "auto");
			echo @mb_convert_encoding("<!-- -->", "SJIS", "auto");
		}else {
		
			echo "<A name=\"" . $num . "\"></A>";
			echo "<!-- " . $num . " -->";
			echo "<FONT size=\"+1\" color=\"#fffffe\">�����ȥ롧<B><A href='" . $url . "'>" ;
			echo $title;
			echo "</A></B></FONT>";
			echo "<FONT size=\"-1\">���������".$date_time;
			echo "  </FONT>";
			echo "<BLOCKQUOTE>";
			echo "<PRE>";
			echo $message . "</PRE>";
			echo "</BLOCKQUOTE>";
			echo "<HR>";
			echo "<!-- -->";	
		
		}
		
	}
	
	mysql_close($db_id);
	
}

function deleteiddata($myid, $db_server){

	require("./profile.php");

	//�ǡ����١�������³
	$db_id = @mysql_connect($db_server, $user, $pass) or exit("��³�˼��Ԥ��ޤ���");
	@mysql_select_db($db_name) or exit("�ǡ����١���������Ǥ��ޤ���");
//	mysql_query("SET NAMES utf8");
	$result = mysql_query("UPDATE $table_name SET hidden = '1' WHERE id = '$myid';");
	
	mysql_close($db_id);
	
}

?>




<html>

<head>
<meta http-equiv="Content-Language" content="ja">
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<title>�����ǧ</title>
</head>

<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">

<?php

	switch( $myaction){
		case -1:
			echo "<p>���顼</p>";
			break;
		case "check":
			getiddata($myid, $db_server);
			echo "<p>��ǧ�����ε����������ޤ�����</p>";
			echo '<form method="GET" action="'.$myname.'">';
			echo '<input type="hidden" value="'.$myid.'" name="id">';
			echo '<input type="hidden" value="delete" name="action">';
			echo '<input type="submit" value="�Ϥ�" name="b1">';
			echo '</form>';
			echo '<form method="GET" action="'.$backname.'">';
 			echo '<input type="submit" value="������" name="b2"></p></form>'; 
			break;
		case "delete":
			deleteiddata($myid, $db_server);
			echo "<p>�����λ</p>";
			echo '<form method="GET" action="'.$backname.'">';
 			echo '<input type="submit" value="���" name="b2"></p></form>'; 
	}

?>



 
</body> 
 
</html> 
