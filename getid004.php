<?php

	require("./profile.php");

	$myaction = $_GET['action'];	//動作制御用数字
	$myid = $_GET['id'];			//選択するid
	$myname="getid004.php";			//ファイルの名前。もしくはURL。
	$backname="link.php";			//メインphpのURL。
	
	if( $myid == "" ){	//idが空だと話にならないのでエラーにする
	
		$myaction = -1;

	}else{

		if( $myaction == "" ){	//myactionが空で送られてきた場合削除チェック画面にする

			$myaction = "check";	//phpは型の概念あったっけ？文字列いれても平気？
		
		}
	
	}

function getiddata($myid, $db_server){



	$db_id = @mysql_connect($db_server, "kaki", "playboy") or exit("接続に失敗しました<BR> $db_server");
	mysql_select_db("ngt") or exit("データベースが選択できません");
	mysql_query("SET NAMES utf8");
	$result = mysql_query("SELECT * FROM kakilink WHERE id IN ($myid)");

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		$id 	= $row['id'];
		$title	= $row['title'];
		$url	= $row['url'];
		$message = $row['message'];
		$up_date = $row['up_date'];
		$up_time = $row['up_time'];
		$date_time = $row['date_time'];
		$flag	= $row['flag'];
		//リファラー消去CGIを挟む
		if($flag == 1) {
			$url = "./ref.cgi?" . $url;	
		}
		
		if($encode_type == "shift-jis"){
			echo @mb_convert_encoding("change to sjis<BR>", "SJIS", "auto");
			echo @mb_convert_encoding("<A name=\"" . $num . "\"></A>", "SJIS", "auto");
			echo @mb_convert_encoding("<!-- " . $num . " -->", "SJIS", "auto");
			echo @mb_convert_encoding("<FONT size=\"+1\" color=\"#fffffe\">タイトル：<B><A href='" . $url . "'>" . $title . "</A></B></FONT>", "SJIS", "auto");
			echo @mb_convert_encoding("<FONT size=\"-1\">　投稿日：" . $date_time, "SJIS", "auto");
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
			echo "<FONT size=\"+1\" color=\"#fffffe\">タイトル：<B><A href='" . $url . "'>" ;
			echo $title;
			echo "</A></B></FONT>";
			echo "<FONT size=\"-1\">　投稿日：".$date_time;
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



	$db_id = @mysql_connect($db_server, "kaki", "playboy") or exit("接続に失敗しました<BR> $db_server");
	mysql_select_db("ngt") or exit("データベースが選択できません");
	mysql_query("SET NAMES utf8");
	$result = mysql_query("UPDATE kakilink SET hidden = '1' WHERE id = '$myid';");
	
	mysql_close($db_id);
	
}

?>




<html>

<head>
<meta http-equiv="Content-Language" content="ja">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>削除確認</title>
</head>

<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">

<?php

	switch( $myaction){
		case -1:
			echo "<p>エラー</p>";
			break;
		case "check":
			getiddata($myid, $db_server);
			echo "<p>確認：この記事を削除しますか？</p>";
			echo '<form method="GET" action="'.$myname.'">';
			echo '<input type="hidden" value="'.$myid.'" name="id">';
			echo '<input type="hidden" value="delete" name="action">';
			echo '<input type="submit" value="はい" name="b1">';
			echo '</form>';
			echo '<form method="GET" action="'.$backname.'">';
 			echo '<input type="submit" value="いいえ" name="b2"></p></form>'; 
			break;
		case "delete":
			deleteiddata($myid, $db_server);
			echo "<p>削除完了</p>";
			echo '<form method="GET" action="'.$backname.'">';
 			echo '<input type="submit" value="戻る" name="b2"></p></form>'; 
	}

?>



 
</body> 
 
</html> 
