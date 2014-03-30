<?php

	require("./profile.php");

//タイトルに文字が入っている時だけ書き込みを実行します。
if( $_POST["TITLE"] != ""){
		//フィールド生成
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
		$youbi = array('日', '月', '火', '水', '木', '金', '土');
		$datetime = "$dt[year]/$dt[mon]/$dt[mday](" . $youbi["$dt[wday]"] . ") $dt[hours]時$dt[minutes]分$dt[seconds]秒"; 

		//クエリー生成
		$query = "insert into $table_name (title, url, message, up_date, up_time, date_time, flag )";
		$query .= " values (\"" . $title . "\",\"" . $url . "\",\"" . $message . "\", CURDATE() , CURTIME() , \"" . $datetime .  "\",\"" . $flag . "\")";

		//データベースに接続、書き込み
		$db_id = @mysql_connect($db_server, $user, $pass) or exit("接続に失敗しました");
		@mysql_select_db($db_name) or exit("データベースが選択できません");
//		@mysql_query("SET NAMES utf8") or exit("クエリーの実行に失敗しました <BR> $query");
		$q_result = @mysql_query($query) or exit("クエリーの実行に失敗しました <BR> $query");
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
<title>柿リンク</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H2>柿リンクｖ<?php echo $version; ?>+まねくずは</H2>
<HR>
<font size="+3"><a href="./link.php">書き込み完了</a></font>
<HR>
<?php
echo $query;
?>
</body>
</html>
