<?php

function getlinkdata($first, $last, $db_server, $encode_type){
	require("./profile.php");

	$db_id = @mysql_connect($db_server, $user, $pass) or exit("��³�˼��Ԥ��ޤ���<BR> $db_server");
	mysql_select_db($db_name) or exit("�ǡ����١���������Ǥ��ޤ���");
//	@mysql_query("SET NAMES utf8") or exit("�����꡼�μ¹Ԥ˼��Ԥ��ޤ��� <BR> $query");
	$result = mysql_query("SELECT * FROM $table_name ORDER BY 'id' DESC LIMIT $first, $last ");

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
		$hidden = $row['hidden'];
		
//		if($encode_type == "shift-jis"){
//			echo @mb_convert_encoding($message, "SJIS", "auto");
//		}
		if($hidden != 1){  // hidden�ʤ����ߤ��ʤ���
			echo "<A name=\"" . $id . "\"></A>\n";
			echo "<!-- " . $num . " -->\n";
			echo "<FONT size=\"+1\" color=\"#fffffe\">�����ȥ롧<B><A href='" . $url . "'>" . $title . "</A></B></FONT>\n";
			echo "<FONT size=\"-1\">���������" . $date_time . "��<a href='./deletelinkdata.php?id=" . $id ."'>�����</a>";
			echo "  </FONT>\n";
			echo "<BLOCKQUOTE>\n";
			echo "<PRE>\n";
			echo $message . "</PRE>\n";
			echo "</BLOCKQUOTE>\n";
			echo "<HR>\n";
			echo "<!-- -->\n";
		}
		
	}
	
	mysql_close($db_id);
	
}

?>
