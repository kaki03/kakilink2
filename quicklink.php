<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP" />
<title>クイックリンク　編集画面</title>
</head>
<body bgcolor="#004040" text="#ffffff" link="#eeffee" vlink="#dddddd" alink="#ff0000">
<H3>クイックリンク　編集画面</H3>
クイックリンクは、CSVファイルを使ったリンクデータです。<BR>
CSVによるデータ管理を行えます。<BR>

<A href="./link.php">戻る</A>
<HR>

<?php
	require("./profile.php");
	$fname = "quicklink.csv";
	
	$action = $_POST["action"];

	//書き込みモード。	
	if($action == "change"){
		// データの更新。
		
		// quicklink CSVファイルのオープン 書き込み可能モード
		$file = @fopen($fname, 'r+') or exit("ファイルがオープンできませんでした。");
		@flock($fname, LOCK_EX);
		
		for( $i=1; $i<=10; $i++){
			$url_title[$i] = $_POST["url_title$i"];
			$url_address[$i] = $_POST["url_address$i"];
			
			$x = $url_title[$i] . "," . $url_address[$i] . "\r\n";
			@fwrite($file, $x);
		}
		
		@flock($fname, LOCK_UN);
		@fclose($file);
		echo "データを変更しました。";
	}

	// quicklink CSVファイルのオープン
	$file = @fopen($fname, 'r');

	// ファイルがエンドになるまで、@fgetcsvを使って最大256行取得。
	$i = 1;
	while(!feof($file)){
		$data = @fgetcsv($file, 256);
	
		$url_title[$i]   = $data[0];
		$url_address[$i] = $data[1];
		$i++;
		
	}
	
	@fclose($file);
?>

<FORM METHOD="POST" ACTION="quicklink.php">
<table>
<tr>
<th><th>タイトル<th>アドレス<tr>

<?php 
	for( $i=1; $i<=10; $i++){
		echo '<td>' . $i . '<td><input type="text" name="url_title' . $i . '" size="50" value="' . $url_title[$i] . '"> <td> <input type="text" name="url_address' . $i . '" size="50" value="' . $url_address[$i] . '"><tr>' . "\r";
	}
?>

</table>

<HR>
<INPUT TYPE="submit" name="action" VALUE="change">

</form>

<?php

?>

</BODY>
</HTML>
